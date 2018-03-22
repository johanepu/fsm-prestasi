
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
                      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="tab" href="#list-home" role="tab" aria-controls="list-home" aria-selected="true">Set Poin Reward</a>
                      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="tab" href="#list-profile" role="tab" aria-controls="list-profile">Data Prestasi</a>
                      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="tab" href="#list-messages" role="tab" aria-controls="list-messages">Pesan Admin</a>
                      <div style="margin-top:20px">
                        <h6> *Untuk menerapkan ubahan yang telah dibuat, klik Simpan Pengaturan</h6>
                      </div>
                      <div style="margin-top:5px">
                        <button type="submit" id="simpan_pengaturan" class="col-md-12 col-sm-4 btn btn-sm btn-primary">
                          <i class="fa fa-dot-circle-o"></i> Simpan Pengaturan</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade active show" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="row mt">
                          <div class="form-group col-lg-3">
                            <button class="btn btn-primary btn-tambah" id="btn_tambah_set" name="btn-tambah" title="Tambah Set" type="button">
                                <i class="fa fa-fw fa-plus"></i>Tambah Set</button>
                          </div>
                          <div class="form-group col-lg-9">
                            <input type="text" class="form-control" id="cariPrestasi" placeholder="Cari Set Reward" >
                          </div>
                        </div>
                        <div class="row mt">
                          <?php if($this->session->flashdata('alrt1')){
                            echo $this->session->flashdata('alrt1');
                            }
                          ?>
                        </div>
                        <table id="tabel_set_rewarding" class="table table-responsive-sm table-striped">
                          <thead>
                            <tr>
                              <th>Level</th>
                              <th>Peringkat</th>
                              <th>Poin</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody id="tabel_prestasi">
                            <?php
                            foreach($reward_set as $r){
                            ?>
                            <tr id="<?php echo $r->id_setting?>">
                              <td >
                                <?php
                                if ($r->level == "1") {
                                    echo '<span class="label label-success label-mini">Lokal</span>';
                                }elseif ($r->level == "2") {
                                    echo '<span class="label label-warning label-mini">Regional</span>';
                                }elseif ($r->level == "3") {
                                    echo '<span class="label label-warning label-mini">Nasional</span>';
                                }elseif ($r->level == "4") {
                                    echo '<span class="label label-warning label-mini">Internasional</span>';
                                }
                                ?>
                              </td>
                              <td ><?php echo $r->peringkat; ?></td>
                              <td ><?php echo $r->poin; ?></td>
                              <td>
                                  <div class="btn-group" >
                                      <button class="btn btn-primary btn-edit" name="btn-edit" title="Edit Set" value="<?=$r->id_setting?>" type="button">
                                          <i class="fa fa-fw s fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-delete" name="btn-delete" title="Hapus Set" value="<?=$r->id_setting?>" type="button">
                                          <i class="fa fa-fw fa-remove"></i></button>
                                  </div>
                              </td>
                            </tr>
                            <?php }?>
                          </tbody>
                        </table>
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
        <div class="row" id="preview_setting" style="display:none;">
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

    <div class="modal fade" id="tambah_set_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-primary">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambah_set_label">Tambah Setting Rewarding</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12 mb-4">
              <div class="form-group text-left">
                <label for="" class="">Peringkat Prestasi</label>
                <input type="text" class="form-control" id="peringkat_prestasi_reward" name="peringkat_prestasi_reward" placeholder="Peringkat yang didapat misal : Juara 1.." required>
              </div>
              <div class="row">
              <div class="form-group col-8 text-left">
                <label for="" class="">Level Prestasi</label>
                <div styclass="col-md-9 col-form-label">
                    <select id="level_prestasi_reward" name="level_prestasi_reward" class="form-control">
                      <option value="0">Pilih Skala Kegiatan</option>
                      <option value="1">Lokal</option>
                      <option value="2">Regional</option>
                      <option value="3">Nasional</option>
                      <option value="4">Internasional</option>
                    </select>
                  </div>
              </div>
              <div class="form-group col-4 text-left">
                <label for="" class="">Reward Poin</label>
                <input type="number" class="form-control col-12" id="poin_reward" name="poin_reward" placeholder="Poin Angka" required>
              </div>
            </div>
            </div>
          </div>
          <input hidden id="hiddenId" >
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="btn_simpan_reward" name="btn_simpan_reward" class="btn btn-primary">Simpan Setting</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="edit_set_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-primary">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="edit_set_label">Ubah Setting Rewarding</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="col-md-12 mb-4">
              <div class="form-group text-left">
                <label for="" class="">Peringkat Prestasi</label>
                <input type="text" class="form-control" id="peringkat_edit_reward" name="peringkat_edit_reward" placeholder="Peringkat yang didapat misal : Juara 1.." required>
              </div>
              <div class="row">
              <div class="form-group col-8 text-left">
                <label for="" class="">Level Prestasi</label>
                <div styclass="col-md-9 col-form-label">
                    <select id="level_edit_reward" name="level_edit_reward" class="form-control">
                      <option value="0">Pilih Skala Kegiatan</option>
                      <option value="1">Lokal</option>
                      <option value="2">Regional</option>
                      <option value="3">Nasional</option>
                      <option value="4">Internasional</option>
                    </select>
                  </div>
              </div>
              <div class="form-group col-4 text-left">
                <label for="" class="">Reward Poin</label>
                <input type="number" class="form-control col-12" id="poin_edit_reward" name="poin_edit_reward" placeholder="Poin Angka" required>
              </div>
            </div>
            </div>
          </div>
          <input hidden id="hidden_id_setting_edit" >
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="btn_update_reward" name="btn_update_reward" class="btn btn-primary">Simpan Setting</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="delete_set_modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Setting</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <input hidden id="hidden_id_setting">
            <p><b>Apakah anda yakin ingin menghapus set untuk</b></p>
            <p style="text-align:center" id="level_delete"><strong>"Level"</strong></p>
            <p style="text-align:center" id="peringkat_delete"><strong>"Peringkat"</strong></p>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button style="width:100px" class="btn btn-danger" id="btn_hapus_set">Ya</button>
          </div>
        </div>
      </div>
    </div>


  </main>

