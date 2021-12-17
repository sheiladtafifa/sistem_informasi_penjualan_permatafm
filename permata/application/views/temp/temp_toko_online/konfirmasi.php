<div class="content-page">

  <div class="content">

<div class="container-fluid">

          <div class="row">
          	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">            
            <div class="card mb-2">
              <div class="card-header">
                <h5>Konfirmasi Pembayaran</h5>
              </div>
              <div class="card-body">
			
			<?php echo form_open_multipart('dashboard/proses_konfirmasi');?>
			  <div class="form-group">
				<label class="col-form-label" for="inputEmail0">Masukkan Kode Pesanan</label>
				  <input name="invoice_id" class="form-control"  type="name" id="inputEmail0" placeholder="">
				</div>
			  <div class="form-group">
				<label class="col-form-label" for="inputEmail0">Upload Bukti Transfer</label>
				  <input type="file" class="form-control" name="userfile">
				</div>
			  <button type="submit" class="btn btn-primary">Konfirmasi</button>
			<?php echo form_close();?>
		</div>
	</div>
</div>
	</div>	


</div>
</div>
</div>