<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permata extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}

		$this->load->library('fungsi');
        $this->load->model('Dashboard_model');

		//$this->load->model('Dashboard_model');
	}

	public function index()
	{	
		// if ($this->session->userdata('jabatan')) {
		// 	error_reporting(0);
	 //    	$total = $this->Dashboard_model->total();
	 //    	foreach ($total as $key) {
	 //    		$harga_beli     = $this->Dashboard_model->modal_barang($key->id_barang)->row()->harga_beli;
	 //    		$total_barang   = $this->Dashboard_model->total_barang_masuk($key->id_barang)->row()->stok;
	 //    		$jml_jual       = $this->Dashboard_model->total_barang_terjual($key->id_barang)->row()->jml_jual;
	 //    		$modal          += $harga_beli * $total_barang;
	 //    		$pj             += $harga_beli * $jml_jual;
	 //    	}
  //           $data = array(
  //               'modal'             => $modal,
  //               'pj_hari_ini'       => $this->Dashboard_model->pj_hari_ini()->row()->total,
  //               'pj_kemarin'        => $this->Dashboard_model->pj_kemarin()->row()->total,
  //               'kasir_pj_hari_ini' => $this->Dashboard_model->kasir_pj_hari_ini()->row()->total,
  //               'kasir_pj_kemarin'  => $this->Dashboard_model->kasir_pj_kemarin()->row()->total,
  //               'kasir_total_wdisc' => $this->Dashboard_model->kasir_total_wdisc()->row()->total,
  //               'total_ndisc'       => $this->Dashboard_model->total_ndisc()->row()->grand_total,
  //               'total_wdisc'       => $this->Dashboard_model->total_wdisc()->row()->total,
  //               'total_pj_modal'    => $pj,
  //               'sum_minus'         => $this->Dashboard_model->sum_minus(),
  //               'sum_pj_barang'		=> $this->Dashboard_model->sum_pj_barang(),
  //               'sum_br_master'		=> $this->Dashboard_model->sum_br_master()
  //           );
			$this->load->view('temp/header');
			$this->load->view('temp/sidebar');			
			$this->load->view('temp/dashboard');	
			$this->load->view('temp/footer');
		// }else{
		// 	redirect(base_url());
		// }
	}
}
