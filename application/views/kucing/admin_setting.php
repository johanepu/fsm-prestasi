
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_setting'); ?>">Pengaturan Akademik</a></li>

    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Pengaturan isian prestasi
              </div>
              <div class="card-body">
                <div class="row">
                  <?php if($this->session->flashdata('reset_status')){
                    echo $this->session->flashdata('reset_status');
                    }
                  ?>
                  <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="tab" href="#list-home" role="tab" aria-controls="list-home" aria-selected="true">Tahun Akademik</a>
                      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="tab" href="#list-profile" role="tab" aria-controls="list-profile">Data Prestasi</a>
                      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="tab" href="#list-messages" role="tab" aria-controls="list-messages">Pesan Admin</a>
                      <div style="margin-top:20px">
                        <button type="submit" id="simpan_pengaturan" class="col-md-12 col-sm-4 btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan Pengaturan</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade active show" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="select2">Set Periode</label>
                          <div class="col-md-9">
                            <select id="select_periode" name="select_periode" class="form-control form-control-lg">
                              <option value="0">Pilih tahun akademik</option>
                              <option value="2017/2018">2017/2018</option>
                              <option value="2018/2019">2018/2019</option>
                              <option value="2019/2020">2019/2020</option>
                              <option value="2020/2021">2020/2021</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="select2">Set Semester</label>
                          <div class="col-md-9">
                            <select id="select_semester" name="select_semester" class="form-control form-control-lg">
                              <option value="0">Pilih semester</option>
                              <option value="Ganjil">Ganjil</option>
                              <option value="Genap">Genap</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div id="accordion" role="tablist">
                          <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                              <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Reset Reward Point
                        </a>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                Klik Tombol Reset Poin untuk menge-nol-kan reward poin seluruh data prestasi
                                <div class="row card-body">
                                  <button type="submit" id="btn_reset_poin_modal" class="btn btn-sm btn-danger"><i class="fa fa-exclamation-triangle"></i> Reset Poin</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                              <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Reset Data Prestasi
                        </a>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                Klik Tombol Reset Prestasi untuk mengehapus semua data prestasi
                                <div class="row card-body">
                                  <button type="submit" id="btn_reset_pres_modal" class="btn btn-sm btn-danger"><i class="fa fa-exclamation-triangle"></i> Reset Prestasi</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                              <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Reset Data Mahasiswa
                        </a>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                Klik Tombol Reset User untuk mengehapus semua data mahasiswa
                                <div class="row card-body">
                                  <button type="submit" id="btn_reset_mhs_modal" class="btn btn-sm btn-danger"><i class="fa fa-exclamation-triangle"></i> Reset User</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="name">Judul Pengumuman</label>
                              <input type="text" class="form-control" id="input_judul" placeholder="Enter your name">
                            </div>
                          </div>
                        </div>
                        <!--/.row-->
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label for="ccnumber">Isi Pengumuman</label>
                              <textarea id="input_isi" name="textarea-input" rows="9" class="form-control" placeholder="Content.."></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xl-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Preview Setting
                <div class="card-actions">
                </div>
              </div>
              <div class="card-body">
                <div class="jumbotron">
                  <h1 class="display-3" id="preview_judul">Preview Judul</h1>
                  <p class="lead" id="preview_pengumuman">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                  <hr class="my-4">
                  <div class="row">
                    <div class="col-md-4 col-sm-4">
                      <div class="card bg-primary">
                        <div class="card-body text-center">
                          <div class="text-muted small text-uppercase font-weight-bold">Periode Akademik</div>
                          <div class="h2 py-3" id="preview_periode">Tahun Akademik</div>
                        </div>
                      </div>
                    </div>
                    <!--/.col-->
                    <div class="col-md-4 col-sm-4">
                      <div class="card bg-primary">
                        <div class="card-body text-center">
                          <div class="text-muted small text-uppercase font-weight-bold">Semester</div>
                          <div class="h2 py-3" id="preview_semester">Semester Sekarang</div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <!-- /.conainer-fluid -->

    <div class="modal fade" id="modal_reset_poin" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reset Poin</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <p><b>Apakah anda yakin ingin mereset reward poin ?</b></p>
            <p style="text-align:center"><strong>Silakan pastikan data admin anda</strong></p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-user"></i></span>
              </div>
              <input type="text" class="form-control" name="username" id="username_poin" placeholder="Username">
            </div>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-lock"></i></span>
              </div>
              <input type="password" name="password" id="password_poin" class="form-control" placeholder="Password">
            </div>
            <p style="text-align:center">Lanjutkan dengan menekan tombol konfirmasi</p>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button style="width:100px" class="btn btn-danger" id="btn_reset_poin_konf">Konfirmasi</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_reset_prestasi" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reset Data Prestasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <p><b>Apakah anda yakin ingin mereset data prestasi ?</b></p>
            <p style="text-align:center"><strong>Silakan pastikan data admin anda</strong></p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-user"></i></span>
              </div>
              <input type="text" class="form-control" name="username" id="username_prestasi" placeholder="Username">
            </div>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-lock"></i></span>
              </div>
              <input type="password" name="password" id="password_prestasi" class="form-control" placeholder="Password">
            </div>
            <p style="text-align:center">Lanjutkan dengan menekan tombol konfirmasi</p>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button style="width:100px" class="btn btn-danger" id="btn_reset_pres_konf">Konfirmasi</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_reset_mhs" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Reset Data Mahasiswa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <p><b>Apakah anda yakin ingin mereset data mahasiswa ?</b></p>
            <p style="text-align:center"><strong>Silakan pastikan data admin anda</strong></p>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-user"></i></span>
              </div>
              <input type="text" class="form-control" name="username" id="username_mhs" placeholder="Username">
            </div>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="icon-lock"></i></span>
              </div>
              <input type="password" name="password" id="password_mhs" class="form-control" placeholder="Password">
            </div>
            <p style="text-align:center">Lanjutkan dengan menekan tombol konfirmasi</p>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button style="width:100px" class="btn btn-danger" id="btn_reset_mhs_konf">Konfirmasi</button>
          </div>
        </div>
      </div>
    </div>


  </main>

