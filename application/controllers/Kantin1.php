<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantin1 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kantin1_model');
	}

	public function index()
	{
		if($this->session->userdata('login_status') == TRUE){

			$data['content_view'] = 'produk/kantin1_view';
			$data['tb_produk'] = $this->Kantin1_model->get_tb_produk();

			//get_kategori untuk dropdown tambah/edit buku
			$data['tb_kategori'] = $this->Kantin1_model->get_kategori();
			$this->load->view('themes/template', $data);

		} else {
			redirect('login/index');
		}
	}
  public function tambah()
	{
		if($this->session->userdata('login_status') == TRUE){
			$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required|numeric');
			$this->form_validation->set_rules('tb_kategori', 'Kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				//upload file
				$config['upload_path'] = './assets1/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '2000000';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('gambar')){
					if($this->Kantin1_model->tambah($this->upload->data()) == TRUE)
					{
						$this->session->set_flashdata('notif', 'Tambah Produk berhasil');
						redirect('Kantin1/index');
					} else {
						$this->session->set_flashdata('notif', 'Tambah Produk gagal');
						redirect('Kantin1/index');
					}
				} else {
					$this->session->set_flashdata('notif', 'Tambah Produk gagal upload');
					redirect('Kantin1/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Kantin1/index');
			}
		} else {
			redirect('login/index');
		}
	}

  public function ubah()
	{
		if($this->session->userdata('login_status') == TRUE){

			$this->form_validation->set_rules('nama_produk_edit', 'Nama Produk', 'trim|required');
      $this->form_validation->set_rules('deskripsi_edit', 'Deskripsi', 'trim|required');
			$this->form_validation->set_rules('harga_edit', 'Harga', 'trim|required|numeric');
			$this->form_validation->set_rules('tb_kategori_edit', 'Kategori', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->Kantin1_model->ubah() == TRUE)
				{
					$this->session->set_flashdata('notif', 'Ubah Produk berhasil');
					redirect('Kantin1/index');
				} else {
					$this->session->set_flashdata('notif', 'Ubah Produk gagal');
					redirect('Kantin1/index');
				}
			} else {
				$this->session->set_flashdata('notif', validation_errors());
				redirect('Kantin1/index');
			}


		} else {
			redirect('login/index');
		}
	}

  public function hapus()
	{
		if($this->session->userdata('login_status') == TRUE){

			if($this->Kantin1_model->hapus() == TRUE){
				$this->session->set_flashdata('notif', 'Hapus Produk Berhasil');
				redirect('Kantin1/index');
			} else {
				$this->session->set_flashdata('notif', 'Hapus Produk gagal');
				redirect('Kantin1/index');
			}

		} else {
			redirect('login/index');
		}
	}
  public function get_data_produk_by_id($id)
	{
		if($this->session->userdata('login_status') == TRUE){

			$data = $this->Kantin1_model->get_data_produk_by_id($id);
			echo json_encode($data);

		} else {
			redirect('login/index');
		}
	}

}
