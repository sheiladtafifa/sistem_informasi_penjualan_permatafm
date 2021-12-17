<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Sistem Informasi Permata Fresh Mart</title>
		<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
		<meta name="author" content="Pike Web Development - https://www.pikephp.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- Bootstrap CSS -->
		<link href="<?php echo base_url('assets');?>/temp_new/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="<?php echo base_url('assets');?>/temp_new/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url('assets');?>/temp_new/assets/plugins/datetimepicker/css/daterangepicker.css" rel="stylesheet" />

		<!-- reference your copy Font Awesome here (from our CDN or by hosting yourself) -->
  		<link href="<?php echo base_url('assets');?>/fontawesome-free-5.15.1-web/css/fontawesome.css" rel="stylesheet">
  		<link href="<?php echo base_url('assets');?>/fontawesome-free-5.15.1-web/css/brands.css" rel="stylesheet">
  		<link href="<?php echo base_url('assets');?>/fontawesome-free-5.15.1-web/css/solid.css" rel="stylesheet">


		
		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets');?>/temp_new/assets/css/style.css" rel="stylesheet" type="text/css" />
		
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->

		<script type="text/javascript" src="<?php echo base_url('assets');?>/script.js"></script>

        <script src="<?php echo base_url('assets');?>/temp_new/assets/js/modernizr.min.js"></script>
        <script src="<?php echo base_url('assets');?>/temp_new/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url('assets');?>/temp_new/assets/js/moment.min.js"></script>


		
</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
	<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a class="logo"><span>Permata Fresh Mart</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        <li class="list-inline-item dropdown notif">
                        	<!-- <img src="<?php echo base_url('assets');?>/images/icon.png"> -->
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            	<span><?php echo $this->session->userdata('nama'); ?> sebagai </span>
                                <span><?php echo $this->session->userdata('jabatan'); ?></span>
                                <span><i class="fa fa-user-circle"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                
                                <!-- item-->
                                <a href="<?php echo base_url('index.php/User/profile_user') ?>" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="<?php echo base_url('index.php/Login/logout') ?>" class="dropdown-item notify-item">
                                    <i class="fa fa-power-off"></i> <span>Logout</span>
                                </a>
								
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>

	</div>
	<!-- End Navigation -->