 <style>
    /*@media print {
        #page {
          margin-top: 30px;
          margin-left: 60px;
        }

        .main-sidebar,
        .headerbar,
        .footer,
        .main-title,
        .card-header,
        .btn {
            display: none;
        }*/

    /* }*/

     @media print {
        .no-print {
            display: none;
        }
    }

</style>

 <div class="content-page">
    
        <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">
                    
                        <div class="row">
                                    <div class="col-xl-12">
                                            <div class="breadcrumb-holder">
                                                    <h1 class="main-title float-left">Struk Invoice</h1>
                                                    <div class="clearfix"></div>
                                            </div>
                                    </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-9">                      
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3>Struk Invoice</h3>
                                </div>

          <div class="card-body">
            
            <div class="container">
              
              <div id="print-area">          
              <div class="row">
                <div class="col-md-12">
                  <div class="invoice-title text-center mb-3">
                  <img src="<?php echo base_url(); ?>assets/images/permata.png" style="max-width:150px;">
                  <h3>Permata Fresh Mart</h3>                   
                  </div>
                  <hr>

              <div class="row">
                <div class="col-md-6">  
                  <strong>Nomor:</strong> <?=$nota;?>
                  <p></p>
                  <strong>Kasir:</strong> <?=$kasir;?>
                  <p></p>
                  <strong>Tanggal:</strong> <?=$this->fungsi->tanggalindo($tanggal);?> 
                  <p></p>
                  <strong>Waktu:</strong> <?=$jam;?>
                </div>
              </div>

              <p></p>

              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-condensed">
                        <thead>
                          <tr>
                          <td><strong>No</strong></td>
                          <td class="text-center"><strong>Kode Barang</strong></td>
                          <td class="text-center"><strong>Nama Barang</strong></td>
                          <td class="text-center"><strong>Jumlah</strong></td>
                          <td class="text-center"><strong>Harga Barang</strong></td>
                          <td class="text-right"><strong>Sub Total</strong></td>
                          </tr>
                        </thead>
                        <tbody>
                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                        <?php $no=1; foreach ($result as $items) { ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td class="text-center"><?=$items->kode_barang;?></td>
                                <td class="text-center"><?=$items->nama_barang;?></td>
                                <td class="text-center"><?=$items->jumlah;?></td>
                                <td class="text-center">Rp <?=$this->fungsi->rupiah($items->harga_jual);?></td>
                                <td class="text-right">Rp <?=$this->fungsi->rupiah($items->sub_total);?></td>
                            </tr>
                            <?php } ?>
                          <tr>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line"></td>
                            <td class="thick-line text-center"><strong>Total</strong></td>
                            <td class="thick-line text-right">Rp <?=$this->fungsi->rupiah($total);?></td>
                          </tr>
                          <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Bayar</strong></td>
                            <td class="no-line text-right">Rp <?=$this->fungsi->rupiah($bayar);?></td>
                          </tr>
                          <tr>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Kembali</strong></td>
                            <td class="no-line text-right">Rp <?=$this->fungsi->rupiah($kembalian);?></td>
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
                   <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
                                <span class="pull-right col-xs-12">
                                    <button onclick="printDiv('print-area')" class="btn btn-block btn-primary">Print</button> </span>
                      </div>
                     <!--  <span class="pull-right col-xs-12">
                                    <button onclick="window.print()" class="btn btn-block btn-primary">Print</button> 
                                    <button onclick="printDiv('print-area')" class="btn btn-block btn-primary">Print</button>
                      </span> -->

                    </div><!-- end container --> 
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

<script type="text/javascript">
    function printDiv(divName) {
        let printContents = document.getElementById(divName).innerHTML;
        let originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload(true);
        setTimeout(function() {}, 1000);
    }
</script>

