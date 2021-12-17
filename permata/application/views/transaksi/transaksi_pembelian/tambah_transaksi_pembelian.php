<div class="content-page">
  
    <!-- Start content -->
        <div class="content">
            
      <div class="container-fluid">
          
            <div class="row">
                  <div class="col-xl-12">
                      <div class="breadcrumb-holder">
                          <h1 class="main-title float-left">Tambah Pembelian</h1>
                          <div class="clearfix"></div>
                      </div>
                  </div>
            </div>
            <!-- end row -->

            <div class="row">
      
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-9">            
            <div class="card mb-3">
              <div class="card-header">
                <h3>Tambah Pembelian</h3>
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
          
                          <form action = "<?php echo base_url('index.php/Transaksi_Pembelian/insert');?>/" method="post" name="autoSumForm">
                           <div class="box">                
                              <div class="box-header">
                                  <div class="box-tools">                    
                                  </div>
                              </div><!-- /.box-header -->
                              <div class="box-body table-responsive no-padding">

          <input type="button" value="Add Pembelian" class="btn btn-info" onClick="addRow('dataTable')" /> 
          <input type="button" value="Remove Pembelian" class="btn btn-info" onClick="deleteRow('dataTable')"  /> 
          <table id="dataTable"  class="table table-hover no-border " border="0"> 
                  <tbody>
                    <tr>
                      <p>
            <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
             <td>
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Barang</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="id_barang[]">
                      <option>....</option>
                <?php
                  foreach ($list as $barang)
                      {
                      echo "<option value='".$barang->id_barang."'/> ".$barang->nama_barang."</option>"; 
                      }
                ?>
              </select>
            </div>
              </div>
             </td>
             <td>
              <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jumlah</label>
              <div class="col-sm-4">
              <input type="number" required="required" name="jumlah[]" class="form-control" min="0">
            </div>
          </div>
             </td>
              </p>
                    </tr>
                    </tbody>
                </table>

                    <br>
                  </div><!-- /.box-body -->                
                  <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </form>
            </div><!-- /.box -->     
            </div><!-- end card-->          
                    </div>

            </div>
      <!-- END container-fluid -->

    </div>
    <!-- END content -->

    </div>
  <!-- END content-page -->