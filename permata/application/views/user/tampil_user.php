 <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					
						<div class="row">
									<div class="col-xl-12">
											<div class="breadcrumb-holder">
													<h1 class="main-title float-left">Data User</h1>
													<div class="clearfix"></div>
											</div>
									</div>
						</div>
						<!-- end row -->

						<div class="row">
				
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">						
							<div class="card mb-3">
								<div class="card-header">
									<h3>Data User</h3>
								</div>
									
								<div class="card-body">

									<div class="form-row">
    									<div class="col-md-4 mb-3">
											<a href="<?php echo base_url('index.php/User/tambah_user') ?>" class="btn btn-primary btn-sm btn-float-right">Tambah Data User</a>
										</div>
									</div>

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
												<th>Username</th>
												<th>Password</th>
												<th>Nama User</th>
												<th>Jabatan</th>
												<th>Aksi</th>
											</tr>
										</thead>										
										<tbody>
											<?php if($user != 0)
                          {                  
                            foreach ($user as $usr) {
                            echo 
                              "<tr>".
                                "<td>".$usr->username."</td>".
                                "<td>".$usr->password."</td>".
                                "<td>".$usr->nama_user."</td>".
                                "<td>".$usr->jabatan."</td>";
                                ?>
                               <td><a role="button" class="btn btn-primary" href="<?php echo base_url('index.php/User/edit/'.$usr->id_user)?>"><i class="fa fa-edit"></i></a>
								<a role="button" class="btn btn-danger" href="<?php echo base_url('index.php/User/delete/'.$usr->id_user)?>"><i class="fa fa-trash"></i></a></td>
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