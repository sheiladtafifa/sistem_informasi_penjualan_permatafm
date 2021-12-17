 <div class="content-page">
	
		<!-- Start content -->
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
						<!-- end row -->

						<div class="row">
			
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
						<div class="card mb-3">
							<div class="card-header">
								<h3>Detail Barang</h3>
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
					
	<h4>Detail Barang</h4>
<p align="right">
<a class="btn btn-primary" href="<?=base_url('index.php/barang/tampil_barang');?>">Kembali</a>
<a class="btn btn-warning" href="<?=base_url('index.php/barang/edit/'.$id_barang);?>">Edit</a>
<?php if ($this->Barang_model->jika_ada_pj($id_barang) < 1) { ?>
<a class="btn btn-danger" href="<?=base_url('index.php/barang/delete/'.$id_barang);?>">Hapus</a>
<?php } ?>
</p>
<table class="table table-hover">
    <tbody>
        <tr class="table-secondary">
            <td>Kode Barang</td>
            <td>:</td>
            <td><?=$kode_barang;?></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td><?=$nama_barang;?></td>
        </tr>
        <tr class="table-secondary">
            <td>Kategori Barang</td>
            <td>:</td>
            <td><?=$nama_kategori;?></td>
        </tr>
        <tr>
            <td>Total Stok Barang</td>
            <td>:</td>
            <td><?=$jumlah_stok.' '.$satuan;?></td>
        </tr>
        <tr class="table-secondary">
            <td>Stok Barang Saat Ini</td>
            <td>:</td>
            <td><?=$jumlah_barang.' '.$satuan;?></td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td>:</td>
            <td>Rp <?=$this->fungsi->rupiah($harga_beli);?></td>
        </tr>
        <tr class="table-secondary">
            <td>Harga Jual</td>
            <td>:</td>
            <td>Rp <?=$this->fungsi->rupiah($harga_jual);?></td>
        </tr>
        <tr>
            <td>Keuntungan (<?=$satuan;?>)</td>
            <td>:</td>
            <td>Rp <?=$this->fungsi->rupiah($harga_jual-$harga_beli);?></td>
        </tr>
        <tr class="table-secondary">
            <td>Supplier</td>
            <td>:</td>
            <td><?=$nama_supplier;?></td>
        </tr>
        <!-- <tr class="table-secondary">
            <td>Diperbarui Tanggal</td>
            <td>:</td>
            <td><?=$this->fungsi->tanggalindo($tgl_up).' '.$waktu_up;?></td>
        </tr> -->
    </tbody>
</table>
										
							</div>														
						</div><!-- end card-->					
                    </div>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->