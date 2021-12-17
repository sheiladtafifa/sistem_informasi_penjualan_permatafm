<?php 
class Detail_penjualan_model extends CI_Model
{   
     private $primary_key = 'id_detail_penjualan';
     private $table_name  = 'detail_penjualan';

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
        $this->db->join('barang','barang.kode_barang=detail_penjualan.kode_barang');
        $this->db->join('transaksi_penjualan','transaksi_penjualan.id_penjualan=detail_penjualan.id_penjualan');
        //$this->db->join('supplier','supplier.id_supplier=barang.id_supplier');
        //$this->db->join('kategori_barang','kategori_barang.kode_kategori=barang.kode_kategori');
        
        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_all_where()
    {
        $this->db->where('jabatan', 'Penilai');
        $this->db->or_where_in('jabatan', 'Kepala Penilai');
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_data_penjualan($id)
    {
        $this->db->join('transaksi_penjualan','transaksi_penjualan.id_penjualan=detail_penjualan.id_penjualan');
        $this->db->join('barang','barang.kode_barang=detail_penjualan.kode_barang');
        $this->db->where('detail_penjualan.id_penjualan', $id);
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
    
    function get_all()
    {
        $this->db->join('barang','barang.kode_barang=detail_penjualan.kode_barang');
        $this->db->join('transaksi_penjualan','transaksi_penjualan.id_penjualan=detail_penjualan.id_penjualan');
        // $this->db->join('supplier','supplier.id_supplier=barang.id_supplier');
        // $this->db->join('kategori_barang','kategori_barang.kode_kategori=barang.kode_kategori');

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

    function laporan_penjualan($tgl_awal,$tgl_akhir) 
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->join('transaksi_penjualan','transaksi_penjualan.id_penjualan=detail_penjualan.id_penjualan');
        $this->db->join('barang','barang.kode_barang=detail_penjualan.kode_barang');
        $this->db->where("transaksi_penjualan.tanggal_penjualan BETWEEN '$tgl_awal' and '$tgl_akhir'");
        
        $query = $this->db->get();
        return $query->result();
        
    }

     function detail_penjualan($data)
    {
        return $this->db->insert_batch('detail_penjualan', $data);
    }
}
?>