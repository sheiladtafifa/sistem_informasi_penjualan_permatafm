<?php 
class Barang_model extends CI_Model
{	
	 private $primary_key = 'id_barang';
     private $table_name  = 'barang';

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
        $this->db->join('satuan','satuan.id_satuan=barang.satuan');
        $this->db->join('kategori_barang','kategori_barang.id_kategori=barang.kategori_barang');
        $this->db->join('supplier','supplier.id_supplier=barang.supplier');
        
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
        $this->db->join('satuan','satuan.id_satuan=barang.satuan');
        $this->db->join('kategori_barang','kategori_barang.id_kategori=barang.kategori_barang');
        $this->db->join('supplier','supplier.id_supplier=barang.supplier');

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

    function lihat_bmaster($id)
    {
        return $this->db->select('SUM(stok) as total')
                        ->where('id_br', $id)
                        ->get('barang_master');
    }

    function row_data_barang()
    {
        return $this->db->get('barang')
                        ->num_rows();
    }

    function data_barang()
    {
        return $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
                        ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                        ->join('supplier', 'supplier.id_supplier = barang.supplier', 'left')
                        ->order_by('id_barang ASC')
                        ->get('barang')
                        ->result();
    }

    function lihat_barang($id)
    {
        return $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
                        ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                        ->join('supplier', 'supplier.id_supplier = barang.supplier', 'left')
                        ->where('id_barang', $id)
                        ->get('barang')
                        ->result_array();
    }

     function kategori()
    {
        return $this->db->order_by('nama_kategori ASC')
                        ->get('kategori_barang')
                        ->result();
    }

    function satuan()
    {
        return $this->db->order_by('satuan ASC')
                        ->get('satuan')
                        ->result();
    }

    function supplier()
    {
        return $this->db->order_by('nama_supplier ASC')
                        ->get('supplier')
                        ->result();
    }

    function update($id, $data)
    {
        return $this->db->where('id_barang', $id)
                        ->update('barang', $data);
    }

    function jika_ada_pj($id)
    {
        return $this->db->where('id_brg', $id)
                        ->get('transaksi_penjualan')
                        ->num_rows();
    }

     function delete_barang($id)
    {
        return $this->db->where('id_barang', $id)
                        ->delete('barang');
    }

    function detail_brg($id)
    {
        return $this->db->where('id_barang', $id)
                        ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                        ->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
                        ->join('supplier', 'supplier.id_supplier = barang.supplier', 'left')
                        ->limit(1)
                        ->get('barang');
    }

    function kode_kateg($id)
    {
        return $this->db->where('id_kategori', $id)
                        ->get('kategori_barang')
                        ->result_array();
    }

    function idbarang()
    {
        return $this->db->select('id_barang')
                        ->order_by('id_barang DESC')
                        ->get('barang')
                        ->result_array();
    }

    function input($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function find($id)
    {
        $result = $this->db->where('id_barang',$id)
                           ->limit(1)
                           ->get('barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_barang($id_barang)
    {
        $result = $this->db->where('id_barang',$id_barang)->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang')->get('barang');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    function select_kategori($kategori)
    {
        $this->db->where('kategori_barang',$kategori);
        return $this->db->get('barang')->result();
    }
}
?>