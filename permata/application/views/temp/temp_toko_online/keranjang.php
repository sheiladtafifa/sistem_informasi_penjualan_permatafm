<div class="content-page">

  <div class="content">

<div class="container-fluid">
<div class="row">
                  <div class="col-xl-12">
                      <div class="breadcrumb-holder">
                          <h1 class="main-title float-left">Keranjang Belanja</h1>
                          <div class="clearfix"></div>
                      </div>
                  </div>
            </div>	
<table class="table table-bordered table-striped table-hover">
	<tr>
		<th>No.</th>
		<th>Nama Produk</th>
		<th>Jumlah</th>
		<th>Harga</th>
		<th>Sub-Total</th>
	</tr>

	<?php 
	$no=1;
	foreach ($this->cart->contents() as $items) : ?>
	<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $items['name'] ?></td>
		<td><?php echo $items['qty'] ?></td>
		<td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
		<td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
	</tr>
	
	<?php endforeach; ?>

	<tr>
		<td colspan="4"></td>
		<td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.') ?></td>
	</tr>
</table>

<div align="right">
	<a href="<?php echo base_url('index.php/dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
	<a href="<?php echo base_url('index.php/dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
	<a href="<?php echo base_url('index.php/dashboard/confirm_email') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
</div>
</div>
</div>
</div>