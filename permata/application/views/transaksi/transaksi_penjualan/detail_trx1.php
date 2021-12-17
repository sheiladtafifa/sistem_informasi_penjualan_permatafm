 <div class="content-page">
    
        <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">
                    
                        <div class="row">
                                    <div class="col-xl-12">
                                            <div class="breadcrumb-holder">
                                                    <h1 class="main-title float-left">Detail Invoice</h1>
                                                    <div class="clearfix"></div>
                                            </div>
                                    </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-12">                      
                            <div class="card mb-12">
                                <div class="card-header">
                                    <h3>Detail Invoice</h3>
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

<h4>Invoice</h4>
<p><strong>Nomor:</strong> <?=$nota;?> | <strong>Nama Customer:</strong> <?=$nama_customer;?> | <strong>Kasir:</strong> <?=$kasir;?> | <strong>Tanggal:</strong> <?=$this->fungsi->tanggalindo($tanggal);?> <?=$jam;?></p>
<table class="table table-hover">
    <thead>
      <tr>
          <td align="center" scope="col"><strong>#</strong></td>
          <td scope="col"><strong>KODE BARANG</strong></td>
          <td scope="col"><strong>NAMA BARANG</strong></td>
          <td align="center" scope="col"><strong>JUMLAH</strong></td>
          <td align="right" scope="col"><strong>HARGA BARANG</strong></td>
          <td align="right" scope="col"><strong>SUB TOTAL</strong></td>
      </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($result as $items) { ?>
        <tr class="table-secondary">
            <td align="center"><?=$no++;?></td>
            <td><?=$items->kode_barang;?></td>
            <td><?=$items->nama_barang;?></td>
            <td align="center"><?=$items->jml_jual;?></td>
            <td align="right">Rp <?=$this->fungsi->rupiah($items->harga_jual);?></td>
            <td align="right">Rp <?=$this->fungsi->rupiah($items->sub_total);?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="4"></td>
            <td align="right" colspan="2"><font size="5">Rp <?=$this->fungsi->rupiah($grand_total);?></font></td>
        </tr>
        <tr class="table-secondary">
            <td colspan="4">&nbsp;</td>
            <td><strong>TOTAL</strong></td>
            <td align="right">Rp <?=$this->fungsi->rupiah($total);?></td>
        </tr>
        <tr class="table-secondary">
            <td colspan="4">&nbsp;</td>
            <td><strong>BAYAR</strong></td>
            <td align="right">Rp <?=$this->fungsi->rupiah($bayar);?></td>
        </tr>
        <tr class="table-secondary">
            <td colspan="4">&nbsp;</td>
            <td><strong>KEMBALI</strong></td>
            <td align="right">Rp <?=$this->fungsi->rupiah($kembalian);?></td>
        </tr>
    </tbody>
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

