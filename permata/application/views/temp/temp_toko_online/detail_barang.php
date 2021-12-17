<div class="content-page">

  <div class="content">

    <div class="container-fluid">

      <div class="row">
                  <div class="col-xl-12">
                      <div class="breadcrumb-holder">
                          <h1 class="main-title float-left">Detail Barang</h1>
                          <div class="clearfix"></div>
                      </div>
                  </div>
            </div>

  <div class="card-body"> 
  	<?php foreach ($barang as $brg) : ?>
  	<div class="row">
    <div class="col-md-4">
    	<img src="<?php echo base_url().'/upload/'.$brg->gambar ?>" class="card-img-top ">
    </div>
    <div class="col-md-8">
    	<table class="table">
    		<tr>
    			<td>Nama Produk</td>
    			<td><strong><?php echo $brg->nama_barang ?></strong></td>
    		</tr>
    		<tr>
    			<td>Kategori</td>
    			<td><strong><?php echo $brg->nama_kategori ?></strong></td>
    		</tr>
    		<tr>
    			<td>Stok</td>
    			<td><strong><?php echo $brg->stok ?></strong></td>
    		</tr>
    		<tr>
    			<td>Harga</td>
    			<td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga_jual,0,',','.') ?> </div></strong></td>
    		</tr>
    	</table>
    	 <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_barang, '<div class="btn btn-sm btn-primary">
          Tambah ke Keranjang
        </div>') ?> 
         <?php echo anchor('dashboard/index/','<div class="btn btn-sm btn-danger">
          Kembali
        </div>') ?>
    </div>

</div>
<?php endforeach; ?>
  </div>
</div>
</div>
</div>