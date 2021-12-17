<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	
		$this->load->model('User_model');
		$this->load->model('Supplier_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function autentication()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$jabatan = $this->input->post('jabatan');

			$cek=$this->User_model->cek_login($username, md5($password));

			if($cek!= null)
			{			
				$jabatan = $cek->jabatan;
				$password = $cek->password;
				$username = $cek->username;
				$nama = $cek->nama_user;
				$id = $cek->id_user;
				
				$this->session->set_userdata(array(
					'login' => true,
					'nama' => $nama,
					'id' => $id,
					'jabatan' => $jabatan,
					'username' => $username,
					'password'=> $password));						
				
				 redirect('Permata');
			}
			else
			{
				$this->session->set_flashdata('login','login tidak berhasil <br> username dan password salah');
				redirect('login');
			}
			
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');

	}
	
}

?>