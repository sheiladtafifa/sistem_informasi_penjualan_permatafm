 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Invoice</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-12">
								<div class="card-header">
									<h3>Invoice</h3>
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

<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link active" href="<?=base_url();?>index.php/transaksi_penjualan/invoice/<?php $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $time);?>/<?=date('Y-m-d');?>/"><i class="fa fa-home"></i></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#nota" title="Transaksi"><i class="fa fa-search"></i></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#periode" title="Periode"><i class="fa fa-archive"></i></a>
	</li>
</ul>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade" id="nota">
		<br />
		<p>Masukkan nomor transaksi untuk melihat detail transaksi</p>
		<form class="form-inline" action="<?=base_url('index.php/transaksi_penjualan/carinota');?>" method="POST">
			<input class="form-control" type="text" name="nota" placeholder="Nomor Transaksi" required="" /> &nbsp; 
			<button class="btn btn-primary">Cari</button>
		</form>
		<br />
	</div>
	<div class="tab-pane fade" id="periode">
		<br />
		<p>Tentukan tanggal untuk melihat seluruh transaksi penjualan</p>
		<form class="form-inline" action="<?=base_url('index.php/transaksi_penjualan/invoice');?>" method="POST">
		<label class="col-form-label" for="mulai">Mulai</label> &nbsp;
		<input class="form-control" type="date" name="mulai" value="<?php $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $time);?>" required=""> &nbsp;
		<label class="col-form-label" for="sampai">Sampai</label> &nbsp;
		<input class="form-control" type="date" name="sampai" value="<?=date('Y-m-d');?>" required=""> &nbsp;
		<input type="submit" class="btn btn-primary" value="Lihat Laporan">
		</form>
		<br />
	</div>
</div>
<br />
<?php if (!empty($tgl_mulai) && !empty($tgl_akhir)) { ?>
<h4>Nomor Invoice</h4>
<p>Tanggal <?=$this->fungsi->tanggal_lap($tgl_mulai);?> s/d <?=$this->fungsi->tanggal_lap($tgl_akhir);?></p>
<table class="table table-hover">
	<thead>
		<tr>
			<td scope="col"><strong>NOMOR</strong></td>
			<td scope="col"><strong>TANGGAL & WAKTU</strong></td>
			<td scope="col"><strong>KASIR</strong></td>
			<td scope="col"><strong>TOTAL</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php 
	if (!empty($result)){ 
	foreach ($result as $lap) { ?>
		<tr class="table-secondary">
			<td><a href="<?=base_url('index.php/transaksi_penjualan/detail_trx/'.$lap->no_trx);?>"><?=$lap->no_trx;?></a></td>
			<td><?=$lap->tgl_trx.' '.$lap->waktu_trx;?></td>
			<td><?=$lap->nama_user;?></td>
			<td><?=$this->fungsi->rupiah($lap->total);?></td>
		</tr>
	<?php } } else { ?>
		<tr class="table-secondary">
			<td colspan="9" align="center">Tidak ditemukan</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php echo $halaman; }else if (!empty($carinota)) { ?>
<h4>Hasil Pencarian Transaksi</h4>
<p>Nomor: <?=$carinota;?></p>
<table class="table table-hover">
	<thead>
		<tr>
			<td scope="col"><strong>NOMOR</strong></td>
			<td scope="col"><strong>TANGGAL & WAKTU</strong></td>
			<td scope="col"><strong>KASIR</strong></td>
			<td align="right" scope="col"><strong>TOTAL</strong></td>
		</tr>
	</thead>
	<tbody>
	<?php 
	if (!empty($result)){ 
	foreach ($result as $lap) { ?>
		<tr class="table-secondary">
			<td><a href="<?=base_url('index.php/transaksi_penjualan/detail_trx/'.$lap->no_trx);?>"><?=$lap->no_trx;?></a></td>
			<td><?=$lap->tgl_trx.' '.$lap->waktu_trx;?></td>
			<td><?=$lap->nama_user;?></td>
			<td align="right" ><?=$this->fungsi->rupiah($lap->total);?></td>
			<?php if ($this->session->userdata('akses') == 1) { if ($min == 1) { ?>
			<td align="center">
				<a href="<?=base_url('index.php/transaksi_penjualan/editnota/'.$lap->no_trx);?>"><i class="fa fa-pencil-square-o"></i></a>
			</td>
			<?php } else {?> 
			<td align="center">&nbsp;</td>
			<?php } } else if ($lap->id_user == $this->session->userdata('user')) { if ($min == 1) { ?>
			<td align="center">
				<a href="<?=base_url('index.php/transaksi_penjualan/editnota/'.$lap->no_trx);?>"><i class="fa fa-pencil-square-o"></i></a>
			</td>
			<?php } else {?>
			<td align="center">&nbsp;</td>
			<?php } } else { ?>
				<td align="center">&nbsp;</td>
			<?php } ?>
		</tr>
	<?php } } else { ?>
		<tr class="table-secondary">
			<td colspan="9" align="center">Tidak ditemukan</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php echo $halaman; } ?>
</div>														
							</div><!-- end card-->					
						</div>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

