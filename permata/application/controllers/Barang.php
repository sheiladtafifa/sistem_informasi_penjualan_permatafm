<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
		
		 $this->load->library('fungsi');
		 $this->load->model('Barang_model');
		 $this->load->model('Supplier_model');
		 $this->load->model('Kategori_model');
		 $this->load->model('Satuan_model');
	}

	public function tambah_barang()
	{
		$this->data['supplier']=$this->Supplier_model->get_all();
		$this->data['kategori_barang']=$this->Kategori_model->get_all();
		$this->data['satuan']=$this->Satuan_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('barang/tambah_barang',$this->data);
		$this->load->view('temp/footer');
	}

	public function tampil_barang()
	{
		$this->data['barang']=$this->Barang_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('barang/tampil_barang',$this->data);
		$this->load->view('temp/footer');
	}

	public function insert(){

		$this->data_barang['nama_barang']=$this->input->post('nama_barang');
		$this->data_barang['harga_jual']=$this->input->post('harga_jual');
		$this->data_barang['harga_beli']=$this->input->post('harga_beli');
		$this->data_barang['satuan']=$this->input->post('satuan');
		$this->data_barang['kode_kategori']=$this->input->post('kode_kategori');
		$this->data_barang['id_supplier']=$this->input->post('id_supplier');

		$result=$this->Barang_model->insert($this->data_barang);

			 if($result != null)
			{
				$this->session->set_flashdata('berhasil', 'Data Barang Berhasil Diinput');			
			}
			else
			{
				$this->session->set_flashdata('gagal', 'Data Gagal Diinput ');				
			}

		redirect('Barang/tambah_barang');
		
	}

	function input()
	{
		if ($this->session->userdata('jabatan') == "Gudang") {
			$rk = $this->Barang_model->kode_kateg($this->input->post('kategori_barang'));
			$rb = $this->Barang_model->idbarang();
			if (!$rb[0]['id_barang']) {
				$id_barang = 1;
			}else{
				$id_barang = $rb[0]['id_barang']+1;
			}

			$kode_barang		= $rk[0]['kode_kategori'].date('Y').date('m').date('d').$this->input->post('kategori_barang').$id_barang;
			$kategori_barang 	= $this->input->post('kategori_barang');
			$nama_barang 		= $this->input->post('nama_barang');
			$satuan				= $this->input->post('satuan');
			$harga_beli 		= $this->input->post('harga_beli');
			$harga_jual 		= $this->input->post('harga_jual');
            $supplier 			= $this->input->post('supplier');
            $gambar				= $_FILES['gambar']['name'];

			if ($gambar = '') {
				
			}
			else 
			{
				$config ['upload_path'] = './upload';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "Gambar gagal diupload";
				} else
				{
					$gambar=$this->upload->data('file_name');
				}
			}

			$barang = array (
			'kode_barang'		=> $kode_barang,
			'kategori_barang' 	=> $kategori_barang,
			'nama_barang' 		=> $nama_barang,
			'satuan' 			=> $satuan,
			'harga_beli' 		=> $harga_beli,
			'harga_jual' 		=> $harga_jual,
			'supplier' 			=> $supplier,
			'gambar'	 		=> $gambar
			);

			$brg = $this->Barang_model->input($barang);
			if ($brg) {
				$this->session->set_flashdata('berhasil', 'Barang Baru Berhasil Ditambahkan');
				redirect(base_url('index.php/barang/tampil_barang'));
			}else{
				$this->session->set_flashdata('gagal', 'Ooopss! Silahkan Ulangi Kembali');
				redirect(base_url('index.php/barang/tambah_barang'));
			}
		}else{
			redirect(base_url());
		}
	}

	// function input()
	// {
	// 	if ($this->session->userdata('jabatan') == "Gudang") {
	// 		$rk = $this->Barang_model->kode_kateg($this->input->post('kategori_barang'));
	// 		$rb = $this->Barang_model->idbarang();
	// 		if (!$rb[0]['id_barang']) {
	// 			$id_barang = 1;
	// 		}else{
	// 			$id_barang = $rb[0]['id_barang']+1;
	// 		}
			
	// 		$barang = array(
	// 			'kode_barang'		=> $rk[0]['kode_kategori'].date('Y').date('m').date('d').$this->input->post('kategori_barang').$id_barang,
	// 			'kategori_barang' 	=> $this->input->post('kategori_barang'),
	// 			'nama_barang' 		=> $this->input->post('nama_barang'),
	// 			'satuan' 			=> $this->input->post('satuan'),
	// 			'harga_beli' 		=> $this->input->post('harga_beli'),
	// 			'harga_jual' 		=> $this->input->post('harga_jual'),
 //                'supplier' 			=> $this->input->post('supplier'),
 //                'gambar'			=> $gambar
	// 		);
	// 		$brg = $this->Barang_model->input($barang);
	// 		if ($brg) {
	// 			$this->session->set_flashdata('berhasil', 'Barang Baru Berhasil Ditambahkan');
	// 			redirect(base_url('index.php/barang/tampil_barang'));
	// 		}else{
	// 			$this->session->set_flashdata('gagal', 'Ooopss! Silahkan Ulangi Kembali');
	// 			redirect(base_url('index.php/barang/tambah_barang'));
	// 		}
	// 	}else{
	// 		redirect(base_url());
	// 	}
	// }

	public function edit($id_barang=null){
		
		$this->data['barang']=$this->Barang_model->get_data($id_barang);
		$this->data['supplier']=$this->Supplier_model->get_all();
		$this->data['kategori_barang']=$this->Kategori_model->get_all();
		$this->data['satuan']=$this->Satuan_model->get_all();
		
		$this->load->view('temp/header');	
		$this->load->view('temp/sidebar',$this->data);			
		$this->load->view('barang/edit_barang');	
		$this->load->view('temp/footer');
	}

	// public function edit_barang($kode_barang=null){

	// 	$this->data_barang['nama_barang']=$this->input->post('nama_barang');
	// 	$this->data_barang['harga_jual']=$this->input->post('harga_jual');
	// 	$this->data_barang['harga_beli']=$this->input->post('harga_beli');
	// 	$this->data_barang['satuan']=$this->input->post('satuan');
	// 	$this->data_barang['kode_kategori']=$this->input->post('kode_kategori');
	// 	$this->data_barang['id_supplier']=$this->input->post('id_supplier');

	// 	$result=$this->Barang_model->edit($kode_barang,$this->data_barang);

	// 		 if($result != null)
	// 		{
	// 			$this->session->set_flashdata('berhasil', 'Data Barang Berhasil Diupdate');			
	// 		}
	// 		else
	// 		{
	// 			$this->session->set_flashdata('gagal', 'Data Gagal Diupdate');				
	// 		}

	// 	redirect('Barang/tampil_barang');
		
	// }


	public function delete($id_barang= null)
	{
			
		$this->Barang_model->delete($id_barang);

		$this->session->set_flashdata('berhasil', 'Data Barang Berhasil Dihapus');			

		redirect('Barang/tampil_barang');	

	}

	
	// function edit($id)
	// {
	// 	if ($this->session->userdata('jabatan') == "Pegawai") {
	// 		$result = $this->Barang_model->lihat_barang($id);
 //            $bmaster = $this->Barang_model->lihat_bmaster($id);
	// 		$data = array(
	// 			'id_barang' 		=> $result[0]['id_barang'],
	// 			'kode_barang' 		=> $result[0]['kode_barang'],
	// 			'id_kategori' 		=> $result[0]['id_kategori'],
	// 			'nama_kategori'		=> $result[0]['nama_kategori'],
	// 			'allcat'			=> $this->Barang_model->kategori(),
	// 			'nama_barang' 		=> $result[0]['nama_barang'],
	// 			'jumlah_barang' 	=> $bmaster->row()->total,
	// 			'allsatuan'			=> $this->Barang_model->satuan(),
	// 			'id_satuan' 		=> $result[0]['id_satuan'],
	// 			'satuan' 			=> $result[0]['satuan'],
	// 			'harga_beli' 		=> $result[0]['harga_beli'],
	// 			'harga_jual' 		=> $result[0]['harga_jual'],
	// 			'allsupplier'		=> $this->Barang_model->supplier(),
	// 			'id_supplier' 		=> $result[0]['id_supplier'],
	// 			'nama_supplier' 	=> $result[0]['nama_supplier']
	// 		);
	// 		$this->load->view('temp/header');	
	// 		$this->load->view('temp/sidebar');			
	// 		$this->load->view('barang/edit_barang', $data);	
	// 		$this->load->view('temp/footer');
	// 	}else{
	// 		redirect(base_url());
	// 	}
	// }

	function update($id_barang=null)
	{
		if ($this->session->userdata('jabatan') == "Gudang") {
			$rk = $this->Barang_model->kode_kateg($this->input->post('kategori_barang'));
			$kode_barang		= $rk[0]['kode_kategori'].date('Y').date('m').date('d').$this->input->post('kategori_barang').$id_barang;
			$kategori_barang 	= $this->input->post('kategori_barang');
			$nama_barang 		= $this->input->post('nama_barang');
			$satuan				= $this->input->post('satuan');
			$harga_beli 		= $this->input->post('harga_beli');
			$harga_jual 		= $this->input->post('harga_jual');
            $supplier 			= $this->input->post('supplier');
            $gambar				= $_FILES['gambar']['name'];
			
			if ($gambar = '') {
				
			}
			else 
			{
				$config ['upload_path'] = './upload';
				$config ['allowed_types'] = 'jpg|jpeg|png|gif';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo "Gambar gagal diupload";
				} else
				{
					$gambar=$this->upload->data('file_name');
				}
			}

			$barang = array (
			'kode_barang'		=> $kode_barang,
			'kategori_barang' 	=> $kategori_barang,
			'nama_barang' 		=> $nama_barang,
			'satuan' 			=> $satuan,
			'harga_beli' 		=> $harga_beli,
			'harga_jual' 		=> $harga_jual,
			'supplier' 			=> $supplier,
			'gambar'	 		=> $gambar
			);

			$exec = $this->Barang_model->edit($id_barang, $barang);
			if ($exec) {
				$this->session->set_flashdata('berhasil', 'Data Barang Berhasil Diubah');
				redirect(base_url('index.php/barang/tampil_barang'));
			}else{
				$this->session->set_flashdata('gagal', 'Gagal! Silahkan Ulangi Kembali');
				redirect(base_url('index.php/barang/edit/'.$id));
			}
		}else{
			redirect(base_url());
		}
	}
	
}