</body>
<script type="text/javascript">

  $(document).ready(function(){

    // tabel data prestasi datatable
      tabel_set_rewarding =  $('#tabel_set_rewarding').DataTable( {
          "dom": 'lrtip',
          "sScrollY": "300px",
          "bPaginate": false,
          "info":     false
        } )
        $('#cariSet').keyup(function(){
              tabel_set_rewarding.search($(this).val()).draw() ;
        })

      $('#list-messages-list').click(function(){
        document.getElementById("preview_setting").style.display = "block";
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
                $('#input_judul').val(stg.judul_pengumuman);
                $('#input_isi').val(stg.pesan_admin);
            }
          }
        });
      });

    $('#btn_reset_poin_modal').click(function(){
      $('#modal_reset_poin').modal('show');
    });

    $('#btn_tambah_set').click(function(){
      $('#tambah_set_modal').modal('show');
    });

    $(document).on('click', 'button.btn-edit,button.btn-edit2', function() {
      var id_setting = $(this).val();
      $('#edit_set_modal').modal('show');
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Admin_setting/fetchReward',
        data: {id_setting:id_setting},
        dataType:'json',
        success: function(data){
          console.log(data);
          if(data)
          {
            var setting = data[0];
            var level_teks ='';
            if (setting.level == 1) {
              level_teks = 'Lokal';
            } else if(setting.level == 2) {
              level_teks = 'Regional';
            } else if(setting.level == 3) {
              level_teks = 'Nasional';
            } else if(setting.level == 4) {
              level_teks = 'Internasional';
            }

            $('#level_edit_reward option[value="'+setting.level+'"]').prop('selected', true);
            $('#peringkat_edit_reward').val(setting.peringkat);
            $('#poin_edit_reward').val(setting.poin);
            $('#hidden_id_setting_edit').val(setting.id_setting);
          }
        }
      });
    });

    $('#btn_update_reward').click(function(){

      var peringkat = $('#peringkat_edit_reward').val();
      var level = $('#level_edit_reward').val();
      var poin =  $('#poin_edit_reward').val();
      var id_setting =$('#hidden_id_setting_edit').val();


      if(peringkat==''||level==0||poin==''||poin<=0){
          console.log('gagal edit');
          alert('Ubah Set gagal, Cek kembali isian Anda');
          return false;
        }
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/updateSetReward',
            data: {
                  peringkat:peringkat,
                  level:level,
                  poin:poin,
                  id_setting
                },
            success: function(data){
            }
          });
          // location.reload();
      });

    $('#btn_simpan_reward').click(function(){

      var peringkat = $('#peringkat_prestasi_reward').val();
      var level = $('#level_prestasi_reward').val();
      var poin =  $('#poin_reward').val();

      if(peringkat==''||level==0||poin==''||poin<=0){
          console.log('gagal edit');
          alert('Tambah Set gagal, Cek kembali isian Anda');
          return false;
        }
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/simpanSetReward',
            data: {
                  peringkat:peringkat,
                  level:level,
                  poin:poin
                },
            success: function(data){
            }
          });
          location.reload();
      });

      $(document).on('click', 'button.btn-delete,button.btn-delete2', function(){
        $('#delete_set_modal').modal('show');
        var id_setting = $(this).val();
        $('#hidden_id_setting').val(id_setting);
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Admin_setting/fetchReward',
          data: {id_setting:id_setting},
          dataType:'json',
          success: function(data){
            if(data){
                var setting = data[0];
                var level_teks ='';
                if (setting.level == 1) {
                  level_teks = 'Lokal';
                } else if(setting.level == 2) {
                  level_teks = 'Regional';
                } else if(setting.level == 3) {
                  level_teks = 'Nasional';
                } else if(setting.level == 4) {
                  level_teks = 'Internasional';
                }
                $('#level_delete').html('"'+level_teks+'"');
                $('#peringkat_delete').html('"'+setting.peringkat+'"');
                $('#btnhapus').prop("disabled",false);
              }
            }
        });
      });

      $('#btn_hapus_set').click(function(){
        var id = $('#hidden_id_setting').val();
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Admin_setting/deleteSet',
          data: {id_setting:id},
          dataType:'json',
          success: function(data){
          }
        });
          location.reload();
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

      if(judul_pengumuman==''||pesan_admin==''){
          console.log('gagal edit');
          alert('Simpan Pengaturan Gagal, Cek kembali isian Anda');
          return false;
        }else {
          $.ajax({
            type: "POST",
            url: '<?=base_url()?>Admin_setting/updateSetting',
            data: {
              judul_pengumuman:judul_pengumuman,
              pesan_admin:pesan_admin
              },
            success: function(data){
            }
          });
          location.reload();
        }
      });
  })

</script>
