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

  <!-- Include Date Range Picker -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/daterangepicker.css" />


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
      <a ><i class="icon-user"></i><span class="" style="margin-left : 5px"><?php echo $this->session->userdata('namalengkap')?></span></a>
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
<script src="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-daterangepicker-master/moment.min.js"></script>
<!-- CoreUI main scripts -->

<script src="<?php echo base_url(); ?>assets/src/js/app.js"></script>

<!-- Plugins and scripts required by this views -->

<!-- Custom scripts required by this view -->
<script src="<?php echo base_url(); ?>assets/src/js/views/main.js"></script>

<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click', 'button.btn-edit,button.btn-edit2', function() {
      var id_prestasi = $(this).val();
      var jenisPrestasi = '';
      var tipePrestasi = '';
      $('#editPrestasiModal').modal('show');
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/fetchData',
        data: {id_prestasi:id_prestasi},
        dataType:'json',
        success: function(data){
          console.log(data);
          if(data)
          {
            var prestasi = data[0];
              if (prestasi.jenis_prestasi == 1) {
                jenisPrestasi = 'Akademik';
                document.getElementById("jenis_prestasi_update1").checked = true;
              } else {
                jenisPrestasi = 'Non-Akademik';
                document.getElementById("jenis_prestasi_update2").checked = true;
              }
              if (prestasi.tipe_prestasi == 1) {
                tipePrestasi = 'Individu';
                document.getElementById('role_prestasi_edit').style.display = 'none';
                document.getElementById('role_prestasi_editlabel').style.display = 'none';
                document.getElementById("tipe_prestasi_update_individu").checked = true;
              } else {
                tipePrestasi = 'Kelompok';
                document.getElementById("tipe_prestasi_update_regu").checked = true;
              }

              $('#nama_prestasi_edit').val(prestasi.nama_prestasi);
              $('#peringkat_prestasi_edit').val(prestasi.peringkat_prestasi);
              $('#tipe_prestasi_edit').val(tipePrestasi);
              $('#tipe_prestasi_raw').val(prestasi.tipe_prestasi);
              $('#role_prestasi_edit').val(prestasi.role_prestasi);
              $('#jenis_prestasi_edit').val(jenisPrestasi);
              $('#jenis_prestasi_raw').val(prestasi.jenis_prestasi);
              $('#level_prestasi_edit option[value="'+prestasi.level_prestasi+'"]').prop('selected', true);
              $('#penyelenggara_prestasi_edit').val(prestasi.penyelenggara_prestasi);
              $('#tempat_prestasi_edit').val(prestasi.tempat_prestasi);
              $('#deskripsi_prestasi_edit').val(prestasi.deskripsi_prestasi);
              $('#date_start_edit').val(prestasi.tgl_prestasi_start);
              $('#date_end_edit').val(prestasi.tgl_prestasi_end);
              $('#hiddenId').val(prestasi.id_prestasi);
          }
        }
      });
    });

    $('#btnSimpanPrestasi').click(function(){

      var nama_prestasi = $('#nama_prestasi_edit').val();
      var peringkat_prestasi = $('#peringkat_prestasi_edit').val();
      var role_prestasi = $('#role_prestasi_edit').val();
      var deskripsi_prestasi =  $('#deskripsi_prestasi_edit').val();
      var radiotipe = document.getElementsByName('tipe_prestasi_update');
      for (var i = 0, length = radiotipe.length; i < length; i++)
      {
       if (radiotipe[i].checked)
       {
        var tipe_prestasi = radiotipe[i].value;
        break;
        } else {
          tipe_prestasi = $('#tipe_prestasi_raw').val();
        }
      }
      var radiojenis = document.getElementsByName('jenis_prestasi_update');
      for (var i = 0, length = radiojenis.length; i < length; i++)
      {
       if (radiojenis[i].checked)
       {
        var jenis_prestasi = radiojenis[i].value;
        break;
        } else {
          jenis_prestasi = $('#jenis_prestasi_raw').val();
        }
      }
      var tgl_prestasi_start =  $('#date_start_edit').val();
      var tgl_prestasi_end =  $('#date_end_edit').val();
      var id_prestasi = $('#hiddenId').val();

      // if(tgl_prestasi_start==''){
      //    tgl_prestasi_start =  $('#tgl_prestasi_start_edit').val();
      // }

      var penyelenggara_prestasi =  $('#penyelenggara_prestasi_edit').val();
      var tempat_prestasi =  $('#tempat_prestasi_edit').val();
      var level_prestasi =  $('#level_prestasi_edit').val();

      if(nama_prestasi==''||peringkat_prestasi==''||deskripsi_prestasi==''||penyelenggara_prestasi==''||tempat_prestasi==''||level_prestasi==0){
          console.log('gagal edit');
          alert('Edit Data Gagal, Cek kembali isian Anda');
          return false;
        }else {
           nama_prestasi =   $('#nama_prestasi_edit').val();
           peringkat_prestasi = $('#peringkat_prestasi_edit').val();
           role_prestasi =  $('#role_prestasi_edit').val();
           deskripsi_prestasi =  $('#deskripsi_prestasi_edit').val();
           penyelenggara_prestasi =  $('#penyelenggara_prestasi_edit').val();
           tempat_prestasi =  $('#tempat_prestasi_edit').val();
           level_prestasi =  $('#level_prestasi_edit').val();
           id_prestasi =$('#hiddenId').val();
      }
          $.ajax({
            type: "POST",
            url: '<?=base_url()?>Prestasi/updatePrestasi',
            data: {nama_prestasi:nama_prestasi,
                  peringkat_prestasi:peringkat_prestasi,
                  tipe_prestasi:tipe_prestasi,
                  role_prestasi:role_prestasi,
                  jenis_prestasi:jenis_prestasi,
                  deskripsi_prestasi:deskripsi_prestasi,
                  penyelenggara_prestasi:penyelenggara_prestasi,
                  tempat_prestasi:tempat_prestasi,
                  level_prestasi:level_prestasi,
                  tgl_prestasi_start:tgl_prestasi_start,
                  tgl_prestasi_end:tgl_prestasi_end,
                  id_prestasi:id_prestasi },
            success: function(data){
            }
          });
          // location.reload();
      });

      $(document).on('click', 'button.btn-delete,button.btn-delete2', function(){
        $('#modalDelete').modal('show');
        var id_prestasi=$(this).val();
        $('#hiddenIdDelete').val(id_prestasi);
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Prestasi/fetchData',
          data: {id_prestasi:id_prestasi},
          dataType:'json',
          success: function(data){
            if(data){
                var prestasi = data[0];
                $('#namadelete').html('"'+prestasi.nama_prestasi+'"');
                $('#btnhapus').prop("disabled",false);
              }
            }
        });
      });

      $('#btnhapus').click(function(){
        var id = $('#hiddenIdDelete').val();
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Prestasi/delete',
          data: {id_prestasi:id},
          dataType:'json',
          success: function(data){
          }
        });
          location.reload();
      });



  })





  </script>

</html>
