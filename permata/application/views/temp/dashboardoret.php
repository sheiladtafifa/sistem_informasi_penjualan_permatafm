 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Dashboard</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->	

						<div class="alert alert-primary" role="alert">
						<h3 class="alert-heading">Halo <?php echo $this->session->userdata('nama');?> ,</h3>
						<h4 class="alert-heading">Selamat Datang di Sistem Informasi Permata Fresh Mart!</h4>
						<p></p>
						<p>Pada sistem ini, anda mempunyai kepentingan sebagai <b><?php echo $this->session->userdata('jabatan');?></b>.</p>
						<p>Untuk lebih lanjut, anda dapat klik berbagai menu di sebelah kiri untuk melakukan kegiatan sesuai kepentingan anda.</p>
						</div>

							<div class="row">

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fas fa-shopping-basket float-right text-white"></i> -->
													<h6 class="text-white text-uppercase m-b-20">Total Barang Masuk</h6>
													<h1 class="m-b-20 text-white "><?php if ($sum_br_master || $sum_pj_barang) { echo $sum_br_master+$sum_pj_barang; } else { echo 0; } ?> Barang</h1>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fa fa-people-carry float-right text-white"></i> -->
													<h6 class="text-white text-uppercase m-b-20">Total Barang Terjual</h6>
													<h1 class="m-b-20 text-white "><?php if ($sum_pj_barang) { echo $sum_pj_barang; } else { echo 0; } ?> Barang</h1>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fa fa-dolly float-right text-white"></i> -->
													<h6 class="text-white text-uppercase m-b-20">Total Sisa Barang</h6>
													<h1 class="m-b-20 text-white "><?php if ($sum_br_master) { echo $sum_br_master; } else { echo 0; } ?> Barang</h1>
											</div>
									</div>

							</div>
							<!-- end row -->

							<div class="row">

									<!-- <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fa fa-people-carry float-right text-white"></i> -->
													<!-- <h6 class="text-white text-uppercase m-b-20">Total Penjualan Hari ini</h6>
													<h1 class="m-b-20 text-white ">Rp <?=$this->fungsi->rupiah($pj_hari_ini);?></h1>
											</div>
									</div> -->

									<!-- <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fa fa-dolly float-right text-white"></i> -->
													<!-- <h6 class="text-white text-uppercase m-b-20">Total Penjualan Kemarin</h6>
													<h1 class="m-b-20 text-white ">Rp <?=$this->fungsi->rupiah($pj_kemarin);?></h1> -->
											<!-- </div>
									</div>  -->
									
									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fas fa-shopping-basket float-right text-white"></i> -->
													<h6 class="text-white text-uppercase m-b-20">Total Modal</h6>
													<h1 class="m-b-20 text-white ">Rp <?=$this->fungsi->rupiah($modal);?></h1>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fas fa-shopping-basket float-right text-white"></i> -->
													<h6 class="text-white text-uppercase m-b-20">Total Penjualan</h6>
													<h1 class="m-b-20 text-white ">Rp <?=$this->fungsi->rupiah($total_wdisc);?></h1>
											</div>
									</div>

									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fa fa-people-carry float-right text-white"></i> -->
													<h6 class="text-white text-uppercase m-b-20">Total Keuntungan</h6>
													<h1 class="m-b-20 text-white ">Rp <?=$this->fungsi->rupiah($total_wdisc - $total_pj_modal + $sum_minus);?></h1>
											</div>
									</div>

							</div>
							<!-- end row -->

							<div class="row">
									<!-- <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
											<div class="card-box noradius noborder bg-info">
													<!-- <i class="fa fa-dolly float-right text-white"></i> -->
													<!-- <h6 class="text-white text-uppercase m-b-20">Total Keuntungan Tertunda</h6>
													<h1 class="m-b-20 text-white ">Rp <?=ltrim($this->fungsi->rupiah($sum_minus), '-');?></h1>
											</div>
									</div> -->
							</div>
							<!-- end row -->

							

							<!-- <?php if($this->session->userdata('jabatan') == "Manager" ):?>
							<div class="row">
					
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
								<div class="card mb-3">
									<div class="card-header">
										<i class="fa fa-table"></i> Bar Chart
									</div>
										
									<div class="card-body">
										<canvas id="barChart"></canvas>
									</div>							
									<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
								</div> end card					
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">						
								<div class="card mb-3">
									<div class="card-header">
										<i class="fa fa-table"></i> Combo Bar Line Chart
									</div>
										
									<div class="card-body">
										<canvas id="comboBarLineChart"></canvas>
									</div>							
									<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
								</div><!-- end card-->					
							<!-- </div>

					</div> -->

					<!-- <div class="row">

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">						
										<div class="card mb-3">
											<div class="card-header">
												<h3><i class="fa fa-users"></i> Staff details</h3>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus non luctus metus. Vivamus fermentum ultricies orci sit amet sollicitudin.
											</div>
												
											<div class="card-body">
												
												<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
													<thead>
														<tr>
															<th>Name</th>
															<th>Position</th>
															<th>Office</th>
															<th>Age</th>
															<th>Start date</th>
															<th>Salary</th>
														</tr>
													</thead>													
													<tbody>
														<tr>
															<td>Tiger Nixon</td>
															<td>System Architect</td>
															<td>Edinburgh</td>
															<td>61</td>
															<td>2011/04/25</td>
															<td>$320,800</td>
														</tr>
														<tr>
															<td>Garrett Winters</td>
															<td>Accountant</td>
															<td>Tokyo</td>
															<td>63</td>
															<td>2011/07/25</td>
															<td>$170,750</td>
														</tr>
														<tr>
															<td>Ashton Cox</td>
															<td>Junior Technical Author</td>
															<td>San Francisco</td>
															<td>66</td>
															<td>2009/01/12</td>
															<td>$86,000</td>
														</tr>
														<tr>
															<td>Cedric Kelly</td>
															<td>Senior Javascript Developer</td>
															<td>Edinburgh</td>
															<td>22</td>
															<td>2012/03/29</td>
															<td>$433,060</td>
														</tr>
														<tr>
															<td>Airi Satou</td>
															<td>Accountant</td>
															<td>Tokyo</td>
															<td>33</td>
															<td>2008/11/28</td>
															<td>$162,700</td>
														</tr>
														<tr>
															<td>Brielle Williamson</td>
															<td>Integration Specialist</td>
															<td>New York</td>
															<td>61</td>
															<td>2012/12/02</td>
															<td>$372,000</td>
														</tr>
														<tr>
															<td>Herrod Chandler</td>
															<td>Sales Assistant</td>
															<td>San Francisco</td>
															<td>59</td>
															<td>2012/08/06</td>
															<td>$137,500</td>
														</tr>
														<tr>
															<td>Rhona Davidson</td>
															<td>Integration Specialist</td>
															<td>Tokyo</td>
															<td>55</td>
															<td>2010/10/14</td>
															<td>$327,900</td>
														</tr>
														<tr>
															<td>Colleen Hurst</td>
															<td>Javascript Developer</td>
															<td>San Francisco</td>
															<td>39</td>
															<td>2009/09/15</td>
															<td>$205,500</td>
														</tr>
														<tr>
															<td>Sonya Frost</td>
															<td>Software Engineer</td>
															<td>Edinburgh</td>
															<td>23</td>
															<td>2008/12/13</td>
															<td>$103,600</td>
														</tr>
														<tr>
															<td>Jena Gaines</td>
															<td>Office Manager</td>
															<td>London</td>
															<td>30</td>
															<td>2008/12/19</td>
															<td>$90,560</td>
														</tr>
														<tr>
															<td>Quinn Flynn</td>
															<td>Support Lead</td>
															<td>Edinburgh</td>
															<td>22</td>
															<td>2013/03/03</td>
															<td>$342,000</td>
														</tr>										
														<tr>
															<td>Fiona Green</td>
															<td>Chief Operating Officer (COO)</td>
															<td>San Francisco</td>
															<td>48</td>
															<td>2010/03/11</td>
															<td>$850,000</td>
														</tr>
														<tr>
															<td>Shou Itou</td>
															<td>Regional Marketing</td>
															<td>Tokyo</td>
															<td>20</td>
															<td>2011/08/14</td>
															<td>$163,000</td>
														</tr>
														<tr>
															<td>Jonas Alexander</td>
															<td>Developer</td>
															<td>San Francisco</td>
															<td>30</td>
															<td>2010/07/14</td>
															<td>$86,500</td>
														</tr>
														<tr>
															<td>Shad Decker</td>
															<td>Regional Director</td>
															<td>Edinburgh</td>
															<td>51</td>
															<td>2008/11/13</td>
															<td>$183,000</td>
														</tr>
														<tr>
															<td>Michael Bruce</td>
															<td>Javascript Developer</td>
															<td>Singapore</td>
															<td>29</td>
															<td>2011/06/27</td>
															<td>$183,000</td>
														</tr>
														<tr>
															<td>Donna Snider</td>
															<td>Customer Support</td>
															<td>New York</td>
															<td>27</td>
															<td>2011/01/25</td>
															<td>$112,000</td>
														</tr>
													</tbody>
												</table>
												
											</div>	 -->													
										<!-- </div> --><!-- end card-->					
									<!-- </div> -->
								<!-- </div> -->
					<!-- <?php endif; ?> -->
							

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	
	<script>
	// barChart
	var ctx1 = document.getElementById("barChart").getContext('2d');
	var barChart = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
				label: 'Amount received',
				data: [12, 19, 3, 5, 10, 5, 13, 17, 11, 8, 11, 9],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'				
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});

	// comboBarLineChart
	var ctx2 = document.getElementById("comboBarLineChart").getContext('2d');
	var comboBarLineChart = new Chart(ctx2, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					type: 'line',
					label: 'Dataset 1',
					borderColor: '#484c4f',
					borderWidth: 3,
					fill: false,
					data: [12, 19, 3, 5, 2, 3, 13, 17, 11, 8, 11, 9],
				}, {
					type: 'bar',
					label: 'Dataset 2',
					backgroundColor: '#FF6B8A',
					data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
					borderColor: 'white',
					borderWidth: 0
				}, {
					type: 'bar',
					label: 'Dataset 3',
					backgroundColor: '#059BFF',
					data: [10, 11, 7, 5, 9, 13, 10, 16, 7, 8, 12, 5],
				}], 
				borderWidth: 1
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});	

</script>