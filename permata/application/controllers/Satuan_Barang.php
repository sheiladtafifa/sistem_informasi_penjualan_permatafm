<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}

		 $this->load->model('Satuan_model');
	}

	public function tambah_satuan_barang()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('barang/satuan_barang/tambah_satuan_barang');
		$this->load->view('temp/footer');
	}

	public function tampil_satuan_barang()
	{
		$this->data['satuan_barang']=$this->Satuan_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('barang/satuan_barang/tampil_satuan_barang',$this->data);
		$this->load->view('temp/footer');
	}

	public function insert(){

		$this->data_satuan_barang['satuan']=$this->input->post('satuan');
		
		$result=$this->Satuan_model->insert($this->data_satuan_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Satuan Barang Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('Satuan_Barang/tambah_satuan_barang');
		
	}

	public function edit($id_satuan=null){
		
		
		$this->data['satuan_barang']=$this->Satuan_model->get_data($id_satuan);
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('barang/satuan_barang/edit_satuan_barang');	
		$this->load->view('temp/footer');
	}

	public function edit_satuan_barang($id_satuan=null){

		$this->data_satuan_barang['satuan']=$this->input->post('satuan');

		$result=$this->Satuan_model->edit($id_satuan,$this->data_satuan_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Satuan Barang Berhasil Diupdate');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
			}

		redirect('Satuan_Barang/tampil_satuan_barang');
		
	}

	public function delete($id_satuan= null)
	{
			
		$this->Satuan_model->delete($id_satuan);

		$this->session->set_flashdata('berhasil', 'Data Satuan Barang Berhasil Dihapus');			

		redirect('Satuan_Barang/tampil_satuan_barang');	

	}
}
