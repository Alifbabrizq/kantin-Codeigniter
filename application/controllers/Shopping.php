<?php

/**
 *
 */
class Shopping extends CI_Controller
{

  public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('keranjang_model');
    }

    public function index()
    {
      if($this->session->userdata('login_status') == TRUE){

        $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
        $data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['content_view'] = 'produk/kantin1_view';
        $this->load->view('themes/template',$data);

      } else {
        redirect('Login');
      }
    }
    public function tampil_cart()
    {
      if($this->session->userdata('login_status') == TRUE){

        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['content_view'] = 'shopping/tampil_cart';
        $this->load->view('themes/template',$data);

      } else {
        redirect('Login');
      }

    }

    public function check_out()
    {
      if($this->session->userdata('login_status') == TRUE){

        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['content_view'] = 'shopping/check_out';
        $this->load->view('themes/template',$data);
      } else {
        redirect('Login');
      }
    }

    public function detail_produk()
    {
      if($this->session->userdata('login_status') == TRUE){
        $id=($this->uri->segment(3))?$this->uri->segment(3):0;
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
        $data['content_view'] = 'shopping/detail_produk';
        $this->load->view('themes/template',$data);
      } else {
        redirect('Login');
      }
    }


    function tambah()
    {
      if($this->session->userdata('login_status') == TRUE){
        $data_produk= array('id' => $this->input->post('id'),
                             'name' => $this->input->post('nama'),
                             'price' => $this->input->post('harga'),
                             'gambar' => $this->input->post('gambar'),
                             'qty' =>$this->input->post('qty')
                            );
        $this->cart->insert($data_produk);
        redirect('shopping');
      } else {
        redirect('Login');
      }
    }

    function hapus($rowid)
    {
      if($this->session->userdata('login_status') == TRUE){
        if ($rowid=="all")
            {
                $this->cart->destroy();
            }
        else
            {
                $data = array('rowid' => $rowid,
                              'qty' =>0);
                $this->cart->update($data);
            }
        redirect('shopping/tampil_cart');
      } else {
        redirect('Login');
      }
    }

    function ubah_cart()
    {
      if($this->session->userdata('login_status') == TRUE){
        $cart_info = $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array('rowid' => $rowid,
                            'price' => $price,
                            'gambar' => $gambar,
                            'amount' => $amount,
                            'qty' => $qty);
            $this->cart->update($data);
        }
        redirect('shopping/tampil_cart');
      } else {
        redirect('Login');
    }
  }

    public function proses_order()
    {
      if($this->session->userdata('login_status') == TRUE){
        //-------------------------Input data pelanggan--------------------------
        $data_pelanggan = array('nama' => $this->input->post('nama'),
                            'email' => $this->input->post('email'),
                            'kelas' => $this->input->post('kelas'),
                            'telp' => $this->input->post('telp'));
        $id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
        //-------------------------Input data order------------------------------
        $data_order = array('tanggal' => date('Y-m-d'),
                            'pelanggan' => $id_pelanggan);
        $id_order = $this->keranjang_model->tambah_order($data_order);
        //-------------------------Input data detail order-----------------------
        if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data_detail = array('order_id' =>$id_order,
                                        'produk' => $item['id'],
                                        'qty' => $item['qty'],
                                        'harga' => $item['price']);
                        $proses = $this->keranjang_model->tambah_detail_order($data_detail);
                    }
            }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['content_view'] = 'shopping/sukses';
        $this->load->view('themes/template',$data);
      } else {
        redirect('Login');
    }
}

public function riwayat()
{
  if($this->session->userdata('login_status') == TRUE){
    $data['content_view'] = 'shopping/riwayat_transaksi_view';
    $data['riwayat'] = $this->keranjang_model->get_riwayat_transaksi();

    $this->load->view('themes/template', $data);
  } else {
    redirect('login/index');
  }
}

public function get_detil_transaksi_by_id($id)
{
  if($this->session->userdata('login_status') == TRUE){
    $detil_transaksi = $this->keranjang_model->get_transaksi_by_id($id);
    $data['show_detil'] = "";
    $total = 0;
    $no = 1;
    $data['show_detil'] .= '<table class="table table-striped">
                <tr>
                  <th>No</th>
                  <th>Nama</th>

                  <th>Deskripsi</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Sub Total</th>
                </tr>';

    foreach ($detil_transaksi as $d) {
      $data['show_detil'] .= '<tr>
                <td>'.$no.'</td>
                <td>'.$d->nama_produk.'</td>

                <td>'.$d->deskripsi.'</td>
                <td>'.$d->qty.'</td>
                <td>'.$d->harga.'</td>
                <td>'.$d->harga*$d->qty.'</td>
              </tr>';

      $no++;
      $total += $d->harga*$d->qty;
    }
    $data['show_detil'] .= '</table>';
    $data['show_detil'] .= '<h3><p class="text-right">Total Belanja:</p></h3>
                <h2><p class="text-right">Rp '.$total.',- </p></h2>';
    echo json_encode($data);
  } else {
    redirect('login/index');
  }
}
public function cetak_nota()
{
  $this->load->view('shopping/cetak_nota_view');
}
}
