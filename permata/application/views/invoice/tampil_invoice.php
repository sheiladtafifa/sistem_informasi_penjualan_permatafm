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
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">						
							
							<div class="card mb-3">
										<div class="card-header">
											<h3> Invoice </h3>
										</div>

					<div class="card-body">

						<div class="container">
												
							<div class="row">
								<div class="col-md-12">
									<div class="invoice-title text-center mb-3">
									<h2>Invoice <?php echo $pelanggan->nama_customer;?></h2>
									<strong>Tanggal:</strong> <?php echo $pelanggan->tanggal_penjualan;?>											
									</div>
									<hr>

							<div class="row">
								<div class="col-md-6">			
									<strong>Nama Customer :</strong> <?php echo $pelanggan->nama_customer;?>
									<p></p>
                                    <strong>No Hp :</strong> <?php echo $pelanggan->no_hp;?>
								</div>
							</div>

							<p></p>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title"><strong>Order summary</strong></h3>
										</div>
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-condensed">
												<thead>
													<tr>
													<td><strong>Barang</strong></td>
													<td><strong>Harga</strong></td>
													<td><strong>Jumlah</strong></td>
													<td><strong>Total</strong></td>
													</tr>
												</thead>
												<tbody>
												<!-- foreach ($order->lineItems as $line) or some such thing here -->
												<tr> 
                                                <?php if($transaksi_penjualan != 0)
                                                  {                 
                                                    foreach ($transaksi_penjualan as $trsk) {
                                                        $total=$trsk->harga_jual*$trsk->jumlah;
                                                    echo 
                                                      "<tr>".
                                                        "<td>".$trsk->nama_barang."</td>".
                                                        "<td>".$trsk->harga_jual."</td>".
                                                        "<td>".$trsk->jumlah."</td>".
                                                        "<td>".$total."</td>";
                                                    }
                                                }
                                                        ?>
                                                </tr>
													<tr>
														<td class="no-line"></td>
														<td class="no-line"></td>
														<td class="no-line text-center"><strong>Total</strong></td>
														<td><?php echo $pelanggan->total_penjualan;?></td>
													</tr>
												</tbody>
											</table>
																</div>
															</div>
                                                        
														</div>
													</div>
												</div>
											</div>
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