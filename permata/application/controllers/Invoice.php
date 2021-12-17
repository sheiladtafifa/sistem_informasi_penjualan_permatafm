<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}

		$this->load->model('Barang_model');
		$this->load->model('Detail_penjualan_model');
		$this->load->model('Transaksi_penjualan_model');
	}	

	public function invoice()
	{
		$this->data['transaksi_penjualan']=$this->Transaksi_penjualan_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('invoice/invoice',$this->data);
		$this->load->view('temp/footer');
	}

	public function tampil_invoice($id_penjualan=null)
	{
		$this->data['transaksi_penjualan']=$this->Detail_penjualan_model->get_data_penjualan($id_penjualan);
		$this->data['pelanggan']=$this->Transaksi_penjualan_model->get_data($id_penjualan);

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('invoice/tampil_invoice',$this->data);
		$this->load->view('temp/footer');
	}
	
}