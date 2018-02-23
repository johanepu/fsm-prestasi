
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('prestasi'); ?>">Data Prestasi</a></li>
      <li class="breadcrumb-item">Tambah Prestasi</li>
    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <strong>Profil</strong>
                    Mahasiswa
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="" role="tab" data-target="#profile" data-toggle="tab" class="nav-link profil active">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a href="" role="tab" data-target="#edit" data-toggle="tab" class="nav-link edit">Ubah Biodata</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <div class="row">
                              <div class="col-md-4 ">
                                <div class="col-md-9 text-center">
                                    <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                                    <h6 class="mt-2">Upload a different photo</h6>
                                    <label class="custom-file">
                                        <input type="file" id="file" class="custom-file-input btn-primary" hidden>
                                        <span class="btn btn-primary">Choose file</span>
                                    </label>
                                </div>
                              </div>
                                <div class="col-md-6">
                                    <h6>Nama</h6>
                                    <p>
                                      <?php echo $this->session->userdata('namalengkap')?>
                                    </p>
                                    <h6>Nomor Induk Mahasiswa</h6>
                                    <p>
                                      <?php echo $this->session->userdata('nim')?>
                                    </p>
                                    <h6>Email</h6>
                                    <p>
                                      <?php echo $this->session->userdata('email')?>
                                    </p>
                                    <h6>Departemen/Jurusan</h6>
                                    <p>
                                      <?php
                                        $jurusan = $this->session->userdata('jurusan');
                                      if ($jurusan == 1) {
                                        echo 'Matematika';
                                      }if ($jurusan == 2) {
                                        echo 'Biologi';
                                      }if ($jurusan == 3) {
                                        echo 'Kimia';
                                      }if ($jurusan == 4) {
                                        echo 'Fisika';
                                      }if ($jurusan == 5) {
                                        echo 'Statistika';
                                      }if ($jurusan == 6) {
                                        echo 'Informatika';
                                      }?>
                                    </p>
                                    <h6>Tanggal Akun Dibuat</h6>
                                    <p>
                                      <?php
                                        $tanggal = $this->session->userdata('date_created');
                                        echo $tanggal;
                                       ?>
                                    </p>
                                </div>
                            </div>
                            <!--/row-->
                        </div>

                        <div class="tab-pane" id="edit">
                            <form role="form">
                                <?php echo form_open("index");?>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Lengkap</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="profil_nama" name="namalengkap" value="<?php echo set_value('namalengkap'); ?>" placeholder="Nama Lengkap" size="50" />
                                    </div>
                                </div>
                                <?php echo form_error('nama_lengkap'); ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="profil_email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" size="50"/>
                                    </div>
                                </div>
                                <?php echo form_error('email'); ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Alamat</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" type="text" id="profil_alamat" value="" placeholder="Tulis Alamat Anda"></textarea>
                                    </div>
                                </div>
                                <?php echo form_error('alamat'); ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tingkatan/Tahun Masuk</label>
                                    <div class="col-lg-9">
                                      <select id="profil_tingkatan" value="" placeholder="Tingkatan misal : '2014'" class="form-control">
                                        <option value="">Tahun Tingkatan</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2017</option>
                                        <option value="2015">2018</option>
                                        <option value="2016">2019</option>
                                        <option value="2015">2020</option>
                                        <option value="2016">2021</option>
                                      </select>
                                    </div>
                                </div>
                                <?php echo form_error('tingkatan'); ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nomor Handphone</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" id="profil_nomor_hp" value=""  placeholder="Format : '08XXXXX..'">
                                    </div>
                                </div>
                                <?php echo form_error('nomor_hp'); ?>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" id="btnSimpanProfil" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                          </div>
                      </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- /.conainer-fluid -->

      </main>

    </body>

    <script type="text/javascript">
    $(document).ready(function(){


      $(document).on('click', 'a.edit', function() {
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>User_profile/fetchData',
          dataType:'json',
          success: function(data){
            console.log(data);
            if(data)
            {
              var mhs = data[0];

                $('#profil_nama').val(mhs.namalengkap);
                $('#profil_email').val(mhs.email);
                $('#profil_alamat').val(mhs.alamat);
                $('#profil_tingkatan').val(mhs.tingkatan);
                $('#profil_nomor_hp').val(mhs.nomor_hp);
            }
          }
        });
      });

      $('#btnSimpanProfil').click(function(){
        var nama_lengkap = $('#profil_nama').val();
        var email = $('#profil_email').val();
        var alamat = $('#profil_alamat').val();
        var tingkatan =  $('#profil_tingkatan').val();
        var nomor_hp =  $('#profil_nomor_hp').val();


        if(nama_lengkap==''||email==''||alamat==''||tingkatan==''||nomor_hp==''){
            alert('Data harus diisi lengkap, Cek kembali isian Anda');
            return false;
          }else {
            $.ajax({
              type: "POST",
              url: '<?=base_url()?>User_profile/updateProfil',
              data: {namalengkap:nama_lengkap,
                    email:email,
                    alamat:alamat,
                    tingkatan:tingkatan,
                    nomor_hp:nomor_hp},
              success: function(data){
              }
            });
            location.reload();
          }
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

        $('#cariPrestasi').keyup(function(){
          var query = $(this).val();
            $.ajax({
              url:"<?php echo base_url();?>Prestasi/view",
              method:"post",
              data:{query:query},
              success:function(data){
                // alert('dasdf');
                $('#tabel-prestasi').remove();
                $('#hasilCari').html(data);
              }
            });
        });



      })
      function TipeCheck() {
          if (document.getElementById('tipe_prestasi_update_regu').checked) {
              document.getElementById('role_prestasi_edit').style.display = 'block';
              document.getElementById('role_prestasi_editlabel').style.display = 'block';
          } else {
              document.getElementById('role_prestasi_edit').style.display = 'none';
              document.getElementById('role_prestasi_editlabel').style.display = 'none';
          }
        }

    </script>
