<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class Transaksi_Pembelian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('login')) {
			redirect('login');
		}

		$this->load->library('fungsi');
		$this->load->model('Barang_model');
		$this->load->model('Detail_pembelian_model');
		$this->load->model('Transaksi_pembelian_model');
		$this->load->model('Supplier_model');
	}

	public function tambah_transaksi_pembelian()
	{
		$this->data['list'] = $this->Barang_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar', $this->data);
		$this->load->view('transaksi/transaksi_pembelian/tambah_transaksi_pembelian');
		$this->load->view('temp/footer');
	}

	public function tampil_transaksi_pembelian()
	{
		$this->data['transaksi_pembelian'] = $this->Transaksi_pembelian_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_pembelian/tampil_transaksi_pembelian', $this->data);
		$this->load->view('temp/footer');
	}

	public function detail_transaksi_pembelian($id_pembelian = null)
	{
		$this->data['detail_pembelian'] = $this->Detail_pembelian_model->get_data_pembelian($id_pembelian);

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_pembelian/detail_transaksi_pembelian', $this->data);
		$this->load->view('temp/footer');
	}


	public function insert()
	{
		// input transaksi pembelian
		$this->transaksi_pembelian['id_user']           = $this->session->userdata('id');
		$this->transaksi_pembelian['tanggal_pembelian'] = date("Y-m-d");

		$this->Transaksi_pembelian_model->insert($this->transaksi_pembelian);

		$this->detail_pembelian['id_pembelian'] = $this->Transaksi_pembelian_model->get_data_last();

		// input detail
		$id_barang = $this->input->post('id_barang');
		$jumlah = $this->input->post('jumlah');
		$grand_total = 0;
		$total = 0;
		foreach ($jumlah as $a => $b) {
			// input detail pembelian
			$this->detail_pembelian['id_barang'] = $id_barang[$a];
			$this->detail_pembelian['jumlah']    = $jumlah[$a];
			$this->Detail_pembelian_model->insert($this->detail_pembelian);

			// ubah stock barang
			$barang = $this->Barang_model->get_data($id_barang[$a]);
			// $this->barang['stok'] = $jumlah[$a] + $barang->stok;
			// $this->Barang_model->edit($id_barang[$a],$this->barang);

			// total pembelian
			$total       = $jumlah[$a] * $barang->harga_beli;
			$grand_total = $grand_total + $total;
		}
		$this->grand['total_pembelian'] = $grand_total;

		$this->Transaksi_pembelian_model->edit($this->detail_pembelian['id_pembelian'], $this->grand);

		$this->session->set_flashdata('berhasil', 'Data Pembelian Berhasil Diinput');
		redirect('Transaksi_Pembelian/tampil_transaksi_pembelian');
	}

	public function transaksi_pembelian()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_pembelian/transaksi_pembelian');
		$this->load->view('temp/footer');
	}

	function addcart($id_barang, $qty)
	{
		if ($this->session->userdata('jabatan')) {
			$result = $this->Detail_pembelian_model->cart($id_barang);
			$data = array(
				'id_brg'    => $result[0]['id_barang'],
				'jml_brg'   => $result[0]['jumlah_barang'],
				'id'        => $result[0]['kode_barang'],
				'name'      => $result[0]['nama_barang'],
				'qty'       => $qty,
				'price'     => $result[0]['harga_beli']
			);
			$this->cart->insert($data);
			redirect(base_url('index.php/transaksi_pembelian/transaksi_pembelian'));
		} else {
			redirect(base_url());
		}
	}

	function updatecart()
	{
		if ($this->session->userdata('jabatan')) {
			$data = array(
				'rowid' => $this->input->post('rowid'),
				'qty'   => $this->input->post('qty')
			);
			$this->cart->update($data);
			redirect(base_url('index.php/transaksi_pembelian/transaksi_pembelian'));
		} else {
			redirect(base_url());
		}
	}

	function removecart($row)
	{
		if ($this->session->userdata('jabatan')) {
			$data = array(
				'rowid' => $row,
				'qty'   => 0,
			);
			$this->cart->update($data);
			redirect(base_url('index.php/transaksi_pembelian/transaksi_pembelian'));
		} else {
			redirect(base_url());
		}
	}

	function cartdestroy()
	{
		if ($this->session->userdata('jabatan')) {
			$this->cart->destroy();
			redirect(base_url('index.php/transaksi_pembelian/transaksi_pembelian'));
		} else {
			redirect(base_url());
		}
	}

	function transaction()
	{
		if ($this->session->userdata('jabatan')) {
			$pembelian = array(
				'id_user'       			=> $this->session->userdata('id'),
				'tanggal_pembelian'   => date('Y-m-d'),
				'total_pembelian'   	=> $this->cart->total()
			);

			$tpembelian = $this->Transaksi_pembelian_model->insert($pembelian);

			// $detail = array(
			// 	'id_pembelian' => $this->Transaksi_pembelian_model->get_data_last()
			// );

			$id_pembelian = $this->db->insert_id();

			foreach ($this->cart->contents() as $items) {
				$dpj[] = array(
					'id_pembelian'	=> $id_pembelian,
					'id_barang' 		=> $items['id_brg'],
					'jumlah' 				=> $items['qty'],
					'status'				=> '2'
				);
				
			}

			$dpembelian = $this->Detail_pembelian_model->detail_pembelian($dpj);

			$to = $this->Detail_pembelian_model->get_supplier_by_produk($id_pembelian);
			

			$getAllDetailPembelian 	= $this->Detail_pembelian_model->get_data_pembelian($id_pembelian);

			// echo '<pre>';
			// var_dump($to);
			// echo '</pre>';

			// var_dump($getAllDetailPembelian);
			// var_dump($to);

			if ($tpembelian && $dpembelian) {
				$this->cart->destroy();
				// $this->session->set_flashdata('message', 'Penjualan Sukses');
				// redirect('transaksi_penjualan/detail_trx/' . $this->input->post('notrx'));

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);
				// SMTP configuration
				// Set email format to HTML
				$mail->SMTPDebug = 3;        // hilangkan komen baris ini kalau mau debugging (1 = client, 2 = client and server, 3 = client, server, connection, 4 = low level information)
				$mail->isSMTP();
				$mail->isHTML(true);

				$mail->Host        = 'smtp.gmail.com';          // nama domain web Anda
				$mail->SMTPAuth    = true;
				$mail->SMTPSecure  = 'tls';
				$mail->Port        = 587;
				$mail->Username    = 'permatafm88@gmail.com';
				$mail->Password    = '8899Permata';

				foreach ($to as $key => $to) {
					$sendDataToMail = array(
						'nama_user'              	=> $this->session->userdata('nama'),
						'total_pembelian'        	=> $this->cart->total(),
						'detailPembelian'         => $getAllDetailPembelian,
					);

					$message = $this->load->view('blast_email', $sendDataToMail, TRUE);

					$mail->setFrom('permatafm88@gmail.com', 'namaAnda');
					$mail->addReplyTo('permatafm88@gmail.com');

					// penerima email
					$mail->addAddress($to->email);

					// judul email
					$mail->Subject = 'Ada Transaksi Pembelian Baru';

					// set email yg akan dikirim dalam variabel
					$mail->Body = $message;

					$mail->send();
				}

				$this->session->set_flashdata('berhasil', 'Data Pembelian Berhasil Diinput');
				redirect('Transaksi_Pembelian/riwayat_pesanan');
			} else {
				redirect(base_url());
			}
		}
	}

	function hasilcari()
	{
		$key = $this->input->get('q');
		$data = $this->Transaksi_pembelian_model->hasilcari($key);
		foreach ($data as $result) {
			echo '<a href="' . base_url() . 'index.php/transaksi_pembelian/addcart/' . $result->id_barang . '/1">' . $result->nama_barang . '</a><br />';
		}
	}

	public function konfirmasi()
	{
		$this->data['detail'] = $this->Detail_pembelian_model->get_data_konfirmasi();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_pembelian/konfirmasi', $this->data);
		$this->load->view('temp/footer');
	}

	public function approve($id_detail_pembelian = null, $id_barang = null, $jumlah = null)
	{

		$this->data_supplier['status'] = 2;

		$result = $this->Detail_pembelian_model->edit($id_detail_pembelian, $this->data_supplier);

		// ubah stock barang


		$barang = $this->Barang_model->get_data($id_barang);
		$this->barang['stok'] = $jumlah + $barang->stok;
		$this->Barang_model->edit($id_barang, $this->barang);


		if ($result != null) {
			$this->session->set_flashdata('berhasil', 'Barang Sudah Sampai di Gudang');
		} else {
			redirect(base_url());
		}

		redirect('Transaksi_Pembelian/riwayat_pesanan');
	}

	public function riwayat_pesanan()
	{
		$this->data['detail'] = $this->Detail_pembelian_model->get_data_riwayat();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_pembelian/riwayat_pesanan', $this->data);
		$this->load->view('temp/footer');
	}
}
