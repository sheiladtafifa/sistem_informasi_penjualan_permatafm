<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function tambah_customer()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('customer/tambah_customer');
		$this->load->view('temp/footer');
	}

	public function tampil_customer()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('customer/tampil_customer');
		$this->load->view('temp/footer');
	}

	public function cari_customer()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('customer/cari_customer');
		$this->load->view('temp/footer');
	}

}
