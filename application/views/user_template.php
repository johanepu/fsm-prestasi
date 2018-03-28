<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.9
 * @link http://coreui.io
 * Copyright (c) 2018 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="RewardMe- Aplikasi Perhitungan Poin Prestasi Mahasiswa
Fakultas Sains dan Matematika
Universitas Diponegoro">
  <meta name="author" content="Johan Eko Purnomo">
  <meta name="keyword" content="RewardMe, FSM, Rewarding, Prestasi, Undip, Fakultas Sains dan Matematika">
  <link rel="icon" href="<?php echo base_url(); ?>img/favicon-full.png" type="image/gif">
  <title><?php echo $title ?></title>


  <!-- Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>assets/src/css/style.css" rel="stylesheet">
  <!-- Styles required by this views -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">
  <!-- Include Date Range Picker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/daterangepicker.css" rel="stylesheet">


</head>
<style>
    .profile_small{
      object-fit: cover;
      width:34px;
      height:40px;
    }

</style>

<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="<?php echo site_url('User_home'); ?>" style="margin-left:20px" class="logo pointbtn">
    <img width="100" src="<?php echo base_url(); ?>assets/src/img/logo_fsm.png">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" style="margin-left:40px" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav ml-auto" style="margin-right:20px">
    <li class="nav-item d-md-down-none">
      <a ><i class="icon-user"></i><span class="" style="margin-left : 5px"><?php echo $this->session->userdata('namalengkap')?></span></a>
    </li>
    <li class="nav-item dropdown" >
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <?php if ($this->session->userdata('foto')==NULL): ?>
          <img src="<?php echo base_url(); ?>assets/src/img/avatars/0.jpg" class="mx-auto profile_small img-avatar " alt="<?php echo $this->session->userdata('nim')?>">
        <?php else: ?>
          <img src=" <?php echo base_url('image-upload/'.$this->session->userdata('foto'));?>" class="mx-auto profile_small img-avatar " alt="<?php echo $this->session->userdata('nim')?>">
        <?php endif; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>Prestasi</strong>
        </div>
        <a class="dropdown-item" href="#"><i class="fa fa-trophy"></i> Prestasi<span class="badge badge-info"><?php echo $jml_prestasi; ?></span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-check-circle"></i> Tervalidasi<span class="badge badge-success"><?php echo $jml_prestasi_validasi; ?></span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-times-circle"></i> Belum Tervalidasi<span class="badge badge-danger"><?php echo $jml_prestasi_blmvalidasi; ?></span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-star"></i> Reward Point<span class="badge badge-warning"><?php echo $jml_reward_point; ?></span></a>
        <div class="dropdown-header text-center">
          <strong>Akun</strong>
        </div>
        <a class="dropdown-item" href="<?php echo site_url('User_profile'); ?>"><i class="fa fa-user"></i> Profile</a>
        <a class="dropdown-item" href="<?php echo site_url('User_login/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a>
      </div>
    </li>
  </ul>

</header>
<!--header end-->
<!-- Start Sidebar -->

  <?php $this->load->view('sidebar_user.php');  ?>

<!-- End Sidebar -->
<!-- Start Content -->
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <?php $this->load->view('common_script.php');  ?>
  <?php  $this->load->view($content);?>
<!-- End Content -->
</body>

  <?php $this->load->view('footer.php');  ?>





</html>
