<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

    public function get_produk_all()
    {
        $query = $this->db->get('tb_produk');
        return $query->result_array();
    }

    public function get_produk_kategori($kategori)
    {
        if($kategori>0)
            {
                $this->db->where('kategori',$kategori);
            }
        $query = $this->db->get('tb_produk');
        return $query->result_array();
    }

    public function get_kategori_all()
    {
        $query = $this->db->get('tb_kategori');
        return $query->result_array();
    }

    public  function get_produk_id($id)
    {
        $this->db->select('tb_produk.*,nama_kategori');
        $this->db->from('tb_produk');
        $this->db->join('tb_kategori', 'kategori=tb_kategori.id','left');
        $this->db->where('id_produk',$id);
        return $this->db->get();
    }

    public function tambah_pelanggan($data)
    {
        $this->db->insert('tb_pelanggan', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_order($data)
    {
        $this->db->insert('tb_order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_detail_order($data)
    {
        $this->db->insert('tb_detail_order', $data);
    }

    public function get_riwayat_transaksi()
    {
      return $this->db->select('tb_order.id, tb_pelanggan.nama, tb_pelanggan.kelas, tb_pelanggan.email, tb_pelanggan.telp, tb_order.tanggal, (SELECT SUM(tb_detail_order.qty*tb_produk.harga) FROM tb_detail_order JOIN tb_produk ON tb_produk.id_produk = tb_detail_order.produk WHERE id = tb_order.id ) as total')
						->join('tb_detail_order','tb_detail_order.order_id = tb_order.id')
						->join('tb_produk','tb_produk.id_produk = tb_detail_order.produk')
            ->join('tb_pelanggan', 'tb_pelanggan.id = tb_order.pelanggan')
						->group_by('id')
						->get('tb_order')
						->result();
    }

    public function get_transaksi_by_id($id)
	{
		return $this->db->select('tb_produk.nama_produk, tb_produk.deskripsi, tb_detail_order.qty, tb_produk.harga')
						->where('id', $id)
						->join('tb_produk','tb_produk.id_produk = tb_detail_order.produk')
						->get('tb_detail_order')
						->result();
	}
}
