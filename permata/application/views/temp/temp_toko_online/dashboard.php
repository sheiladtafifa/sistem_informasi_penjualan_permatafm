 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
									</div>
										<div class="row text-center mt-4">
    <?php foreach ($barang as $brg) : ?>
      <div class="card ml-3 mb-3" style="width: 16rem;">
      <img src="<?php echo base_url(). '/upload/'. $brg->gambar ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title mb-1"><?php echo $brg->nama_barang ?></h5>
       <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format($brg->harga_jual, 0, ',', '.') ?></span>
        <?php echo anchor('dashboard/tambah_ke_keranjang/'.$brg->id_barang, '<div class="btn btn-sm btn-primary">
          Tambah ke Keranjang
        </div>') ?>
        <?php echo anchor('dashboard/detail/'.$brg->id_barang, '<div class="btn btn-sm btn-success">
          Detail
        </div>') ?>
          
      </div>
    </div>
    <?php endforeach; ?>
  </div>
						</div>
					</div>

						</div>
						<!-- end row -->	



						
            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<!-- App js -->