</body>
<script type="text/javascript">

  $(document).ready(function(){
    $.ajax({
      type: "POST",
      url: '<?=base_url()?>Admin_setting/fetchSetting',
      dataType:'json',
      success: function(data){
        console.log(data);
        if(data)
        {
          var stg = data[0];
            $('#preview_judul').html(stg.judul_pengumuman);
            $('#preview_pengumuman').html(stg.pesan_admin);
            $('#preview_periode').html(stg.periode);
            $('#preview_semester').html(stg.semester);
            $('#select_periode').val(stg.periode);
            $('#select_semester').val(stg.semester);
            $('#input_judul').val(stg.judul_pengumuman);
            $('#input_isi').val(stg.pesan_admin);
        }
      }
    });

    $('#btn_reset_poin_modal').click(function(){
      $('#modal_reset_poin').modal('show');
    });

    $('#btn_reset_poin_konf').click(function(){
      var username = $('#username_poin').val();
      var password = $('#password_poin').val();

      if(username==''||password==''){
          alert('Anda harus mengisi data admin');
          return false;
        }else {
          $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/resetPoin',
            data: {
              username:username,
              password:password
            },
            dataType:'json',
            success: function(data){
            }
          });
            location.reload();
        }
    });

    $('#btn_reset_pres_modal').click(function(){
      $('#modal_reset_prestasi').modal('show');
    });

    $('#btn_reset_pres_konf').click(function(){
      var username = $('#username_prestasi').val();
      var password = $('#password_prestasi').val();

      if(username==''||password==''){
          alert('Anda harus mengisi data admin');
          return false;
        }else {
          $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/resetPrestasi',
            data: {
              username:username,
              password:password
            },
            dataType:'json',
            success: function(data){
            }
          });
            location.reload();
        }
    });

    $('#btn_reset_mhs_modal').click(function(){
      $('#modal_reset_mhs').modal('show');
    });

    $('#btn_reset_mhs_konf').click(function(){
      var username = $('#username_mhs').val();
      var password = $('#password_mhs').val();

      if(username==''||password==''){
          alert('Anda harus mengisi data admin');
          return false;
        }else {
          $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/resetUser',
            data: {
              username:username,
              password:password
            },
            dataType:'json',
            success: function(data){
            }
          });
            location.reload();
        }
    });

    $('#simpan_pengaturan').click(function(){

      var judul_pengumuman = $('#input_judul').val();
      var pesan_admin = $('#input_isi').val();
      var periode = $('#select_periode').val();
      var semester =  $('#select_semester').val();

      if(judul_pengumuman==''||pesan_admin==''||periode==''||semester==''){
          console.log('gagal edit');
          alert('Simpan Pengaturan Gagal, Cek kembali isian Anda');
          return false;
        }else {
          $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/updateSetting',
            data: {
              judul_pengumuman:judul_pengumuman,
              pesan_admin:pesan_admin,
              periode:periode,
              semester:semester
              },
            success: function(data){
            }
          });
          location.reload();
        }
      });
  })

</script>
