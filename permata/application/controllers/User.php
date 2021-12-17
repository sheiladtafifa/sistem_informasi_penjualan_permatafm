<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
		redirect('login');
		}
		
		 $this->load->model('User_model');
	}


	public function tambah_user()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('user/tambah_user');
		$this->load->view('temp/footer');
	}

	public function tampil_user()
	{
		$this->data['user']=$this->User_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('user/tampil_user',$this->data);
		$this->load->view('temp/footer');
	}

	public function user_login()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('user/user_login');
		$this->load->view('temp/footer');
	}

	public function insert(){

		$this->data_user['username']=$this->input->post('username');
		$this->data_user['password']=md5($this->input->post('password'));
		$this->data_user['nama_user']=$this->input->post('nama_user');
		$this->data_user['jabatan']=$this->input->post('jabatan');
		
		$result=$this->User_model->insert($this->data_user);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data User Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('User/tambah_user');
		
	}

	public function profile_user($id_user=null){

		$this->data['user']=$this->User_model->get_data($id_user);
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('user/profile_user');	
		$this->load->view('temp/footer');
	}

	public function edit_profile_user($id_user=null){

		$this->data_user['username']=$this->input->post('username');
		if($this->input->post('password')!= null)
		{
			$this->data_user['password']=md5($this->input->post('password'));

				$this->session->set_userdata(array(
					'login' => true,
					'password'=> $this->data_user['password']));
		}
		$this->data_user['nama_user']=$this->input->post('nama_user');

		$result=$this->User_model->edit($id_user,$this->data_user);

			 if($result != null)
			{
				$this->session->set_userdata(array(
					'login' => true,
					'nama' => $this->data_user['nama_user'],
					'username' => $this->data_user['username']));	
				$this->session->set_flashdata('berhasil', 'Data User Berhasil Diupdate');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
			}

		 redirect('User/profile_user');
	}


	public function edit($id_user=null){
		
		
		$this->data['user']=$this->User_model->get_data($id_user);
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('user/edit_user');	
		$this->load->view('temp/footer');
	}

	public function edit_user($id_user=null){

		$this->data_user['username']=$this->input->post('username');
		if($this->input->post('password')!= null)
		{
			$this->data_user['password']=md5($this->input->post('password'));
		}
		$this->data_user['nama_user']=$this->input->post('nama_user');
		$this->data_user['jabatan']=$this->input->post('jabatan');

		$result=$this->User_model->edit($id_user,$this->data_user);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data User Berhasil Diupdate');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
			}

		redirect('User/tampil_user');
		
	}

	public function delete($id_user= null)
	{
			
		$this->User_model->delete($id_user);

		$this->session->set_flashdata('berhasil', 'Data User Berhasil Dihapus');			

		redirect('User/tampil_user');	

	}

}
