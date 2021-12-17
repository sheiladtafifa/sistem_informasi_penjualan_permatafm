 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Data Barang</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3>Data Barang</h3>
								</div>
								
								<div class="card-body">
									<div class="form-row">
    									<div class="col-md-4 mb-3">
											<a href="<?php echo base_url('index.php/barang/tambah_barang') ?>" class="btn btn-primary btn-sm btn-float-right">Tambah Data Barang</a>
										</div>
									</div>

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
                          
<div class="table-responsive">
<table id="example1" class="table table-bordered table-hover display">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Satuan Barang</th>
			<th>Kategori Barang</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
			<th>Stok</th>
			<th>Supplier</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($barang != 0) 
	{ 
		$no=1; 
		foreach ($barang as $brg) { ?>
		<tr>
			<td><?=$no++;?></td>
            <td><?=$brg->kode_barang;?></td>
			<td><?=$brg->nama_barang;?></td>
			<td><?=$brg->satuan;?></td>
			<td><?=$brg->nama_kategori;?></td>
			<td align="right"><?=$this->fungsi->rupiah($brg->harga_beli);?></td>
			<td align="right"><?=$this->fungsi->rupiah($brg->harga_jual);?></td>
			<td><?=$brg->stok;?></td>
			<td><?=$brg->nama_supplier;?></td>
			<td>
				<a href="<?=base_url('index.php/barang/edit/'.$brg->id_barang);?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a> &nbsp;
				<a href="<?=base_url('index.php/barang/delete/'.$brg->id_barang);?>" title="Hapus"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php
                            }
                        }
                        ?>
	</tbody>
</table>
</div>
<!-- <?=$halaman;?> -->
																						
							</div><!-- end card-->					
						</div>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->