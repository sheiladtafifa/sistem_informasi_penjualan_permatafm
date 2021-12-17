<?php

class Laporan_barang_keluar_model extends CI_Model
{
    function get_data()
    {
        return $this->db
            ->select('barang.kode_barang, 
                barang.nama_barang, 
                kategori_barang.nama_kategori,
                satuan.satuan,
                sum(barang_master.stok) as stok')
            ->from('barang')
            ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
            ->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
            ->join('barang_master', 'barang_master.id_br = barang.id_barang', 'left')
            ->where('barang_master.tipe', 'keluar')
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
