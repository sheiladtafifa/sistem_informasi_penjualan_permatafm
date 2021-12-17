	<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="<?php echo base_url('index.php/Permata') ?>"><i class="fa fa-clipboard"></i><span> Dashboard </span> </a>
                    </li>

				<?php if($this->session->userdata('jabatan') == "Manager" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/User/tampil_user') ?>"><i class="fa fa-user bigfonts"></i> <span> User </span> </a>
                    </li>
                 <?php endif; ?>

                 <!-- <?php if($this->session->userdata('jabatan') == "Gudang" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Supplier/tampil_supplier') ?>"><i class="fa fa-people-carry"></i> <span> Supplier </span></a>
                    </li>
                    <?php endif; ?> -->

					<?php if($this->session->userdata('jabatan') == "Gudang" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Barang/tampil_barang') ?>"><i class="fa fa-table"></i>Barang</a>
                        <!-- <a href="#"><i class="fa fa-dolly"></i> <span> Barang </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled"> -->
								<!-- <li><a href="<?php echo base_url('index.php/Barang/tampil_barang') ?>"><i class="fa fa-table"></i>Barang</a></li> -->
								<!-- <li><a href="<?php echo base_url('index.php/Kategori_Barang/tampil_kategori_barang') ?>"><i class="fa fa-table"></i>Kategori Barang</a></li>
								<li><a href="<?php echo base_url('index.php/Satuan_Barang/tampil_satuan_barang') ?>"><i class="fa fa-table"></i>Satuan Barang</a></li> -->
							<!-- </ul> -->
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('jabatan') == "Gudang" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Transaksi_Pembelian/transaksi_pembelian') ?>"><i class="fa fa-file-alt"></i> <span> Purchase Order </span></a>
                    </li>
                    <!-- <li class="submenu">
                        <a href="<?php echo base_url('index.php/Transaksi_Pembelian/konfirmasi') ?>"><i class="fa fa-file-alt"></i> <span> Konfirmasi </span></a>
                    </li> -->
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Transaksi_Pembelian/riwayat_pesanan') ?>"><i class="fa fa-file-alt"></i> <span> Riwayat Pesanan </span></a>
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('jabatan') == "Supplier" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Supplier/daftar_pesanan_produk') ?>"><i class="fa fa-file-alt"></i> <span> Daftar Purchase Order </span></a>
                    </li>
                    <?php endif; ?>
										
                    <!-- <?php if($this->session->userdata('jabatan') == "Pegawai" ):?>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-book"></i> <span> Transaksi </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('index.php/Transaksi_Pembelian/tambah_transaksi_pembelian') ?>"><i class="fa fa-plus-circle"></i>Transaksi Pembelian</a></li>
                                <li><a href="<?php echo base_url('index.php/Transaksi_Penjualan/tambah_transaksi_penjualan') ?>"><i class="fa fa-plus-circle"></i>Transaksi Penjualan</a></li>
                            </ul>
                    </li>
                    <?php endif; ?> -->

                    <?php if($this->session->userdata('jabatan') == "Pegawai" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Transaksi_Penjualan/tambah_transaksi_penjualan') ?>"><i class="fas fa-cash-register"></i> <span> Transaksi Penjualan </span></a>
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('jabatan') == "Pegawai" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Transaksi_Penjualan/invoice') ?>"><i class="fas fa-file-alt"></i> <span> Invoice </span></a>
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('jabatan') == "Manager" ):?>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-archive"></i> <span> Laporan </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('index.php/Laporan/laporan_penjualan') ?>"><i class="fas fa-file-alt"></i>Laporan Penjualan</a></li>
                                <li><a href="<?php echo base_url('index.php/Laporan/laporan_barang') ?>"><i class="fas fa-file-alt"></i>Laporan Barang</a></li>
                                <li><a href="<?php echo base_url('index.php/Laporan/laporan_barang_masuk') ?>"><i class="fas fa-file-alt"></i>Laporan Barang Masuk</a></li>
                                <!-- <li><a href="<?php echo base_url('index.php/Laporan/laporan_barang_keluar') ?>"><i class="fas fa-file-alt"></i>Laporan Barang Keluar</a></li> -->
                                <li><a href="<?php echo base_url('index.php/Laporan/laporan_barang_terjual') ?>"><i class="fas fa-file-alt"></i>Laporan Barang Terjual</a></li>
                               <!--  <li><a href="<?php echo base_url('index.php/Laporan/rekapitulasi_nota_penjualan_harian') ?>"><i class="fas fa-file-alt"></i>Rekapitulasi Nota Penjualan Harian</a></li> -->
                            </ul>
                    </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('jabatan') == "Admin" ):?>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Admin/daftarproduk') ?>"><i class="fa fa-file-alt"></i> <span> Barang </span></a>
                    </li>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Admin/invoices') ?>"><i class="fa fa-file-alt"></i> <span> Invoice </span></a>
                    </li>
                    <li class="submenu">
                        <a href="<?php echo base_url('index.php/Admin/konfirmasi') ?>"><i class="fa fa-file-alt"></i> <span> Konfirmasi </span></a>
                    </li>
                    <?php endif; ?>
                    
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->