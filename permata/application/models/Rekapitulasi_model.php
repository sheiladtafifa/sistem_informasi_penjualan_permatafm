<?php

class Rekapitulasi_model extends CI_Model
{

    function get_data()
    {
        return
            $this->db
            ->join('transaksi_penjualan', 'transaksi_penjualan.id_master = transaksi_penjualan_master.id_pjmaster', 'left')
            ->join('barang', 'barang.id_barang = transaksi_penjualan.id_brg', 'left')
            ->group_by('transaksi_penjualan_master.no_trx')
            ->distinct()
            ->order_by('transaksi_penjualan_master.id_pjmaster', 'ASC')
            ->get('transaksi_penjualan_master')->result();
    }

    function get_metode()
    {
        return $this->db->get('pembayaran')->result();
    }


    function get_range($start, $end)
    {
        return $this->db->join('transaksi_penjualan', 'transaksi_penjualan.id_master = transaksi_penjualan_master.id_pjmaster', 'left')
                ->join('barang', 'barang.id_barang = transaksi_penjualan.id_brg', 'left')
                ->where("tgl_trx >=", $start)
                ->where("tgl_trx <=", $end)
                ->group_by('transaksi_penjualan_master.no_trx')
                ->distinct()
                ->order_by('transaksi_penjualan_master.id_pjmaster', 'ASC')
                ->get('transaksi_penjualan_master')->result();
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
