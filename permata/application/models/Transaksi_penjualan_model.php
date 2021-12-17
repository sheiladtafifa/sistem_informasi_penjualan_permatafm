<?php 
class Transaksi_penjualan_model extends CI_Model
{	
	 private $primary_key = 'id_penjualan';
     private $table_name  = 'transaksi_penjualan';

	function __construct()
    {
        parent::__construct();
    }

   // function cek_login($nip,$password){

   //      $query=$this->db->query ("SELECT * From barang where nip ='{$nip}' AND password ='{$password}' ");
   //      return $query->row();
   // }

    // function invoice_no()
    // {
    //     $sql = "SELECT MAX(MID(invoice,10,4)) AS invoice_no 
    //             FROM transaksi_penjualan 
    //             WHERE MID(invoice,4,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
    //     $query = $this->db->query($sql);
    //     if($query->num_rows() > 0) {
    //         $row = $query->row();
    //         $n = ((int)$row->invoice_no) + 1;
    //         $no = sprintf("%'.04d", $n);
    //     } else {
    //         $no = "0001";
    //     }
    //     $invoice = "PFM".date('ymd').$no;
    //     return $invoice;
    // }

    function get_data($id)
    { 

        $this->db->where($this->primary_key, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function get_all()
    {
        
        $this->db->order_by($this->primary_key);
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function get_data_penjualan($id)
    {
        $this->db->join('detail_penjualan','detail_penjualan.id_penjualan=transaksi_penjualan.id_penjualan');
        $this->db->join('barang','barang.kode_barang=detail_penjualan.kode_barang');
        $this->db->where('transaksi_penjualan.id_penjualan', $id);
        $this->db->order_by('transaksi_penjualan.id_penjualan');
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
        return $query->row()->id_penjualan;
    }

    function get_id_pjmaster($notrx)
    {
        return $this->db->select('id_pjmaster')
                        ->where('no_trx', $notrx)
                        ->limit(1)
                        ->get('transaksi_penjualan_master');
    }

    function row_data_barang()
    {
        return $this->db->get('barang')
                        ->num_rows();
    }


    function data_barang($number, $offset)
    {
        return $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
                        ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                        ->order_by('id_barang DESC')
                        ->get('barang',$number,$offset)
                        ->result();
    }

    function row_caribrg($search)
    {
        return $this->db->or_like($search)
                        ->get('barang')
                        ->num_rows();
    }

    function lihat_bmaster($id)
    {
        return $this->db->select('stok as total')
                        ->where('id_barang', $id)
                        ->get('barang');
    }

    function lihat_stok($id)
    {
        return $this->db->select('stok')
                        ->where('id_barang', $id)
                        ->get('barang');
    }

    function caribrg($batas = null, $offset = null, $search = null)
    {
        $this->db->from('barang');
        if($batas != null) {
            $this->db->limit($batas, $offset);
        }
        if ($search != null) {
           $this->db->or_like($search);
        }
        $this->db->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                ->order_by('id_barang DESC');
        $query = $this->db->get();
     
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    // function cart($id_barang)
    // {
    //     return $this->db->where('barang.id_barang', $id_barang)
    //                     ->join('detail_penjualan', 'detail_penjualan.id_barang = barang.id_barang','left')
    //                     ->get('barang')
    //                     ->result_array();
    // }

    function cart($id_barang)
    {
        return $this->db->where('barang.id_barang', $id_barang)
                        // ->join('detail_penjualan', 'detail_penjualan.id_barang = barang.id_barang', 'left')
                        ->get('barang')
                        ->result_array();
    }

    function cek_notrx()
    {
        return $this->db->order_by('id_penjualan DESC')
                        ->get('transaksi_penjualan')
                        ->result_array();
    }

    function pjmaster($data)
    {
        return $this->db->insert('transaksi_penjualan_master', $data);
    }
    
    // function get_id_pjmaster($notrx)
    // {
    //     return $this->db->select('id_pjmaster')
    //                     ->where('no_trx', $notrx)
    //                     ->limit(1)
    //                     ->get('transaksi_penjualan_master');
    // }

    function row_pj_master($notrx)
    {
        return $this->db->join('user', 'user.id_user = transaksi_penjualan.id_user', 'left')
                        ->or_like('no_trx', $notrx)
                        ->get('transaksi_penjualan')
                        ->num_rows();
    }

    function data_pj_master($number, $offset, $notrx)
    {
        return $this->db->join('user', 'user.id_user = transaksi_penjualan.id_user', 'left')
                        ->or_like('no_trx', $notrx)
                        ->order_by('id_penjualan ASC')
                        ->get('transaksi_penjualan', $number, $offset)
                        ->result();
    }

    function update_stok($id_barang, $qty)
    {
        $data = array(
            'id_br' => $id_barang,
            'stok' => -$qty,
            'tglup' => date('Y-m-d'),
            'tipe' => 'keluar'
        );
        return $this->db->insert('barang_master', $data);
    }

     function penjualan($data)
    {
        return $this->db->insert_batch('transaksi_penjualan', $data);
    }

    function row_laporan($mulai, $akhir)
    {
        return $this->db->join('user', 'user.id_user = transaksi_penjualan.id_user', 'left')
                        ->where('tgl_trx >=', $mulai)
                        ->where('tgl_trx <=', $akhir)
                        ->get('transaksi_penjualan')
                        ->num_rows();
    }

     function laporan($number, $offset, $mulai, $akhir)
    {
        return $this->db->join('user', 'user.id_user = transaksi_penjualan.id_user', 'left')
                        ->where('tgl_trx >=', $mulai)
                        ->where('tgl_trx <=', $akhir)
                        ->order_by('id_penjualan DESC')
                        ->get('transaksi_penjualan', $number, $offset)
                        ->result();
    }

    function pj_minus($notrx)
    {
        return $this->db->or_like('kembalian', '-')
                        ->where('no_trx', $notrx)
                        ->get('transaksi_penjualan_master')
                        ->num_rows();
    }

    function cek_user_pjmaster($notrx)
    {
        return $this->db->select('id_user')
                        ->where('no_trx', $notrx)
                        ->get('transaksi_penjualan_master')
                        ->result_array();
    }

     function detail_trx($no_trx)
    {
        return $this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan = transaksi_penjualan.id_penjualan', 'left')
                        ->join('barang', 'barang.id_barang = detail_penjualan.id_barang', 'left')
                        ->join('kategori_barang', 'kategori_barang.id_kategori = barang.kategori_barang', 'left')
                        ->join('satuan', 'satuan.id_satuan = barang.satuan', 'left')
                        ->join('user', 'user.id_user = transaksi_penjualan.id_user', 'left')
                        ->where('no_trx', $no_trx)
                        ->get('transaksi_penjualan');
    }

    function updatepjmaster($notrx, $data)
    {
        return $this->db->where('no_trx', $notrx)
                        ->update('transaksi_penjualan_master', $data);
    }

    function hasilcari($key)
    {
        return $this->db->or_like('nama_barang', $key)
                        ->get('barang')
                        ->result();
    }

}
?>