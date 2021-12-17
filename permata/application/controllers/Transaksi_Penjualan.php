<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata('login'))
		{
			redirect('login');
		}
		
		 $this->load->library('fungsi');
		 $this->load->model('Barang_model');
		 $this->load->model('Detail_penjualan_model');
		 $this->load->model('Transaksi_penjualan_model');
	}

	public function kasir()
	{
			$this->load->view('temp/header');
			$this->load->view('temp/sidebar');
			$this->load->view('transaksi/transaksi_penjualan/kasir',$data);
			$this->load->view('temp/footer');
	}

	public function tampil_transaksi_penjualan()
	{
		$this->data['transaksi_penjualan']=$this->Transaksi_penjualan_model->get_all();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_penjualan/tampil_transaksi_penjualan',$this->data);
		$this->load->view('temp/footer');
	}

	public function insert(){
		// input transaksi penjualan
		$this->transaksi_penjualan['invoice']=$this->input->post('invoice');
		$this->transaksi_penjualan['tanggal_penjualan'] = $this->input->post('tanggal_penjualan');
		$this->transaksi_penjualan['id_user']=$this->input->post('id_user');
		$this->transaksi_penjualan['nama_customer']=$this->input->post('nama_customer');
		$this->transaksi_penjualan['no_hp']=$this->input->post('no_hp');
		$this->Transaksi_penjualan_model->insert($this->transaksi_penjualan);
		$this->detail_penjualan['id_penjualan'] =$this->Transaksi_penjualan_model->get_data_last();

		// input detail
		$kode_barang = $this->input->post('kode_barang');
		$jumlah = $this->input->post('jumlah');
			$grand_total=0;
			$total=0;
			foreach($jumlah as $a => $b)
			{
				// input detail penjualan
				$this->detail_penjualan['kode_barang'] = $kode_barang[$a];
				$this->detail_penjualan['jumlah'] = $jumlah[$a];
				$this->Detail_penjualan_model->insert($this->detail_penjualan);

				// ubah stock barang
				$barang=$this->Barang_model->get_data($kode_barang[$a]);
				$this->barang['stok'] = $barang->stok - $jumlah[$a];
				$this->Barang_model->edit($kode_barang[$a],$this->barang);

				// total penjualan
				$total = $jumlah[$a] * $barang->harga_jual;
				$grand_total=$grand_total + $total;
			}
			$this->grand['total_penjualan'] = $grand_total;

		$this->Transaksi_penjualan_model->edit($this->detail_penjualan['id_penjualan'],$this->grand);

		$this->session->set_flashdata('berhasil', 'Data Penjualan Berhasil Diinput');
		redirect('Transaksi_Penjualan/tambah_transaksi_penjualan');
		
	}

	public function detail_transaksi_penjualan($id_penjualan=null)
	{
		$this->data['detail_penjualan']=$this->Detail_penjualan_model->get_data_penjualan($id_penjualan);

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('transaksi/transaksi_penjualan/detail_transaksi_penjualan',$this->data);
		$this->load->view('temp/footer');
	}
	
	function tambah_transaksi_penjualan()
    {
    	if ($this->session->userdata('jabatan')) {
    		$trx = $this->Transaksi_penjualan_model->cek_notrx();
    		if (empty($trx[0]['no_trx'])){
    			$data['notrx'] = date('Y').date('m').date('d')."1";
    		}else{
    			$data['notrx'] = $trx[0]['no_trx']+1;
    		}
    		$this->load->view('temp/header');
			$this->load->view('temp/sidebar');
			$this->load->view('transaksi/transaksi_penjualan/tambah_transaksi_penjualan', $data);
			$this->load->view('temp/footer');
		} else {
			redirect(base_url());
		}
    }

    function addcart($id_barang, $qty)
    {
    	if ($this->session->userdata('jabatan')) {
            $bmaster = $this->Transaksi_penjualan_model->lihat_bmaster($id_barang);
            if ($bmaster->row()->total >= $qty) {
	    	    $result = $this->Transaksi_penjualan_model->cart($id_barang);
                $data = array(
                    'id_brg'    => $result[0]['id_barang'],
                    'jml_brg'   => $result[0]['jumlah_barang'],
                    'id'        => $result[0]['kode_barang'],
                    'name'      => $result[0]['nama_barang'],
                    'qty'       => $qty,
                    'price'     => $result[0]['harga_jual']
                );
                $this->cart->insert($data);
                redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
            }else{
                $this->session->set_flashdata('message', 'Stok Barang Kosong!');
				redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
            }
		} else {
			redirect(base_url());
		}
    }

    function updatecart()
    {
    	if ($this->session->userdata('jabatan')) {
            $bmaster = $this->Transaksi_penjualan_model->lihat_bmaster($this->input->post('idbrg'));
            $stok = $this->Transaksi_penjualan_model->lihat_stok($this->input->post('idbrg'));
            if ($bmaster->row()->total >= $this->input->post('qty')) {
                $data = array(
                     'rowid' => $this->input->post('rowid'),
                     'qty'   => $this->input->post('qty')
                );
                $this->cart->update($data);
                redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
            } else {
                $this->session->set_flashdata('message', 'Stok Barang Tidak Cukup! Stok Barang Saat Ini Berjumlah '.$bmaster->row()->total);
				redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
            }
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
			redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
		} else {
			redirect(base_url());
		}
	}
    
	function cartdestroy()
	{
    	if ($this->session->userdata('jabatan')) {
			$this->cart->destroy();
			redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
		} else {
			redirect(base_url());
		}
	}

	function transaction()
	{
    	if ($this->session->userdata('jabatan')) {
            $penjualan = array(
                'id_user'       => $this->session->userdata('id'),
                'no_trx'        => $this->input->post('notrx'),
                'grand_total'   => $this->cart->total(),
                'total'         => $this->input->post('total'),
                'bayar'         => $this->input->post('bayar'),
                'kembalian'     => $this->input->post('kembalian'),
                'tgl_trx'       => date('Y-m-d'),
                'waktu_trx'     => date('H:i:s')
            );
                if ($penjualan['bayar'] < $penjualan['total']) {
                    $this->session->set_flashdata('message', 'Uang yang dibayar tidak cukup');
                    redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
                }
            $tpenjualan = $this->Transaksi_penjualan_model->insert($penjualan);
            $detail = array (
                'id_penjualan' => $this->Transaksi_penjualan_model->get_data_last()
            );
            foreach ($this->cart->contents() as $items) {
            	$dpj[] = array(
            		'id_penjualan'  => $detail['id_penjualan'],
                    'id_barang'     => $items['id_brg'],
                    'jumlah'        => $items['qty'],
                    'sub_total'     => $items['subtotal']
            	);
                $barang=$this->Barang_model->get_data($items['id_brg']);
                $this->barang['stok'] = $barang->stok - $items['qty'];
                $this->Barang_model->edit($items['id_brg'],$this->barang);
            }
            $dpenjualan = $this->Detail_penjualan_model->detail_penjualan($dpj);

                // $barang=$this->Barang_model->get_data($id_barang);
                // $this->barang['stok'] = $barang->stok - $jumlah;
                // $this->Barang_model->edit($id_barang,$this->barang);

            if ($tpenjualan && $dpenjualan){
                $this->cart->destroy();
            	// $this->cart->destroy();
                $this->session->set_flashdata('message', 'Penjualan Sukses');
                redirect('transaksi_penjualan/detail_trx/' . $this->input->post('notrx'));
				// $this->session->set_flashdata('message', 'Penjualan Sukses. <a class="alert-link" href="'.base_url().'index.php/transaksi_penjualan/detail_trx/'.$this->input->post('notrx').'">Lihat Detail Transaksi</a>');
				// redirect(base_url('index.php/transaksi_penjualan/tambah_transaksi_penjualan'));
            
            }else {
            redirect(base_url());
            }
        } 
	}

    function invoice()
    {
        if ($this->session->userdata('jabatan')) {
            $idusr = $this->session->userdata('id');
            if (!$this->uri->segment(3) && !$this->uri->segment(4)){
                $tgl_mulai  = str_replace('/','-',$this->input->post('mulai'));
                $tgl_sampai = str_replace('/','-',$this->input->post('sampai'));
            }else{
                $tgl_mulai  = $this->uri->segment(3);
                $tgl_sampai = $this->uri->segment(4);
            }
            $tgl_mulai_db = str_replace('-','/',$tgl_mulai);
            $tgl_sampai_db = str_replace('-','/',$tgl_sampai);
            $total = $this->Transaksi_penjualan_model->row_laporan($tgl_mulai_db, $tgl_sampai_db);
            $config['base_url']         = base_url('index.php/transaksi_penjualan/invoice/'.$tgl_mulai.'/'.$tgl_sampai);
            $config['total_rows']       = $total;
            $config['per_page']         = 10;
            $config['full_tag_open']    = '<div><ul class="pagination"><li class="page-item page-link"><strong>Halaman : </strong></li>';
            $config['full_tag_close']   = '</ul></div>';
            $config['first_link']       = '<li class="page-item page-link">Awal</li>';
            $config['last_link']        = '<li class="page-item page-link">Akhir</li>';
            $config['prev_link']        = '&laquo';
            $config['prev_tag_open']    = '<li class="page-item page-link">';
            $config['prev_tag_close']   = '</li>';
            $config['next_link']        = '&raquo';
            $config['next_tag_open']    = '<li class="page-item page-link">';
            $config['next_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="page-item page-link">';
            $config['cur_tag_close']    = '</li>';
            $config['num_tag_open']     = '<li class="page-item page-link">';
            $config['num_tag_close']    = '</li>';
            $this->pagination->initialize($config);
            $from = $this->uri->segment(5);
            $data = array(
                'tgl_mulai' => $tgl_mulai_db,
                'tgl_akhir' => $tgl_sampai_db,
                'halaman'   => $this->pagination->create_links(),
                'result'    => $this->Transaksi_penjualan_model->laporan($config['per_page'], $from, $tgl_mulai_db, $tgl_sampai_db)
            );
            $this->load->view('temp/header');
            $this->load->view('temp/sidebar');
            $this->load->view('transaksi/transaksi_penjualan/invoice', $data);
            $this->load->view('temp/footer');
        }else{
            redirect(base_url());
        }
    }

    function hasilcari()
    {
        $key = $this->input->get('q');
        $data = $this->Transaksi_penjualan_model->hasilcari($key);
        foreach ($data as $result) {
            echo '<a href="'.base_url().'index.php/transaksi_penjualan/addcart/'.$result->id_barang.'/1">'.$result->nama_barang.'</a><br />';
        }
    }

    function carinota()
    {
        if ($this->session->userdata('jabatan')) {
            $notrx = $this->input->post('nota');
            if (!$this->uri->segment(3)){
                $notrx = $this->input->post('nota');
            }else{
                $notrx = $this->uri->segment(3);
            }
            $total = $this->Transaksi_penjualan_model->row_pj_master($notrx);
            $config['base_url']         = base_url('transaksi_penjualan/carinota/'.$notrx);
            $config['total_rows']       = $total;
            $config['per_page']         = 10;
            $config['full_tag_open']    = '<div><ul class="pagination"><li class="page-item page-link"><strong>Halaman : </strong></li>';
            $config['full_tag_close']   = '</ul></div>';
            $config['first_link']       = '<li class="page-item page-link">Awal</li>';
            $config['last_link']        = '<li class="page-item page-link">Akhir</li>';
            $config['prev_link']        = '&laquo';
            $config['prev_tag_open']    = '<li class="page-item page-link">';
            $config['prev_tag_close']   = '</li>';
            $config['next_link']        = '&raquo';
            $config['next_tag_open']    = '<li class="page-item page-link">';
            $config['next_tag_close']   = '</li>';
            $config['cur_tag_open']     = '<li class="page-item page-link">';
            $config['cur_tag_close']    = '</li>';
            $config['num_tag_open']     = '<li class="page-item page-link">';
            $config['num_tag_close']    = '</li>';
            $this->pagination->initialize($config);
            $from = $this->uri->segment(4);
            $data = array(
                'carinota'  => $notrx,
                'halaman'   => $this->pagination->create_links(),
                'result'    => $this->Transaksi_penjualan_model->data_pj_master($config['per_page'], $from, $notrx)
            );
            $this->load->view('temp/header');
            $this->load->view('temp/sidebar');
            $this->load->view('transaksi/transaksi_penjualan/invoice', $data);
            $this->load->view('temp/footer');
        }else{
            redirect(base_url());
        }
    }

    function editnota($notrx)
    {
        if ($this->session->userdata('jabatan')) {
            $min = $this->Transaksi_penjualan_model->pj_minus($notrx);
            if ($min == 1) {
                $cek_user = $this->Transaksi_penjualan_model->cek_user_pjmaster($notrx);
                if ($cek_user[0]['id_user'] == $this->session->userdata('id')){
                    $r = $this->Transaksi_penjualan_model->detail_trx($notrx)->result_array();
                    $data = array(
                        'nota'          => $r['0']['no_trx'],
                        'tanggal'       => $r['0']['tgl_trx'],
                        'jam'           => $r['0']['waktu_trx'],
                        'kasir'         => $r['0']['nama_user'],
                        'jml_jual'      => $r['0']['jml_jual'],
                        'grand_total'   => $r['0']['grand_total'],
                        'diskon'        => $r['0']['diskon'],
                        'total'         => $r['0']['total'],
                        'bayar'         => $r['0']['bayar'],
                        'kembalian'     => $r['0']['kembalian'],
                        'keterangan'    => $r['0']['keterangan'],
                        'sub_total'     => $r['0']['sub_total'],
                        'result'        => $this->Transaksi_penjualan_model->detail_trx($notrx)->result()
                    );
                    $this->load->view('temp/header');
                    $this->load->view('temp/sidebar');
                    $this->load->view('transaksi/transaksi_penjualan/editnota', $data);
                    $this->load->view('temp/footer');
                } else if ($this->session->userdata('jabatan') == "Pegawai"){
                    $r = $this->Transaksi_penjualan_model->detail_trx($notrx)->result_array();
                    $data = array(
                        'nota'          => $r['0']['no_trx'],
                        'tanggal'       => $r['0']['tgl_trx'],
                        'jam'           => $r['0']['waktu_trx'],
                        'kasir'         => $r['0']['nama_user'],
                        'jml_jual'      => $r['0']['jml_jual'],
                        'grand_total'   => $r['0']['grand_total'],
                        'diskon'        => $r['0']['diskon'],
                        'total'         => $r['0']['total'],
                        'bayar'         => $r['0']['bayar'],
                        'kembalian'     => $r['0']['kembalian'],
                        'keterangan'    => $r['0']['keterangan'],
                        'sub_total'     => $r['0']['sub_total'],
                        'result'        => $this->Transaksi_penjualan_model->detail_trx($notrx)->result()
                    );
                    $this->load->view('temp/header');
                    $this->load->view('temp/sidebar');
                    $this->load->view('transaksi/transaksi_penjualan/editnota', $data);
                    $this->load->view('temp/footer');
                }else{
                    $this->session->set_flashdata('message', 'Ooopss! Terjadi Kesalahan');
                    $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                    redirect(base_url()."index.php/transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
                }
            } else {
                $this->session->set_flashdata('message', 'Ooopss! Terjadi Kesalahan');
                redirect(base_url()."index.php/transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
            }
        }else{
            redirect(base_url());
        }
    }

    function detail_trx($no_trx)
    {
        if ($this->session->userdata('jabatan')){
            $r = $this->Transaksi_penjualan_model->detail_trx($no_trx)->result_array();
            $data = array(
                'nota'          => $r['0']['no_trx'],
                'tanggal'       => $r['0']['tgl_trx'],
                'jam'           => $r['0']['waktu_trx'],
                'kasir'         => $r['0']['nama_user'],
                'grand_total'   => $r['0']['grand_total'],
                'total'         => $r['0']['total'],
                'bayar'         => $r['0']['bayar'],
                'kembalian'     => $r['0']['kembalian'],
                'sub_total'     => $r['0']['sub_total'],
                'result'        => $this->Transaksi_penjualan_model->detail_trx($no_trx)->result()
            );
            $this->load->view('temp/header');
            $this->load->view('temp/sidebar');
            $this->load->view('transaksi/transaksi_penjualan/detail_trx', $data);
            $this->load->view('temp/footer');
        }else{
            redirect(base_url());
        }
    }

    function edit_trx()
    {
        $cek_user = $this->Transaksi_penjualan_model->cek_user_pjmaster($this->input->post('notrx'));
        $r = $this->Transaksi_penjualan_model->detail_trx($notrx)->result_array();
        if ($this->session->userdata('jabatan')) {
            $min = $this->Transaksi_penjualan_model->pj_minus($this->input->post('notrx'));
            if ($min == 1) {
                if ($this->session->userdata('id') == $cek_user[0]['id_user']){
                    $dmaster = array(
                        'bayar'         => $this->input->post('bayar'),
                        'kembalian'     => $this->input->post('kembalian'),
                        'keterangan'    => $this->input->post('info')
                    );
                    $pjmaster = $this->Transaksi_penjualan_model->updatepjmaster($this->input->post('notrx'), $dmaster);
                    if ($pjmaster){
                        $this->session->set_flashdata('message', 'Transaksi Nomor <strong><a href="'.base_url('detail_trx/'.$this->input->post('notrx')).'">'.$this->input->post('notrx').'</a></strong> Berhasil Diubah');
                        $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                        redirect(base_url()."transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
                    }else{
                        $this->session->set_flashdata('message', 'Ooopss! Silahkan Ulangi Kembali');
                        $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                        redirect(base_url()."transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
                    }
                } else if ($this->session->userdata('jabatan') == "Pegawai"){
                    $dmaster = array(
                        'bayar'         => $this->input->post('bayar'),
                        'kembalian'     => $this->input->post('kembalian'),
                        'keterangan'    => $this->input->post('info')
                    );
                    $pjmaster = $this->Transaksi_penjualan_model->updatepjmaster($this->input->post('notrx'), $dmaster);
                    if ($pjmaster){
                        $this->session->set_flashdata('message', 'Transaksi Nomor <strong><a href="'.base_url('detail_trx/'.$this->input->post('notrx')).'">'.$this->input->post('notrx').'</a></strong> Berhasil Diubah');
                        $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                        redirect(base_url()."transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
                    }else{
                        $this->session->set_flashdata('message', 'Ooopss! Silahkan Ulangi Kembali');
                        $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                        redirect(base_url()."transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
                    }
                }else{
                    $this->session->set_flashdata('message', 'Ooopss! Terjadi Kesalahan');
                    $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                    redirect(base_url()."transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
                }
            } else {
                $this->session->set_flashdata('message', 'Ooopss! Terjadi Kesalahan');
                $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y'));
                redirect(base_url()."transaksi_penjualan/invoice/".date('Y-m-d', $time)."/".date('Y-m-d'));
            }
        }else{
            redirect(base_url());
        }
    }
}