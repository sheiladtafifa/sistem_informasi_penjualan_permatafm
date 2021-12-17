<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// if(!$this->session->userdata('login'))
		// {
		// 	redirect('login');
		// }
		
		 $this->load->library('fungsi');
		 $this->load->model('Barang_model');
		 $this->load->model('Supplier_model');
		 $this->load->model('Kategori_model');
		 $this->load->model('Satuan_model');
		 $this->load->model('Invoice_model');
	}

	public function index()
	{
		$this->data['barang']=$this->Barang_model->get_all();

		$this->load->view('temp/temp_toko_online/header');
		$this->load->view('temp/temp_toko_online/sidebar');
		$this->load->view('temp/temp_toko_online/dashboard',$this->data);
		$this->load->view('temp/temp_toko_online/footer');
	}

	function kategori($kategori)
	{
		$data['produk'] = $this->produk_model->select_kategori($kategori);
		$this->load->view('welcome_message',$data);
	}

	public function tambah_ke_keranjang($id)
	{
		$barang = $this->Barang_model->find($id);

		$data = array(
	        'id'      => $barang->id_barang,
	        'qty'     => 1,
	        'price'   => $barang->harga_jual,
	        'name'    => $barang->nama_barang
		);

		$this->cart->insert($data);
		redirect('dashboard/index');
	}

	public function detail_keranjang()
	{
		$this->load->view('temp/temp_toko_online/header');
		$this->load->view('temp/temp_toko_online/sidebar');
		$this->load->view('temp/temp_toko_online/keranjang');
		$this->load->view('temp/temp_toko_online/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('dashboard/index');
	}

	public function detail($id_barang)
	{
		$data['barang'] = $this->Barang_model->detail_barang($id_barang);
		$this->load->view('temp/temp_toko_online/header');
		$this->load->view('temp/temp_toko_online/sidebar');
		$this->load->view('temp/temp_toko_online/detail_barang', $data);
		$this->load->view('temp/temp_toko_online/footer'); 
	}

	public function confirm_email()
	{
		$this->load->view('temp/temp_toko_online/header');
		$this->load->view('temp/temp_toko_online/sidebar');
		$this->load->view('temp/temp_toko_online/confirm_email');
		$this->load->view('temp/temp_toko_online/footer');
	}

	public function prosestransaksi()
	{
		$invoice = array(
			'date' => date('Y-m-d H:i:s'),
			'due_date' => date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
			'status' => 'unpaid',
			'nama' => $this->input->post('nama',true),
			'nope' => $this->input->post('nope',true),
			'alamat' => $this->input->post('alamat',true),
		);
		$this->db->insert('invoices', $invoice);
		$invoice_id = $this->db->insert_id();
		
		 $detail = array (
                'invoice_id' => $this->Invoice_model->get_data_last()
            );
		foreach($this->cart->contents() as $item)
		{
			$data = array(
					'invoice_id' => $detail['invoice_id'],
					'product_id' => $item['id'],
					'product_name' => $item['name'],
					'qty' 		=> $item['qty'],
					'price' 	=> $item['price'],
			);
			$this->db->insert('orders',$data);
		}
		
		$this->cart->destroy();
		
		$this->load->view('temp/temp_toko_online/header');
		$this->load->view('temp/temp_toko_online/sidebar');
		$this->load->view('temp/temp_toko_online/order_success');
		$this->load->view('temp/temp_toko_online/footer');

	}

	public function konfirmasi()
	{
		$this->load->view('temp/temp_toko_online/header');
		$this->load->view('temp/temp_toko_online/sidebar');
		$this->load->view('temp/temp_toko_online/konfirmasi');
		$this->load->view('temp/temp_toko_online/footer');
	}

	public function proses_konfirmasi()
	{
		$config['upload_path']          = './uploads/konfirmasi/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;

		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload())
		{
			$this->load->view('temp/temp_toko_online/header');
			$this->load->view('temp/temp_toko_online/sidebar');
			$this->load->view('temp/temp_toko_online/konfirmasi');
			$this->load->view('temp/temp_toko_online/footer');
		}
		else
		{
			$gambar = $this->upload->data();
			
			$data['invoice_id'] = $this->input->post('invoice_id',true);
			$data['gambar'] = $gambar['file_name'];
		
			$this->Invoice_model->insert_konfirmasi($data);
			$this->load->view('temp/temp_toko_online/header');
			$this->load->view('temp/temp_toko_online/sidebar');
			$this->load->view('temp/temp_toko_online/confirm_success');
			$this->load->view('temp/temp_toko_online/footer');
		}
	}

	// public function pembayaran()
	// {
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/sidebar');
	// 	$this->load->view('pembayaran');
	// 	$this->load->view('templates/footer');
	// }

	// public function proses_pesanan()
	// {
	// 	$is_processed = $this->model_invoice->index();
	// 	if ($is_processed) {
	// 		$this->cart->destroy();
	// 		$this->load->view('templates/header');
	// 		$this->load->view('templates/sidebar');
	// 		$this->load->view('proses_pesanan');
	// 		$this->load->view('templates/footer'); 
	// 	} else {
	// 		echo "Maaf, Pesanan Anda Gagal diproses!";
	// 	}
	// }

}
