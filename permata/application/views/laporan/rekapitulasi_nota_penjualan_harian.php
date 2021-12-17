<!--  <style type="text/css">
    table,
    th,
    tr,
    td {
        text-align: center;
    }

    .swal2-popup {
        font-family: inherit;
        font-size: 1.2rem;
    }

    .btn-group,
    .btn-group-vertical {
        position: relative;
        display: initial;
        vertical-align: middle;
    }
</style> -->

 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Rekapitulasi Nota Penjualan Harian</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3>Rekapitulasi Nota Penjualan Harian</h3>
								</div>
									
								<div class="card-body">
									<?php echo form_open('laporan/rekapitulasi_nota_penjualan_harian', array('role' => "form", 'id' => "myForm", 'data-toggle' => "validator")); ?>
									<div class="form-row">
    									<div class="col-md-4 mb-3">
											<label class="col-form-label" for="start_date">Mulai</label> &nbsp;
												<input class="form-control" type="date" name="start_date" value="<?php $time = mktime(0, 0, 0, date('m')-1, date('d'), date('Y')); echo date('Y-m-d', $time);?>" required=""> &nbsp;
										</div>
										<div class="col-md-4 mb-3">
											<label class="col-form-label" for="end_date">Sampai</label> &nbsp;
												<input class="form-control" type="date" name="end_date" value="<?=date('Y-m-d');?>" required=""> &nbsp;
										</div>
										<div class="col-md-2" style="padding-top:36px;">
											<label class="col-form-label" for="search"></label> &nbsp;
											<button type="submit" name="search" id="search" value="Search" class="btn btn-primary"> Cari</button>
										</div>
									</div>

				<!-- <div class="row">
                    <div class="col-xs-12">

                        <div class="col-md-8">
                            <div class="input-daterange">
                                <div class="form-group">
                                    <label for="start_date" class="control-label">Tanggal Awal</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="start_date" id="start_date" data-error="Tanggal Awal harus diisi" required />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-daterange">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Tanggal Akhir</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="end_date" id="end_date" data-error="Tanggal Akhir harus diisi" required />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top:25px;">
                            <button type="submit" name="search" id="search" value="Search" class="btn btn-info"> Search</button>
                        </div>
                        </form>
                    </div>
                </div> -->
                				<div class="table-responsive">
									<table id="example" class="table table-bordered table-hover display">
										<!-- <table id="example" class="display nowrap" style="width:100%"> -->
										<thead>
											<tr>
												<th>No</th>
					                            <th>No Transaksi</th>
					                            <th>Nama Customer</th>
					                            <th>Tanggal Transaksi</th>
					                            <th>Jam Transaksi</th>
											</tr>
										</thead>										
										<tbody>
											<?php $no = 0;
					                        foreach ($laporan as $row) { ?>
					                        <tr>
					                            <td><?php echo ++$no; ?></td>
					                            <td><?php echo $row->no_trx; ?></td>
					                            <td><?php echo $row->nama_customer; ?></td>
					                            <td><?php echo $row->tgl_trx; ?></td>
					                            <td><?php echo $row->waktu_trx; ?></td>
					                        </tr>
					                        <?php } ?>
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

	<script>
//     $(document).ready(function() {
//     $('#example').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );
$(document).ready(function() {
		$('#example').DataTable({

			dom: 'Blfrtip',
			buttons: [{
					extend: 'csvHtml5',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, ],
					},
				},
				{
					extend: 'excelHtml5',
					title: 'REKAPITULASI NOTA PENJUALAN HARIAN',
					exportOptions: {
						columns: [0, 1, 2, 3, 4],
					},
				},
				{
					extend: 'copyHtml5',
					title: 'Rekapitulasi Nota Penjualan Harian',
					exportOptions: {
						columns: [0, 1, 2, 3, 4],
					},
				},
				{
					extend: 'pdfHtml5',
					oriented: 'portrait',
					pageSize: 'legal',
					title: 'Rekapitulasi Nota Penjualan Harian',
					download: 'open',
					exportOptions: {
						columns: [0, 1, 2, 3, 4],
					},
					customize: function(doc) {
						doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
						doc.styles.tableBodyEven.alignment = 'center';
						doc.styles.tableBodyOdd.alignment = 'center';
					},
				},
				{
					extend: 'print',
					oriented: 'portrait',
					pageSize: 'A4',
					title: 'Rekapitulasi Nota Penjualan Harian',
					exportOptions: {
						columns: [0, 1, 2, 3, 4],
					},
				},
			],
			"fnDrawCallback": function() {
				$('.image-link').magnificPopup({
					type: 'image',
					closeOnContentClick: true,
					closeBtnInside: false,
					fixedContentPos: true,
					image: {
						verticalFit: true
					},
					zoom: {
						enabled: true,
						duration: 300 // don't foget to change the duration also in CSS
					},
				});
			}
		});
	});
</script>