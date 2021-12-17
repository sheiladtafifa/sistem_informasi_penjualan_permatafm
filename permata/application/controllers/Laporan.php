<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('login');
        }

        $this->load->model('Laporan_model');
        $this->load->model('Laporan_barang_model');
        $this->load->model('Laporan_barang_masuk_model');
        $this->load->model('Laporan_barang_keluar_model');
        $this->load->model('Laporan_barang_terjual_model');
    }


    function laporan_penjualan($start = null , $end = null)
    {
        if (isset($_POST['search'])) {
            $start = $this->input->post('start_date');
            $end = $this->input->post('end_date');
            $data['laporan'] = $this->Laporan_model->get_range($start,$end);
            $this->load->view('temp/header_cetak');
            $this->load->view('temp/sidebar');
            $this->load->view('laporan/laporan_penjualan', $data);
            $this->load->view('temp/footer_cetak');
            // $this->load->view('temp/datatables');
        } else {
            $data['laporan'] = $this->Laporan_model->get_data();
            $this->load->view('temp/header_cetak');
            $this->load->view('temp/sidebar');
            $this->load->view('laporan/laporan_penjualan', $data);
            $this->load->view('temp/footer_cetak');
            // $this->load->view('temp/datatables');
        }
    }

    function laporan_barang()
    {
        $data['laporan'] = $this->Laporan_barang_model->get_data();
            $this->load->view('temp/header_cetak');
            $this->load->view('temp/sidebar');
            $this->load->view('laporan/laporan_barang', $data);
            $this->load->view('temp/footer_cetak');
    }

    function laporan_barang_masuk()
    {
        $data['laporan'] = $this->Laporan_barang_masuk_model->get_data();
            $this->load->view('temp/header_cetak');
            $this->load->view('temp/sidebar');
            $this->load->view('laporan/laporan_barang_masuk', $data);
            $this->load->view('temp/footer_cetak');
    }

    function laporan_barang_terjual()
    {
        $data['laporan'] = $this->Laporan_barang_terjual_model->get_data();
            $this->load->view('temp/header_cetak');
            $this->load->view('temp/sidebar');
            $this->load->view('laporan/laporan_barang_terjual', $data);
            $this->load->view('temp/footer_cetak');
    }

    function hapus($id)
    {
        $this->Model_laporan->hapus_trf($id);
        $this->Model_laporan->hapus_id($id);
    }
}
