  <div class="content-page">
  
    <!-- Start content -->
        <div class="content">
            
      <div class="container-fluid">
          
            <div class="row">
                  <div class="col-xl-12">
                      <div class="breadcrumb-holder">
                          <h1 class="main-title float-left">Tambah Barang</h1>
                          <div class="clearfix"></div>
                      </div>
                  </div>
            </div>
            <!-- end row -->

            <div class="row">
      
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">            
            <div class="card mb-3">
              <div class="card-header">
                <h3>Tambah Barang</h3>
              </div>
                
              <div class="card-body">
                      <?php if($this->session->flashdata('berhasil')): ?>
                            <div class="alert alert-success alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4>  <i class="icon fa fa-check"></i> Sukses!</h4>
                              <?php echo $this->session->flashdata('berhasil');?>
                            </div>
                          <?php endif; ?>
                          <?php if($this->session->flashdata('gagal')): ?>
                            <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4>  <i class="icon fa fa-check"></i> Gagal!</h4>
                              <?php echo $this->session->flashdata('gagal');?>
                            </div>
                          <?php endif; ?>

<!-- <h4><strong>Pembelian</strong></h4>
<p>(Tambah Barang Baru)</p> -->
<form action="<?=base_url('index.php/Transaksi_Pembelian/input');?>" method="POST">
    <div class="form-group">
      <label class="col-form-label" for="kategori_barang">Kategori Barang <a href="<?=base_url('index.php/Kategori_Barang/tambah_kategori_barang');?>" title="Tambah Kategori"><i class="fa fa-plus-circle"></i></a></label>
        <select name="kategori_barang" class="form-control" id="kategori_barang" required="">
        <option value="">...</option>
        <?php foreach ($kategori as $r) { ?>
        <option value="<?=$r->id_kategori;?>"><?=$r->nama_kategori;?></option>
        <?php } ?>
      </select>
    </div>
  <div class="form-group">
    <label class="col-form-label" for="nama_barang">Nama Barang</label>
    <input type="text" class="form-control" name="nama_barang" id="nama_barang" required="">
  </div>
  <div class="form-group">
    <label class="col-form-label" for="jumlah_barang">Jumlah Barang</label>
    <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" required="">
  </div>
  <div class="form-group">
    <label class="col-form-label" for="satuan">Satuan <a href="<?=base_url('index.php/Satuan_Barang/tambah_satuan_barang');?>" title="Tambah Satuan"><i class="fa fa-plus-circle"></i></a></label>
        <select name="satuan" class="form-control" id="satuan" required="">
          <option value=""> ... </option>
          <?php foreach ($satuan as $r) { ?>
          <option value="<?=$r->id_satuan;?>"><?=$r->satuan;?></option>
          <?php } ?>
        </select>
    </div>
  <div class="form-group">
    <label class="col-form-label" for="harga_beli">Harga Beli (Rp)</label>
    <input type="number" class="form-control" name="harga_beli" id="harga_beli" required="">
  </div>
  <div class="form-group">
    <label class="col-form-label" for="harga_jual">Harga Jual (Rp)</label>
    <input type="number" class="form-control" name="harga_jual" id="harga_jual" required="">
  </div>
  <div class="form-group">
      <label class="col-form-label" for="supplier">Supplier <a href="<?=base_url('index.php/Supplier/tambah_supplier');?>" title="Tambah Kategori"><i class="fa fa-plus-circle"></i></a></label>
        <select name="supplier" class="form-control" id="supplier" required="">
        <option value="">...</option>
        <?php foreach ($supplier as $r) { ?>
        <option value="<?=$r->id_supplier;?>"><?=$r->nama_supplier;?></option>
        <?php } ?>
      </select>
    </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
            </div><!-- /.box -->     
            </div><!-- end card-->          
                    </div>

            </div>
      <!-- END container-fluid -->

    </div>
    <!-- END content -->

    </div>
  <!-- END content-page -->
