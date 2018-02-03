<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
  <meta name="author" content="Lukasz Holeczek">
  <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
  <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

  <title>CoreUI Bootstrap 4 Admin Template</title>

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
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">Masuk menggunakan akun</p>
              <?php
                if (isset($logout_message)) {
                echo "<div class='message'>";
                echo $logout_message;
                echo "</div>";
                }
              ?>
              <?php
                if (isset($message_display)) {
                echo "<div class='message'>";
                echo $message_display;
                echo "</div>";
                }
              ?>
              <?php echo form_open('User_login/user_login_process'); ?>
              <?php
                echo "<div class='error_msg'>";
                if (isset($error_message)) {
                echo $error_message;
                }
                echo validation_errors();
                echo "</div>";
              ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="icon-user"></i></span>
                </div>
                <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM">
              </div>
              <div class="input-group mb-4">
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
                  <button type="button" class="btn btn-link px-0">Lupa Password?</button>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <img width="180" src="<?php echo base_url(); ?>assets/src/img/logo_fsm_white.png">
                <h6>Aplikasi Perhitungan Poin Prestasi Mahasiswa
Fakultas Sains dan Matematika
Universitas Diponegoro</h6>
                <p>Belum punya akun?</p>
                <a class="btn btn-outline-register" href="<?php echo site_url('register'); ?>"  >Buat Akun</a>
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
