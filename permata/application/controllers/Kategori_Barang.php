<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}

		 $this->load->model('Kategori_model');
	}

	public function tambah_kategori_barang()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('barang/kategori_barang/tambah_kategori_barang');
		$this->load->view('temp/footer');
	}

	public function tampil_kategori_barang()
	{
		$this->data['kategori_barang']=$this->Kategori_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('barang/kategori_barang/tampil_kategori_barang',$this->data);
		$this->load->view('temp/footer');
	}

	public function insert(){

		$this->data_kategori_barang['nama_kategori']=$this->input->post('nama_kategori');
		$this->data_kategori_barang['kode_kategori']=substr($this->input->post('nama_kategori'),0,3);
		
		$result=$this->Kategori_model->insert($this->data_kategori_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data kategori Barang Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('Kategori_Barang/tambah_kategori_barang');
		
	}

	public function edit($kode_kategori=null){
		
		
		$this->data['kategori_barang']=$this->Kategori_model->get_data($kode_kategori);
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('barang/kategori_barang/edit_kategori_barang');	
		$this->load->view('temp/footer');
	}

	public function edit_kategori_barang($kode_kategori=null){

		$this->data_kategori_barang['nama_kategori']=$this->input->post('nama_kategori');
		$this->data_kategori_barang['kode_kategori']=substr($this->input->post('nama_kategori'),0,3);

		$result=$this->Kategori_model->edit($kode_kategori,$this->data_kategori_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Kategori Barang Berhasil Diupdate');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
			}

		redirect('Kategori_Barang/tampil_kategori_barang');
		
	}

	public function delete($id_kategori= null)
	{
			
		$this->Kategori_model->delete($id_kategori);

		$this->session->set_flashdata('berhasil', 'Data Kategori Barang Berhasil Dihapus');			

		redirect('Kategori_Barang/tampil_kategori_barang');	

	}
}
