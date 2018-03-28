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

  <title>RewardMe - Registrasi User</title>

  <!-- Icons -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="<?php echo base_url(); ?>assets/node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css" rel="stylesheet" type="text/css">


  <!-- Main styles for this application -->
  <link type="text/css" href="<?php echo base_url(); ?>assets/src/css/style.css" rel="stylesheet">

  <!-- Styles required by this views -->

</head>

<style>
  .icon-refresh { line-height:30px;}
</style>

<body class="app flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mx-4" style="background-color:rgba(255, 255, 255, 0.7);">
          <div class="card-body p-4">
            <h1>Register</h1>
            <p class="text-muted">Buat Akun Baru</p>
            <?php if($this->session->flashdata('info2')){
              echo $this->session->flashdata('info2');
            }
            ?>
            <?php echo form_open("register");?>

            <?php echo form_error('namalengkap'); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-user"></i></span>
              </div>
              <input type="text" class="form-control" name="namalengkap" value="<?php echo set_value('namalengkap'); ?>" placeholder="Nama Lengkap" size="50" />
            </div>

            <?php echo form_error('jurusan'); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-graduation"></i></span>
              </div>
              <select id="jurusan" name="jurusan" class="form-control" required>
                <option value="">Departemen/Jurusan</option>
                <option value="1">Matematika</option>
                <option value="2">Biologi</option>
                <option value="3">Kimia</option>
                <option value="4">Fisika</option>
                <option value="5">Statistika</option>
                <option value="6">Informatika</option>
              </select>
            </div>

            <?php echo form_error('nim'); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-badge"></i></span>
              </div>
              <input type="text" class="form-control" name="nim" value="<?php echo set_value('nim'); ?>" placeholder="Nomor Induk Mahasiswa (NIM)" size="14"/>
            </div>

            <?php echo form_error('email'); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" size="50"/>
            </div>

            <?php echo form_error('password'); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-lock"></i></span>
              </div>
              <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" size="50" />
            </div>

            <?php echo form_error('passwordconf'); ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-lock"></i></span>
              </div>
              <input type="password" class="form-control" name="passwordconf" value="<?php echo set_value('passwordconf'); ?>" placeholder="Ulangi Password" size="50" />
            </div>


              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <a href="javascript:void(0);" class="btn btn-primary refreshCaptcha" ><i class="icon-refresh"></i></a>
                  <span class="input-group-text" id="captImg"><?php echo $captchaImg; ?></span>
                </div>
                <input type="text" class="form-control" name="captcha" value=""  placeholder="Tulis captcha"/>
              </div>


            <div><input type="submit" value="Submit" class="btn btn-block btn-success"></div>
          </div>
          <div class="card-footer p-4">
            <div class="row">
              <td align="left">Sudah punya akun? &nbsp;<a href="<?php echo site_url('User_login'); ?>">Login disini</a></td>
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
      $(document).ready(function(){
        $('.refreshCaptcha').on('click', function(){
            $.get('<?php echo base_url().'register/refresh'; ?>', function(data){
                $('#captImg').html(data);
            });
        });
    });
  </script>

</body>
</html>
