<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
		
		 $this->load->library('fungsi');
		 $this->load->model('Supplier_model');
		 $this->load->model('Detail_pembelian_model');
		 $this->load->model('Transaksi_pembelian_model');
		 $this->load->model('Barang_model');
	}


	public function tambah_supplier()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('supplier/tambah_supplier');
		$this->load->view('temp/footer');
	}

	public function tampil_supplier()
	{
		$this->data['supplier']=$this->Supplier_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('supplier/tampil_supplier',$this->data);
		$this->load->view('temp/footer');
	}

	public function insert(){

		$this->data_supplier['nama_supplier']=$this->input->post('nama_supplier');
		$this->data_supplier['telp_supplier']=$this->input->post('telp_supplier');
		$this->data_supplier['alamat_supplier']=$this->input->post('alamat_supplier');
		
		$result=$this->Supplier_model->insert($this->data_supplier);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Supplier Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('Supplier/tambah_supplier');
		
	}

	public function edit($id_supplier=null){
		
		
		$this->data['supplier']=$this->Supplier_model->get_data($id_supplier);
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('supplier/edit_supplier');	
		$this->load->view('temp/footer');
	}

	public function edit_supplier($id_supplier=null){

		$this->data_supplier['nama_supplier']=$this->input->post('nama_supplier');
		$this->data_supplier['telp_supplier']=$this->input->post('telp_supplier');
		$this->data_supplier['alamat_supplier']=$this->input->post('alamat_supplier');

		// $this->data_supplier['status']=1;

		$result=$this->Supplier_model->edit($id_supplier,$this->data_supplier);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Supplier Berhasil Diupdate');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
			}

		redirect('Supplier/tampil_supplier');
		
	}


	public function delete($id_supplier= null)
	{
			
		$this->Supplier_model->delete($id_supplier);

		$this->session->set_flashdata('berhasil', 'Data Supplier Berhasil Dihapus');			

		redirect('Supplier/tampil_supplier');	

	}

	public function daftar_pesanan_produk()
	{
		$this->data['detail']=$this->Detail_pembelian_model->get_data_order($this->session->userdata('id'));
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('supplier/daftar_pesanan_produk',$this->data);
		$this->load->view('temp/footer');
	}

	// public function approve($id_detail_pembelian=null){

	// 	foreach ($this->cart->contents() as $items) {

 //            	$dpj[] = array(
 //            		'id_pembelian'	=> $detail['id_pembelian'],
 //            		'id_barang' 	=> $items['id_brg'],
 //            		'jumlah' 		=> $items['qty']
 //            	);

 //    //         	// ubah stock barang
	// 			// $barang=$this->Barang_model->get_data($id_barang[$items]);
	// 			// $this->barang['stok'] = $jumlah[$items] + $barang->stok;
	// 			// $this->Barang_model->edit($id_barang[$items],$this->barang);

 //            }
     
	// 	$this->data_supplier['status']=1;

	// 	$result=$this->Detail_pembelian_model->approve($id_detail_pembelian,$this->data_supplier);

	// 		 if($result != null)
	// 		{
	// 			$this->session->set_flashdata('berhasil', 'Data Permintaan Barang Diterima');			
	// 		}
	// 		else
	// 		{
	// 			redirect(base_url());			
	// 		}

	// 	redirect('Supplier/daftar_pesanan_produk');
		
	// }

	public function approve($id_detail_pembelian=null){

		$this->data_supplier['status']=1;

		$result=$this->Detail_pembelian_model->edit($id_detail_pembelian,$this->data_supplier);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Permintaan Barang Disetujui');			
			}
			else
			{
				redirect(base_url());			
			}

		redirect('Supplier/daftar_pesanan_produk');
		
	}

	public function remove($id_detail_pembelian=null){

		$this->data_supplier['status']=5;

		$result=$this->Detail_pembelian_model->edit($id_detail_pembelian,$this->data_supplier);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Permintaan Barang Ditolak');			
			}
			else
			{
				redirect(base_url());			
			}

		redirect('Supplier/daftar_pesanan_produk');
		
	}

}
