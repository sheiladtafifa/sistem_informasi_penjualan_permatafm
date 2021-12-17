<?php

class Laporan_barang_terjual_model extends CI_Model
{
    function get_data()
    {
        return $this->db
            ->select('barang.kode_barang, 
                barang.nama_barang, 
                kategori_barang.nama_kategori,
                satuan.satuan,
                sum(detail_penjualan.jumlah) as jumlah,
                sum(detail_penjualan.sub_total) as sub_total')
            ->from('barang')
            ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
            ->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
            ->join('detail_penjualan', 'detail_penjualan.id_barang = barang.id_barang', 'left')
            ->group_by('barang.kode_barang')
            ->distinct()
            ->order_by('barang.id_barang', 'ASC')
            ->get()
            ->result();
    }

    function get_range($start, $end)
    {
        return $this->db
            ->select('barang.kode_barang, 
                barang.nama_barang, 
                kategori_barang.nama_kategori,
                satuan.satuan,
                sum(barang_master.stok) as stok,
                barang_master.tglup')
            ->from('barang')
            ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
            ->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
            ->join('barang_master', 'barang_master.id_br = barang.id_barang', 'left')
            ->where('barang_master.tipe', 'masuk')
            ->where("tglup >=", $start)
            ->where("tglup <=", $end)
            ->group_by('barang.kode_barang')
            ->distinct()
            ->order_by('barang.id_barang', 'ASC')
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
