 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Daftar Purchase Order</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3>Daftar Purchase Order</h3>
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
                          
<div class="table-responsive">
<table id="example1" class="table table-bordered table-hover display">
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jumlah Permintaan</th>
			<th>Tanggal Permintaan</th>
			<th>Harga Beli</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php if ($detail != 0) 
	{ 
		$no=1; 
		foreach ($detail as $brg) { ?>
		<tr>
			<td><?=$no++;?></td>
            <td><?=$brg->kode_barang;?></td>
			<td><?=$brg->nama_barang;?></td>
			<td><?=$brg->jumlah;?></td>
			<td><?=$brg->tanggal_pembelian;?></td>
			<td>Rp. <?=$this->fungsi->rupiah($brg->harga_beli);?></td>
			<td>
				<a href="<?=base_url('index.php/supplier/approve/'.$brg->id_detail_pembelian);?>" title="Diterima"><i class="fa fa-check bigfonts"></i></a> &nbsp;
				<a href="<?=base_url('index.php/supplier/remove/'.$brg->id_detail_pembelian);?>" title="Tidak Diterima"><i class="fa fa-remove bigfonts"></i></a>
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