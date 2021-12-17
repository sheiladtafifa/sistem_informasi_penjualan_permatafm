<div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left">Laporan Pembelian</h1>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">						
							
							<div class="card mb-3">
										<div class="card-header">
											<h3> Laporan Pembelian </h3>
										</div>

					<div class="card-body">

						<div class="container">
                            <?php foreach ($transaksi_pembelian as $trsk) { ?>
												
							<div class="row">
								<div class="col-md-12">
									<div class="invoice-title text-center mb-3">
									<h3><b>PERMATA HPA FRESH MART</b></h3>
									<h5><b>LAPORAN PEMBELIAN TAHUN</b></h5>											
									</div>
									<hr>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-condensed">
												<thead>
													<tr>
													<td><strong>No</strong></td>
													<td><strong>Tanggal Pembelian</strong></td>
													<td><strong>Total Pembelian</strong></td>
													</tr>
												</thead>
												<tbody>
												<!-- foreach ($order->lineItems as $line) or some such thing here -->
												<tr> 
                                                <?php if($transaksi_pembelian != 0)
                                                  {    
                                                  $i=1;              
                                                    foreach ($transaksi_pembelian as $trsk) {
                                                    echo 
                                                      "<tr>".
                                                      	"<td>".$i."</td>".
                                                        "<td>".$trsk->tanggal_pembelian."</td>".
                                                        "<td>".$trsk->total_pembelian."</td>";
                                                        $i++;
                                                    }
                                                }
                                                        ?>
                                                </tr>
												</tbody>
											</table>
																</div>
															</div>
                                                        
														</div>
													</div>
												</div>
											</div>
												<?php } ?>
										</div><!-- end card body -->	
                                        
									</div><!-- end card-->					
									
								</div><!-- end col-->			

					</div><!-- end row-->



            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->