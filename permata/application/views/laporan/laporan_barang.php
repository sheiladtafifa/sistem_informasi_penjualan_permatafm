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
													<h1 class="main-title float-left">Laporan Barang</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3>Laporan Barang</h3>
								</div>
									
								<div class="card-body">
									<?php echo form_open('laporan/laporan_barang', array('role' => "form", 'id' => "myForm", 'data-toggle' => "validator")); ?>
									

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
												<th>Kode Barang</th>
					                            <th>Nama Barang</th>
					                            <th>Kategori Barang</th>
					                            <th>Satuan</th>
					                            <th>Harga Beli</th>
					                            <th>Harga Jual</th>
					                            <th>Supplier</th>
											</tr>
										</thead>										
										<tbody>
											<?php $no = 0;
					                        foreach ($laporan as $row) { ?>
					                        <tr>
					                            <td><?php echo ++$no; ?></td>
					                            <td><?php echo $row->kode_barang; ?></td>
					                            <td><?php echo $row->nama_barang; ?></td>
					                            <td><?php echo $row->nama_kategori; ?></td>
					                            <td><?php echo $row->satuan; ?></td>
					                            <td><?php echo $row->harga_beli; ?></td>
					                            <td><?php echo $row->harga_jual; ?></td>
					                            <td><?php echo $row->nama_supplier; ?></td>
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
			buttons: [
				// {
				// 	extend: 'csvHtml5',
				// 	exportOptions: {
				// 		columns: [0, 1, 2, 3, 4, 5, 6, 7],
				// 	},
				// },
				{
					extend: 'excelHtml5',
					title: 'LAPORAN BARANG',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7],
					},
				},
				// {
				// 	extend: 'copyHtml5',
				// 	title: 'Laporan Barang',
				// 	exportOptions: {
				// 		columns: [0, 1, 2, 3, 4, 5, 6, 7],
				// 	},
				// },
				{
					extend: 'pdfHtml5',
					orientation: 'landscape',
					pageSize: 'LEGAL',
					title: 'Laporan Barang',
					download: 'open',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7],
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
					title: 'Laporan Barang',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7],
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