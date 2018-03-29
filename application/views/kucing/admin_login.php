<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

  <title>RewardMe - Login Admin</title>

  <!-- Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css" rel="stylesheet" type="text/css">

  <!-- Main styles for this application -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/src/css/style.css" rel="stylesheet">

  <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-8">
        <?php if($this->session->flashdata('status')){
          echo $this->session->flashdata('status');
        }
        ?>
        <?php
          if (isset($message_display)) {
          echo $message_display;
          }
        ?>
        <div class="card-group">
          <div class="card p-4" style="background-color:rgba(255, 255, 255, 0.7);">
            <div class="card-body">
              <h1>Login Admin</h1>
              <p class="text-muted">Masuk menggunakan akun</p>
              <?php echo form_open('Admin_login/admin_login_process'); ?>
              <?php echo form_error('username'); ?>
              <?php echo form_error('password'); ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-user"></i></span>
                </div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-lock"></i></span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
              </div>
              <div class="row">
                <div class="col-6">
                  <input type="submit" name="submit"  value="Login" class="btn btn-primary px-4"></button>
                </div>
                <div class="col-6 text-right">
                  <!-- <button type="button" class="btn btn-link px-0">Lupa Password?</button> -->
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none">
            <div class="card-body text-center">
              <div>
                <img width="180" src="<?php echo base_url(); ?>assets/src/img/logo_fsm_white.png">
                <h6>Aplikasi Perhitungan Poin Prestasi Mahasiswa</h6>
                <h6>Fakultas Sains dan Matematika</h6>
                <h6>Universitas Diponegoro</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap and necessary plugins -->


  <script src="<?php echo base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/src/js/jquery.backstretch.min.js"></script>
  <script>
      $.backstretch("<?php echo base_url(); ?>assets/src/img/dekanat.jpg", {speed: 500});
  </script>

</body>
</html>
