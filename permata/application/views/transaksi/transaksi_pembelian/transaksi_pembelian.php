 <div class="content-page">
  
    <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">
          
                <div class="row">
                      <div class="col-xl-12">
                          <div class="breadcrumb-holder">
                              <h1 class="main-title float-left">Tambah Pembelian Barang</h1>
                              <div class="clearfix"></div>
                          </div>
                      </div>
                </div>
                <!-- end row -->

                <div class="row">
      
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-12">            
                        <div class="card mb-3">
                            <div class="card-header">
                                 <h3>Tambah Pembelian Barang</h3>
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
                     
<form>
    <div class="form-group">
        <input class="form-control" type="text" onkeyup="showResult(this.value)" placeholder="Ketik Nama Barang">
        <div id="hasilcari"></div>
    </div>
</form>
<?php if ($this->session->flashdata('message')) { ?>
<div class="alert alert-dismissible alert-light">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <p class="mb-0"><?php echo $this->session->flashdata('message');?></p>
</div>
<?php } else { echo "<br />"; } ?>
<table class="table table-hover">
    <thead>
        <tr>
            <td><strong>Kode</strong></td>
            <td><strong>Barang</strong></td>
            <td><strong>Qty</strong></td>
            <td align="right"><strong>Harga</strong></td>
            <td align="center"><strong>Total</strong></td>
            <?php if (!empty($this->cart->contents())) { ?>
            <td align="center"><strong>Batal</strong></td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php 
    if (!empty($this->cart->contents())) {
        foreach ($this->cart->contents() as $items) { ?>
        <tr class="table-secondary">
            <td><?=$items['id'];?></td>
            <td><?=$items['name'];?></td>
            <td>
                <form action="<?=base_url('index.php/transaksi_pembelian/updatecart');?>" method="POST">
                    <input hidden="" type="text" name="idbrg" value="<?=$items['id_brg'];?>">
                    <input hidden="" type="text" name="rowid" value="<?=$items['rowid'];?>">
                    <input type="number" value="<?=$items['qty'];?>" name="qty" size="5"> &nbsp; <button hidden="" class="btn btn-primary btn-sm fa fa-check" title="Simpan"></button>
                </form>
            </td>
            <td align="right"><?=$this->fungsi->rupiah($items['price']);?></td>
            <td align="right"><?=$this->fungsi->rupiah($items['subtotal']);?></td>
            <td align="center"><button class="btn btn-danger btn-sm fa fa-times" onclick="location.href = '<?=base_url();?>index.php/transaksi_pembelian/removecart/<?=$items['rowid'];?>';" title="Batalkan"></button></td>
        </tr>
    <?php } } else { ?>
        <tr class="table-secondary">
            <td align="center" colspan="5">&nbsp;</td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="6" align="right"><font size="6"><strong>Rp <?=$this->fungsi->rupiah($this->cart->total());?></strong></font></td>
        </tr>
    </tbody>
</table>
<?php if (!empty($this->cart->contents())) { ?>
<form action="<?=base_url('index.php/transaksi_pembelian/transaction');?>" method="POST" name="frm_byr">
<tr class="table-secondary">
            <td align="right" colspan="4"><button class="btn btn-primary pull-right">Simpan</button></td>
        </tr>
</form>
<?php } ?>  
            </div><!-- end card-->          
                    </div>
                  </div>

            </div>
      <!-- END container-fluid -->

    </div>
    <!-- END content -->

    </div>
  <!-- END content-page -->

<script language="JavaScript">
    function startCalculate()
    {
        interval=setInterval("Calculate()",1);
    }
    function Calculate()
    {
        var a=<?=$this->cart->total();?>;
        var b=document.frm_byr.total.value;
        var d=document.frm_byr.bayar.value;
        var e=100;
        var g=(a);
        var h=(d - g);
        document.frm_byr.total.value=(g);
        document.frm_byr.kembalian.value=(h);
        var hasil;
        hasil = (g);
        var bilangan = (g);
        var number_string = bilangan.toString(),
            sisa    = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        document.getElementById("hasil").innerHTML=rupiah;
    }
    function stopCalc()
    {
        clearInterval(interval);
    }

    function showResult(str) {
      if (str.length==0) {
        document.getElementById("hasilcari").innerHTML="";
        document.getElementById("hasilcari").style.border="0px";
        return;
      }
      if (window.XMLHttpRequest) {
        xmlhttp=new XMLHttpRequest();
      } else {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("hasilcari").innerHTML=this.responseText;
          document.getElementById("hasilcari").style.border="1px solid #A5ACB2";
        }
      }
      xmlhttp.open("GET","<?=base_url();?>index.php/transaksi_pembelian/hasilcari?q="+str,true);
      xmlhttp.send();
    }
</script>