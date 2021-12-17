<div class="content-page">
    
        <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">
                    
                        <div class="row">
                                    <div class="col-xl-12">
                                            <div class="breadcrumb-holder">
                                                    <h1 class="main-title float-left">Detail Transaksi Pembelian</h1>
                                                    <div class="clearfix"></div>
                                            </div>
                                    </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">                      
                            <div class="card mb-12">
                                <div class="card-header">
                                    <h3>Detail Transaksi Pembelian</h3>
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
                                    <table class="table table-bordered table-hover display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Beli</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                            </tr>
                                            <tbody>
                                                <tr> 
                                                <?php if($detail_pembelian != 0)
                                                  {     
                                                    $i=1;             
                                                    foreach ($detail_pembelian as $dtl) {
                                                        $total=$dtl->harga_beli*$dtl->jumlah;
                                                    echo 
                                                      "<tr>".
                                                       
                                                        "<td>".$i."</td>".
                                                        "<td>".$dtl->nama_barang."</td>".
                                                        "<td>".$dtl->harga_beli."</td>".
                                                        "<td>".$dtl->jumlah."</td>".
                                                        "<td>".$total."</td>";
                                                        $i++;
                                                    }
                                                }
                                                        ?>
                                                </tr>
                                            </tbody>
                                        </thead>
                                    </table>
                                    
                                </div>                                                      
                            </div><!-- end card-->                  
                        </div>

            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->