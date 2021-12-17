 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Edit Barang</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3>Edit Barang</h3>
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
					
<!-- <form action="<?=base_url('index.php/barang/update'.$barang->id_barang);?>" method="POST"> -->
  <form action = "<?php echo base_url('index.php/barang/update/'.$barang->id_barang);?>" method="post" enctype="multipart/form-data">
    <!-- <input hidden="" type="number" class="form-control" name="id_barang" id="id_barang" value="<?=$id_barang;?>" required=""> -->
    <div class="form-group">
        <label class="col-form-label" for="kode_barang">Kode Barang</label>
        <input readonly="" type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?php echo $barang->kode_barang;?>" required="">
    </div>
    <div class="form-group">
      <label class="col-form-label" for="kategori_barang">Kategori Barang <a href="<?=base_url('index.php/kategori_barang/tambah_kategori_barang');?>" title="Tambah Kategori"><i class="fa fa-plus-circle"></i></a></label>
      <select name="kategori_barang" class="form-control" id="kategori_barang" required="">
        <option style="background: grey;" value="<?php echo $barang->id_kategori;?>"><?php echo $barang->nama_kategori;?> <small></small></option>
        <option value=""> ... </option>
        <?php foreach ($kategori_barang as $r) { ?>
        <option value="<?=$r->id_kategori;?>"><?=$r->nama_kategori;?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $barang->nama_barang;?>" required="">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="jumlah_barang">Stok Barang</label>
        <input readonly="" type="number" class="form-control" name="stok" id="stok" value="<?php echo $barang->stok;?>" required="">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="satuan">Satuan <a href="<?=base_url('index.php/satuan_barang/tambah_satuan_barang');?>" title="Tambah Satuan"><i class="fa fa-plus-circle"></i></a></label></label></label>
        <select name="satuan" class="form-control" id="satuan" required="">
            <option style="background: grey;" value="<?php echo $barang->id_satuan;?>"><?php echo $barang->satuan;?></option>
            <option value=""> ... </option>
            <?php foreach ($satuan as $r) { ?>
            <option value="<?=$r->id_satuan;?>"><?=$r->satuan;?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="harga_beli">Harga Beli (Rp)</label>
        <input type="number" class="form-control" name="harga_beli" id="harga_beli" value="<?php echo $barang->harga_beli;?>" required="">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="harga_jual">Harga Jual (Rp)</label>
        <input type="number" class="form-control" name="harga_jual" id="harga_jual" value="<?php echo $barang->harga_jual;?>" required="">
    </div>
    <div class="form-group">
      <label class="col-form-label" for="supplier">Supplier <a href="<?=base_url('index.php/supplier/tambah_supplier');?>" title="Tambah Supplier"><i class="fa fa-plus-circle"></i></a></label>
      <select name="supplier" class="form-control" id="supplier" required="">
        <option style="background: grey;" value="<?php echo $barang->id_supplier;?>"><?php echo $barang->nama_supplier;?> <small></small></option>
        <option value=""> ... </option>
        <?php foreach ($supplier as $r) { ?>
        <option value="<?=$r->id_supplier;?>"><?=$r->nama_supplier;?></option>
        <?php } ?>
      </select>
    </div>
    <!-- <div class="form-group">
            <label class="col-form-label" for="gambar">Gambar Produk</label>
            <input type="file" name="gambar" class="form-control">
          </div> -->
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
										
							</div>														
						</div><!-- end card-->					
                    </div>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->