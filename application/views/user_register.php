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

  <title>RewardMe - Registrasi User</title>

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
      <div class="col-md-6">
        <div class="card mx-4">
          <div class="card-body p-4">
            <h1>Register</h1>
            <p class="text-muted">Buat Akun Baru</p>
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
              <!-- <select id="jurusan" name="jurusan" class="form-control">
                <option <?php echo form_dropdown('jurusan', $jurusan, set_value('jurusan'));?>
              </select> -->
              <select id="jurusan" name="jurusan" class="form-control">
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

            <!-- <?php echo form_error('agree'); ?>
            <div class="input-group mb-3">
              <div class="form-check checkbox">
                <input class="form-check-input" type="checkbox" name="agree" value="<?php echo set_value('agree'); ?>">

                 <label class="form-check-label" for="check1">
                   Saya menyetujui segala <a href="">ketentuan terkait keaslian</a>  pengisian data
                 </label>
              </div>
            </div> -->



            <div><input type="submit" value="Submit" class="btn btn-block btn-success"></div>
          </div>
          <div class="card-footer p-4">
            <div class="row">
              <td align="left">Sudah Punya akun? <a href="<?php echo site_url('User_login'); ?>">Login disini</a></td>
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
