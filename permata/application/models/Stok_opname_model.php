<?php 
class Barang_model extends CI_Model
{	
	 private $primary_key = 'kode_stok_opname';
     private $table_name  = 'stok_opname';

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
        $this->db->join('kategori_barang','kategori_barang.kode_kategori=stok_opname.kode_kategori');
        $this->db->join('barang','barang.kode_barang=stok_opname.kode_barang');
        
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

    function get_all()
    {
        $this->db->join('kategori_barang','kategori_barang.kode_kategori=stok_opname.kode_kategori');
        $this->db->join('barang','barang.kode_barang=stok_opname.kode_barang');

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
}
?>