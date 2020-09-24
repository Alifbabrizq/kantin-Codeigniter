<?php

/**
 *
 */
class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library("cart");
    $this->load->model("Keranjang_model");
  }

  public function index()
        {
          if($this->session->userdata('login_status') == TRUE){

            $data['produk'] = $this->Keranjang_model->get_produk_all();
            $data['kategori'] = $this->Keranjang_model->get_kategori_all();
            $data['content_view'] = 'produk/kantin1_view';
            $this->load->view('themes/template',$data);

      		} else {
      			redirect('Login');
      		}

        }

    public function dashboard(){
      if($this->session->userdata('login_status') == TRUE){

        $data['content_view'] = 'dashboard_view';
        $this->load->view('themes/template',$data);

      } else {
        redirect('Login');
      }

    }
    public function tentang()
        {
          if($this->session->userdata('login_status') == TRUE){

            $data['kategori'] = $this->Keranjang_model->get_kategori_all();
            $data['content_view'] = 'pages/tentang';
            $this->load->view('themes/template',$data);

          } else {
      			redirect('Login');
      		}
        }
    public function cara_bayar()
        {
          if($this->session->userdata('login_status') == TRUE){

            $data['kategori'] = $this->Keranjang_model->get_kategori_all();
            $data['content_view'] = 'pages/cara_bayar';
            $this->load->view('themes/template',$data);

          } else {
      			redirect('Login');
      		}
        }
}

 ?>
