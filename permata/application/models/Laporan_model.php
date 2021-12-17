<?php

class Laporan_model extends CI_Model
{

    function get_data()
    {
        return $this->db
            ->select('transaksi_penjualan.tgl_trx, 
                transaksi_penjualan.no_trx, 
                sum(detail_penjualan.jumlah) as jumlah,
                transaksi_penjualan.total')
            ->from('transaksi_penjualan')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan = transaksi_penjualan.id_penjualan', 'left')
            ->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left')
            ->group_by('transaksi_penjualan.no_trx')
            ->distinct()
            ->order_by('transaksi_penjualan.id_penjualan', 'ASC')
            ->get()
            ->result();
    }

    function get_metode()
    {
        return $this->db->get('pembayaran')->result();
    }


    function get_range($start, $end)
    {
        return $this->db
                ->select('transaksi_penjualan.tgl_trx, 
                          transaksi_penjualan.no_trx, 
                          sum(detail_penjualan.jumlah) as jumlah,
                          transaksi_penjualan.total')
                ->from('transaksi_penjualan')
                ->join('detail_penjualan', 'detail_penjualan.id_penjualan = transaksi_penjualan.id_penjualan', 'left')
                ->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left')
                ->where("tgl_trx >=", $start)
                ->where("tgl_trx <=", $end)
                ->group_by('transaksi_penjualan.no_trx')
                ->distinct()
                ->order_by('transaksi_penjualan.id_penjualan', 'ASC')
                ->get()
                ->result();
    }

    function hapus_trf($id)
    {
        $this->db->where('id', $id)->delete('detail_penjualan');
    }
    
    function hapus_id($id)
    {
        $this->db->where('id_dtlpen', $id)->delete('penjualan');
    }
}
