 <div class="content-page">
  
    <!-- Start content -->
        <div class="content">
            
      <div class="container-fluid">
          
            <div class="row">
                  <div class="col-xl-12">
                      <div class="breadcrumb-holder">
                          <h1 class="main-title float-left">Penjualan</h1>
                          <div class="clearfix"></div>
                      </div>
                  </div>
            </div>
            <!-- end row -->

            <div class="row">
      
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">            
            <div class="card mb-3">
              <div class="card-header">
                <h3>Penjualan</h3>
              </div>
                
              <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="box box-widget">
                        <div class="box-body">
                          <table width="100%">
                            <tr>
                              <td style="vertical-align:top">
                                <label for="date">Date</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="text" name="nama_user" value="<?php echo $this->session->userdata('nama'); ?>" class="form-control" readonly>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align:top">
                                <label for="customer">Customer</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="text" name="nama_customer" value="" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="box box-widget">
                        <div class="box-body">
                          <table width="100%">
                            <tr>
                              <td style="vertical-align:top; width:30%">
                                <label for="kode_barang">Kode Barang</label>
                              </td>
                              <td>
                                <div class="form-group input-group">
                                  <input type="hidden" name="kode_barang">
                                  <input type="hidden" name="harga_jual">
                                  <input type="hidden" name="stok">
                                  <input type="text" name="kode_barang" class="form-control">
                                  <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                      <i class="fa fa-search"></i>
                                    </button>
                                  </span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align: top">
                                <label for="jumlah">Jumlah</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="jumlah" min="1" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td>
                                <div>
                                  <button type="button" id="add-cart" class="btn btn-primary">
                                    <i class="fa fa-cart-plus"></i> Tambah
                                  </button>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="box box-widget">
                        <div class="box-body">
                          <div align="right">
                            <h4>Invoice <b><span name="invoice"><?= $invoice ?></span></b></h4>
                            <h1><b><span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
                          </div>
                        </div>
                      </div>                      
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="box box-widget">
                        <div class="box-body table-responsive">
                          <table class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th width="10%">Discount Item</th>
                                <th width="15%">Total</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody id="cart_table">
                              <tr>
                                <td colspan="9" class="text-center">Tidak Ada Barang</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="box box-widget">
                        <div class="box-body">
                          <table width="100%">
                            <tr>
                              <td style="vertical-align: top; width: 30%">
                                <label for="total_penjualan">Sub Total</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="total_penjualan" value="" class="form-control" readonly>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align: top">
                                <label for="discount">Discount</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="discount" value="0" min="0" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align: top">
                                <label for="total">Total</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="total" class="form-control" readonly>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="box box-widget">
                        <div class="box-body">
                          <table width="100%">
                            <tr>
                              <td style="vertical-align: top; width: 30%">
                                <label for="sub_total">Cash</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="cash" value="0" min="0" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td style="vertical-align: top">
                                <label for="change">Change</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="change" class="form-control" readonly>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div>
                        <button id="cancel_payment" class="btn btn-flat btn-warning">
                          <i class="fa fa-refresh"></i> Cancel
                        </button><br><br>
                        <button id="process_payment" class="btn btn-flat btn-success">
                          <i class="fa fa-paper-plane"></i> Process Payment
                        </button>
                      </div>
                    </div>
                  </div>
                    
                  </div><!-- /.box-body -->  
            </div><!-- /.box -->     
            </div><!-- end card-->          
                    </div>

            </div>
      <!-- END container-fluid -->

    </div>
    <!-- END content -->

    </div>
  <!-- END content-page -->