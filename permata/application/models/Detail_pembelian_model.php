<?php
class Detail_pembelian_model extends CI_Model
{
    private $primary_key = 'id_detail_pembelian';
    private $table_name  = 'detail_pembelian';

    function __construct()
    {
        parent::__construct();
    }

    // function cek_login($nip,$password){

    //      $query=$this->db->query ("SELECT * From barang where nip ='{$nip}' AND password ='{$password}' ");
    //      return $query->row();
    // }

    function get_data($id)
    {
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        //$this->db->join('supplier','supplier.id_supplier=barang.id_supplier');
        //$this->db->join('kategori_barang','kategori_barang.kode_kategori=barang.kode_kategori');

        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_supplier_by_produk($id)
    {
        $this->db->select('
        barang.kode_barang, barang.nama_barang, barang.gambar,
        supplier.nama_supplier, supplier.email,
        transaksi_pembelian.tanggal_pembelian, transaksi_pembelian.total_pembelian,
        detail_pembelian.id_pembelian, jumlah
        ');
        
        $this->db->join('barang', 'barang.id_barang = detail_pembelian.id_barang');
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian = detail_pembelian.id_pembelian');        
        $this->db->join('supplier', 'supplier.id_supplier = barang.supplier');

        $this->db->where('detail_pembelian.id_pembelian', $id);

        $this->db->group_by('supplier.email');

        $query = $this->db->get($this->table_name)->result();

        return $query;
    }

    function get_all_where()
    {
        $this->db->where('jabatan', 'Penilai');
        $this->db->or_where_in('jabatan', 'Kepala Penilai');
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_data_pembelian($id)
    {
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');

        $this->db->where('detail_pembelian.id_pembelian', $id);

        $this->db->order_by($this->primary_key);

        $query = $this->db->get($this->table_name);
        
        return $query->result();
    }

    function get_all()
    {
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        // $this->db->join('supplier','supplier.id_supplier=barang.id_supplier');
        // $this->db->join('kategori_barang','kategori_barang.kode_kategori=barang.kode_kategori');

        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_data_order($id_supplier)
    {
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori=barang.kategori_barang');
        $this->db->join('satuan', 'satuan.id_satuan=barang.satuan');
        $this->db->where('barang.supplier', $id_supplier);
        $this->db->where('detail_pembelian.status', 0);
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }


    function count_all()
    {
        return $this->db->count_all($this->table_name);
    }

    function insert($data)
    {
        return $this->db->insert($this->table_name, $data);
    }

    function edit($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->update($this->table_name, $data);
    }

    function delete($id)
    {
        return $this->db->delete($this->table_name, array($this->primary_key => $id));
    }

    function get_data_tanggal($id)
    {
        $this->db->select('tgl_lahir');
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function laporan_pembelian($tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');
        $this->db->join('supplier', 'supplier.id_supplier=barang.id_supplier');
        $this->db->where("transaksi_pembelian.tanggal_pembelian BETWEEN '$tgl_awal' and '$tgl_akhir'");

        $query = $this->db->get();
        return $query->result();
    }

    function detail_pembelian($data)
    {
        return $this->db->insert_batch('detail_pembelian', $data);
    }

    function cart($id_barang)
    {
        return $this->db->where('barang.id_barang', $id_barang)
            ->get('barang')
            ->result_array();
    }

    function get_data_konfirmasi()
    {
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori=barang.kategori_barang');
        $this->db->join('satuan', 'satuan.id_satuan=barang.satuan');
        $this->db->where('detail_pembelian.status', 1);
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_data_riwayat()
    {
        $this->db->join('transaksi_pembelian', 'transaksi_pembelian.id_pembelian=detail_pembelian.id_pembelian');
        $this->db->join('barang', 'barang.id_barang=detail_pembelian.id_barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori=barang.kategori_barang');
        $this->db->join('satuan', 'satuan.id_satuan=barang.satuan');

        $this->db->where('detail_pembelian.status', 2);
        $this->db->or_where_in('detail_pembelian.status', 5);

        $this->db->order_by($this->primary_key, 'DESC');

        $query = $this->db->get($this->table_name);

        return $query->result();
    }
}
