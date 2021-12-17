<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
		
		 $this->load->library('fungsi');
		 $this->load->helper('download');
		 $this->load->model('Barang_model');
		 $this->load->model('Supplier_model');
		 $this->load->model('Kategori_model');
		 $this->load->model('Satuan_model');
		 $this->load->model('Invoice_model');
	}
	
	function daftarproduk()
	{
		$data['produk'] = $this->produk_model->daftar_produk();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('admin/daftarproduk',$data);
		$this->load->view('temp/footer');
	}
	
	function invoices()
	{
		$data['invoices'] = $this->produk_model->all_invoices();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('admin/daftarinvoices',$data);
		$this->load->view('temp/footer');
	}
	
	function detailinvoices($id_invoices)
	{
		$data['invoices'] = $this->produk_model->detailinvoices($id_invoices);
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('admin/detailinvoices',$data);
		$this->load->view('temp/footer');
	}
	
	function konfirmasi()
	{
		$data['konfirmasi'] = $this->produk_model->all_konfirmasi();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('admin/daftarkonfirmasi',$data);
		$this->load->view('temp/footer');
	}
	
	function detailkonfirmasi($invoice_id)
	{
		$data['konfirmasi'] = $this->produk_model->detail_konfirmasi($invoice_id);
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('admin/detail_konfirmasi',$data);
		$this->load->view('temp/footer');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
	function download($nama)
	{
		$name = $nama;
		$data = file_get_contents('upload/konfirmasi/'.$nama);
		force_download($name, $data);
	}
}