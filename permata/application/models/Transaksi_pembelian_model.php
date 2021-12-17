<?php 
class Transaksi_pembelian_model extends CI_Model
{	
	 private $primary_key = 'id_pembelian';
     private $table_name  = 'transaksi_pembelian';

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
        $this->db->join('user','user.id_user=transaksi_pembelian.id_user');

        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    // function get_all_where()
    // {
    //     $this->db->where('jabatan', 'Penilai');
    //     $this->db->or_where_in('jabatan', 'Kepala Penilai');
    //     $this->db->order_by($this->primary_key);
    //     $query = $this->db->get($this->table_name);
    //     return $query->result();
    // }

    function get_all()
    {
        $this->db->join('user','user.id_user=transaksi_pembelian.id_user');
        
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

    function get_data_last() {
        $query = $this->db->query("SELECT $this->primary_key from $this->table_name order by $this->primary_key DESC LIMIT 1 ");
        return $query->row()->id_pembelian;
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

     function input_bmaster($data)
    {
        return $this->db->insert('barang_master', $data);
    }

    function input($data)
    {
        return $this->db->insert('barang', $data);
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

     function cart($id_barang)
    {
        return $this->db->where('barang.id_barang', $id_barang)
                        ->join('detail_pembelian', 'detail_pembelian.id_barang = barang.id_barang','left')
                        ->get('barang')
                        ->result_array();
    }

    function hasilcari($key)
    {
        return $this->db->or_like('nama_barang', $key)
                        ->get('barang')
                        ->result();
    }

     function get_id_pembelian($id_pembelian)
    {
        return $this->db->select('id_pembelian')
                        ->where('no_trx', $notrx)
                        ->limit(1)
                        ->get('transaksi_penjualan_master');
    }

    function get_id_pjmaster($notrx)
    {
        return $this->db->select('id_pjmaster')
                        ->where('no_trx', $notrx)
                        ->limit(1)
                        ->get('transaksi_penjualan_master');
    }

}
?>