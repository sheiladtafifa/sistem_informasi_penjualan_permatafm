<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->model('Detail_pembelian_model');
		$this->load->model('Transaksi_pembelian_model');
	}

	public function index()
	{	
		$judulhalaman = "Report";
		$this->data['judulhalaman'] = $judulhalaman;
		// $this->data['pengguna']=$this->Report_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('report/laporan');	
		$this->load->view('temp/footer');	

	}

	public function report()
	{			
		$this->data['daterange']=$this->input->post('daterange');		
		$range = $this->input->post('daterange');			

		$tgl_awal = substr($range,0,10);
		$tgl_awal = date("Y-m-d", strtotime($tgl_awal));
		$this->data_user['dari']=$tgl_awal;

		$tgl_akhir = substr($range,13,24);
		$tgl_akhir = date("Y-m-d", strtotime($tgl_akhir));	
		$this->data_user['sampai']=$tgl_akhir;

		$this->data['laporan_pembelian']=$this->Detail_pembelian_model->laporan_pembelian($tgl_awal,$tgl_akhir);
		$this->data['laporan_penjualan']=$this->Detail_penjualan_model->laporan_penjualan($tgl_awal,$tgl_akhir);
		//var_dump($this->data['laporan_pembelian']);
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');			
		$this->load->view('report/report',$this->data);	
		$this->load->view('temp/footer');	

	}

	
	
}

?>