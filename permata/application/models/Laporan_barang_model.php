<?php

class Laporan_barang_model extends CI_Model
{
    function get_data()
    {
        return $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
                        ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                        ->join('supplier', 'supplier.id_supplier = barang.supplier', 'left')
                        ->order_by('id_barang ASC')
                        ->get('barang')
                        ->result();
    }

    function get_metode()
    {
        return $this->db->get('pembayaran')->result();
    }


    function get_range($start, $end, $metode)
    {
        if ($metode != '') {
            return $this->db->join('penjualan', 'penjualan.id_dtlpen = detail_penjualan.id', 'left')
                ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
                ->join('pembayaran', ' detail_penjualan.id_pembayaran = pembayaran.id_byr ', 'inner')
                ->where("tgl_trf >=", $start)
                ->where("tgl_trf <=", $end)
                ->where('id_pembayaran', $metode)
                ->group_by('detail_penjualan.no_trf')
                ->distinct()
                ->order_by('detail_penjualan.id', 'ASC')
                ->get('detail_penjualan')->result();
        } else {
            return $this->db->join('penjualan', 'penjualan.id_dtlpen = detail_penjualan.id', 'left')
                ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
                ->join('pembayaran', ' detail_penjualan.id_pembayaran = pembayaran.id_byr ', 'inner')
                ->where("tgl_trf >=", $start)
                ->where("tgl_trf <=", $end)
                ->group_by('detail_penjualan.no_trf')
                ->distinct()
                ->order_by('detail_penjualan.id', 'ASC')
                ->get('detail_penjualan')->result();
        }
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
