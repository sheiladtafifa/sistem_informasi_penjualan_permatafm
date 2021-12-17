 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Daftar Invoice</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">						
							<div class="card mb-12">
								<div class="card-header">
									<h3>Daftar Invoice</h3>
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
												<th>Nama Customer</th>
												<th>No Hp</th>
												<th>Aksi</th>
											</tr>
										</thead>										
										<tbody>
											<?php if($transaksi_penjualan != 0)
                          {      
                          	$i=1;            
                            foreach ($transaksi_penjualan as $trsk) {
                            echo 
                              "<tr>".
                               	"<td>".$i."</td>".
                                "<td>".$trsk->nama_customer."</td>".
                                "<td>".$trsk->no_hp."</td>";
                                $i++;
                                ?>
                               <td><a role="button" class="btn btn-secondary" href="<?php echo base_url('index.php/Invoice/tampil_invoice/'.$trsk->id_penjualan)?>">Detail</a>
                           <?php
                            }
                        }
                        ?>

										</tbody>
									</table>
									</div>
									
								</div>														
							</div><!-- end card-->					
						</div>

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->