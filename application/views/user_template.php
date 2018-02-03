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
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,Angular 2,Angular4,Angular 4,jQuery,CSS,HTML,RWD,Dashboard,React,React.js,Vue,Vue.js">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>CoreUI - Open Source Bootstrap Admin Template</title>


  <!-- Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">

  <!-- Main styles for this application -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/src/css/style.css" rel="stylesheet">
  <!-- Styles required by this views -->

</head>

<header class="app-header navbar">
  <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <a class="navbar-brand" href="#"></a> -->
  <!-- <a href="<?php echo site_url('User_home'); ?>" class="logo-fsm">
            <img src="<?php echo base_url(); ?>assets/src/img/logo fsm.png" alt="Logo" class="logo-fsm">
        </a> -->
  <a href="<?php echo site_url('User_home'); ?>" style="margin-left:20px; margin-right:45px"class="logo pointbtn">
    <img width="100" src="<?php echo base_url(); ?>assets/src/img/logo_fsm.png">
  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <ul class="nav navbar-nav d-md-down-none">
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Dashboard</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Users</a>
    </li>
    <li class="nav-item px-3">
      <a class="nav-link" href="#">Settings</a>
    </li>
  </ul>
  <ul class="nav navbar-nav ml-auto" style="margin-right:20px">
    <li class="nav-item d-md-down-none">
      <a ><span class=""><?php echo $this->session->userdata('namalengkap')?></span></a>
    </li>
    <li class="nav-item dropdown" >
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img src="<?php echo base_url(); ?>assets/src/img/avatars/6.jpg" class="img-avatar" alt="<?php echo $this->session->userdata('nim')?>">
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>Account</strong>
        </div>
        <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> Updates<span class="badge badge-info">42</span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> Messages<span class="badge badge-success">42</span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> Tasks<span class="badge badge-danger">42</span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> Comments<span class="badge badge-warning">42</span></a>
        <div class="dropdown-header text-center">
          <strong>Settings</strong>
        </div>
        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
        <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
        <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-secondary">42</span></a>
        <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
        <div class="divider"></div>
        <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
        <a class="dropdown-item" href="<?php echo site_url('User_login/logout'); ?>"><i class="fa fa-lock"></i> Logout</a>
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
  <?php  $this->load->view($content);?>
<!-- End Content -->
</body>

<footer class="app-footer">
<span><a href="http://coreui.io">CoreUI</a> © 2018 creativeLabs.</span>
<span class="ml-auto">Powered by <a href="http://coreui.io">CoreUI</a></span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="<?php echo base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/pace-progress/pace.min.js"></script>

<!-- Plugins and scripts required by all views -->
<script src="<?php echo base_url(); ?>assets/node_modules/chart.js/dist/Chart.min.js"></script>

<!-- CoreUI main scripts -->

<script src="<?php echo base_url(); ?>assets/src/js/app.js"></script>

<!-- Plugins and scripts required by this views -->

<!-- Custom scripts required by this view -->
<script src="<?php echo base_url(); ?>assets/src/js/views/main.js"></script>


</html>
