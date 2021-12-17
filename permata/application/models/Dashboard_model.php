<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	// function total()
 //    {
 //        return $this->db->select('id_barang, harga_beli, harga_jual')
 //                        ->get('barang')->result();
 //    }

 //    function modal_barang($id)
 //    {
 //        return $this->db->select('harga_beli')
 //                        ->where('id_barang', $id)
 //                        ->get('barang');
 //    }

 //    function total_barang_masuk($id)
 //    {
 //        return $this->db->select('SUM(stok) as stok')
 //                        ->where('id_br', $id)
 //                        ->where('tipe', 'masuk')
 //                        ->get('barang_master');
 //    }

 //    function total_barang_terjual($id)
 //    {
 //        return $this->db->select('SUM(jml_jual) as jml_jual')
 //                        ->where('id_brg', $id)
 //                        ->get('transaksi_penjualan');
 //    }

 //    function pj_hari_ini()
 //    {
 //        return $this->db->select('SUM(total) as total')
 //                        ->where('tgl_trx', date('Y-m-d'))
 //                        ->get('transaksi_penjualan_master');
 //    }

 //    function pj_kemarin()
 //    {
 //        $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
 //        return $this->db->select('SUM(total) as total')
 //                        ->where('tgl_trx', $kemarin)
 //                        ->get('transaksi_penjualan_master');
 //    }

 //    function kasir_pj_hari_ini()
 //    {
 //        $iduser = $this->session->userdata('id');
 //        if ($iduser){
 //            return $this->db->select('SUM(total) as total')
 //                            ->where('tgl_trx', date('Y-m-d'))
 //                            ->where('id_user', $iduser)
 //                            ->get('transaksi_penjualan_master');  
 //        }
 //    }

 //    function kasir_pj_kemarin()
 //    {
 //        $iduser = $this->session->userdata('id');
 //        if ($iduser){
 //            $kemarin = date('Y-m-d', strtotime("-1 day", strtotime(date("Y-m-d"))));
 //            return $this->db->select('SUM(total) as total')
 //                            ->where('tgl_trx', $kemarin)
 //                            ->where('id_user', $iduser)
 //                            ->get('transaksi_penjualan_master');
 //        }
 //    }

 //    function kasir_total_wdisc()
 //    {
 //        $iduser = $this->session->userdata('id');
 //        if ($iduser){
 //            return $this->db->select('SUM(total) as total')
 //                            ->where('id_user', $iduser)
 //                            ->get('transaksi_penjualan_master');
 //        }
 //    }

 //    function total_ndisc()
 //    {
 //        return $this->db->select('SUM(grand_total) as grand_total')
 //                        ->get('transaksi_penjualan_master');
 //    }

 //    function total_wdisc()
 //    {
 //        return $this->db->select('SUM(total) as total')
 //                        ->get('transaksi_penjualan_master');
 //    }

 //    function sum_minus()
 //    {
 //        return $this->db->or_like('kembalian', '-')
 //                        ->select('SUM(kembalian) as kbl')
 //                        ->get('transaksi_penjualan_master')
 //                        ->row()
 //                        ->kbl;
 //    }

 //    function sum_pj_barang()
 //    {
 //        return $this->db->select('SUM(jml_jual) as jmljual')
 //                        ->get('transaksi_penjualan')
 //                        ->row()
 //                        ->jmljual;
 //    }

 //    function sum_br_master()
 //    {
 //        return $this->db->select('SUM(stok) as jmlstok')
 //                        ->get('barang_master')
 //                        ->row()
 //                        ->jmlstok;
 //    }

}