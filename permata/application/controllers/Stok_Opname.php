<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_Opname extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
		
		 $this->load->model('Stok_opname_model');
		 $this->load->model('Barang_model');
		 $this->load->model('Kategori_model');
	}

	public function tambah_stok_opname()
	{
		$this->data['barang']=$this->Barang_model->get_all();
		$this->data['kategori_barang']=$this->Kategori_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('stok_opname/tambah_stok_opname',$this->data);
		$this->load->view('temp/footer');
	}

	public function tampil_stok_opname()
	{
		$this->data['barang']=$this->Barang_model->get_all();
		$this->data['kategori_barang']=$this->Kategori_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('stok_opname/tampil_stok_opname',$this->data);
		$this->load->view('temp/footer');
	}

	public function insert(){

		$this->data_stok_opname['kode_kategori']=$this->input->post('kode_kategori');
		$this->data_stok_opname['kode_barang']=$this->input->post('kode_barang');
		$this->data_stok_opname['stok_nyata']=$this->input->post('stok_nyata');
		$this->data_stok_opname['keterangan']=$this->input->post('keterangan');
		
		$result=$this->Stok_opname_model->insert($this->data_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Stok Opname Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('Stok_Opname/tambah_stok_opname');
		
	}

	public function edit($kode_barang=null){
		
		$this->data_stok_opname['kode_kategori']=$this->input->post('kode_kategori');
		$this->data_stok_opname['kode_barang']=$this->input->post('kode_barang');
		$this->data_stok_opname['stok_nyata']=$this->input->post('stok_nyata');
		$this->data_stok_opname['keterangan']=$this->input->post('keterangan');
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('stok_opname/edit_stok_opname');	
		$this->load->view('temp/footer');
	}

	public function edit_stok_opname($kode_barang=null){

		$this->data_stok_opname['kode_kategori']=$this->input->post('kode_kategori');
		$this->data_stok_opname['id_barang']=$this->input->post('id_barang');
		$this->data_stok_opname['stok_nyata']=$this->input->post('stok_nyata');
		$this->data_stok_opname['keterangan']=$this->input->post('keterangan');

		$result=$this->Stok_opname_model->edit($kode_barang,$this->data_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Stok Opname Berhasil Diupdate');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
			}

		redirect('Stok_Opname/tampil_stok_opname');
		
	}


	public function delete($kode_barang= null)
	{
			
		$this->Stok_opname_model->delete($kode_stok_opname);

		$this->session->set_flashdata('berhasil', 'Data Stok Opname Berhasil Dihapus');			

		redirect('Stok_Opname/tampil_stok_opname');	

	}

}
