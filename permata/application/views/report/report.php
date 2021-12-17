<div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">

					
				<div class="row">
					<div class="col-xl-12">
						<div class="breadcrumb-holder">
							<h1 class="main-title float-left">Laporan</h1>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row">
						
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
							
							<div class="card mb-3">
										<div class="card-header">
											<h3> Laporan </h3>
										</div>

					<div class="card-body">

						<div class="container">
												
							<div class="row">
								<div class="col-md-11">
									<div class="invoice-title text-center">
									<h3><b>PERMATA HPA FRESH MART</b></h3>
									<h5><b>LAPORAN PEMBELIAN</b></h5>											
									</div>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-condensed">
												<thead>
													<tr>
													<td><strong>Tanggal</strong></td>
													<td><strong>Supplier</strong></td>
													<td><strong>Barang</strong></td>
													<td><strong>Harga</strong></td>
													<td><strong>Jumlah</strong></td>
													</tr>
												</thead>
												<tbody>
												<tr> 
                                                <?php foreach ($laporan_pembelian as $lprn)
                                                {
                                                    echo 
                                                      "<tr>".
                                                      	"<td>".$lprn->tanggal_pembelian."</td>".
                                                      	"<td>".$lprn->nama_supplier."</td>".
                                                        "<td>".$lprn->nama_barang."</td>".
                                                        "<td>".$lprn->harga_beli."</td>".
                                                        "<td>".$lprn->jumlah."</td>";
                                                    }
                                                        ?>
                                                </tr>
												</tbody>
											</table>
																</div>
															</div>
                                                        <div class="row">
								<div class="col-md-12">
									<div class="invoice-title text-center">
									<h3><b>PERMATA HPA FRESH MART</b></h3>
									<h5><b>LAPORAN PENJUALAN</b></h5>											
									</div>

									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-condensed">
												<thead>
													<tr>
													<td><strong>Tanggal</strong></td>
													<td><strong>Customer</strong></td>
													<td><strong>No Hp</strong></td>
													<td><strong>Barang</strong></td>
													<td><strong>Harga</strong></td>
													<td><strong>Jumlah</strong></td>
													</tr>
												</thead>
												<tbody>
												<tr> 
                                                <?php foreach ($laporan_penjualan as $lprn)
                                                {
                                                    echo 
                                                      "<tr>".
                                                      	"<td>".$lprn->tanggal_penjualan."</td>".
                                                      	"<td>".$lprn->nama_customer."</td>".
                                                      	"<td>".$lprn->no_hp."</td>".
                                                        "<td>".$lprn->nama_barang."</td>".
                                                        "<td>".$lprn->harga_jual."</td>".
                                                        "<td>".$lprn->jumlah."</td>";
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