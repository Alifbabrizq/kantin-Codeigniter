<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantin1_model extends CI_Model {

	public function get_tb_produk(){
		return $this->db->join('tb_kategori','tb_kategori.id = tb_produk.kategori')
										->get('tb_produk')
										->result();
	}

	public function get_kategori(){
		return $this->db->get('tb_kategori')
						->result();
	}
  public function tambah($gambar)
	{
		$data = array(
				'kode_produk' 	=> $this->input->post('kode_produk'),
				'nama_produk' 		=> $this->input->post('nama_produk'),
				'kategori'		          => $this->input->post('tb_kategori'),
        'deskripsi'		=> $this->input->post('deskripsi'),
				'harga'			=> $this->input->post('harga'),
				'gambar'			=> $gambar['file_name']
			);

		$this->db->insert('tb_produk', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
  public function hapus()
	{
		$this->db->where('id_produk', $this->input->post('hapus_id_produk'))
				 ->delete('tb_produk');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
  public function get_data_produk_by_id($id)
	{
		return $this->db->where('id_produk', $id)
						->get('tb_produk')
						->row();
	}
  public function ubah()
	{
		$data = array(
				'kode_produk'=> $this->input->post('kode_produk_edit'),
				'nama_produk'        => $this->input->post('nama_produk_edit'),
        'deskripsi'       => $this->input->post('deskripsi_edit'),
				'harga'       => $this->input->post('harga_edit'),
				'kategori'  		=> $this->input->post('tb_kategori_edit')
			);

		$this->db->where('id_produk', $this->input->post('id_produk_edit'))
				 ->update('tb_produk', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
// ->join('kategori','kategori.id_kat = makanan.id_kat')
