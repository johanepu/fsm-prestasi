<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_prestasi'); ?>">Data Prestasi</a></li>

    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Data Prestasi
                <a  type="button" class="btn btn-primary" href="<?php echo site_url('Admin_prestasi/addPrestasi_admin'); ?>" style="float: right;"><i class="fa fa-plus"></i>&nbsp; Tambah Prestasi</a>
              </div>
              <div class="card-body">
                <?php if($this->session->flashdata('status_prestasi')){
                  echo $this->session->flashdata('status_prestasi');
                  }
                ?>
                <div class="row mt">
                  <div class="form-group col-lg-2">
                      <select id="periode_select" name="select_waktu" class="form-control select_waktu">
                        <option id="reset_periode" value="0">Pilih Tahun</option>
                        <option value="1">2017/2018</option>
                        <option value="2">2018/2019</option>
                        <option value="3">2019/2020</option>
                        <option value="4">2020/2021</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <select id="semester_select" name="select_waktu" class="form-control select_waktu">
                          <option id="reset_semester" value="0">Pilih Semester</option>
                          <option value="1">Ganjil</option>
                          <option value="2">Genap</option>
                        </select>
                    </div>
                    <div class="btn-group">
                      <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Cetak Data Sebagai
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" id="exportCopy" href="#">Kopi sebagai teks</a>
                          <a class="dropdown-item" id="exportCSV" href="#">CSV</a>
                          <a class="dropdown-item" id="exportExcel" href="#">Excel</a>
                          <a class="dropdown-item" id="exportPDF" href="#">PDF</a>
                          <a class="dropdown-item" id="exportPrint" href="#">Cetak Print</a>
                        </div>
                      </div>
                    </div>
                  <div class="form-group col-lg-6">
                    <input type="text" class="form-control" id="cariPrestasi" placeholder="Cari Nama Kegiatan atau Prestasi Anda" >
                  </div>
                </div>
                <table id="tabel_prestasi" class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama Prestasi</th>
                      <th>Peringkat</th>
                      <th>Jenis</th>
                      <th>Level</th>
                      <th>Tanggal Kegiatan</th>
                      <th>Status</th>
                      <!-- <th>Poin</th> -->
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tabel-prestasi">
                    <?php
                    foreach($prestasi as $p => $pres){
                    ?>
                    <tr id="<?php echo $pres->id_prestasi?>">
                      <td ><?php echo $pres->nim; ?></td>
                      <td ><?php echo $pres->nama_prestasi; ?></td>
                      <td ><?php echo $pres->peringkat_prestasi; ?></td>
                      <td title="Jenis Prestasi" name="jenis_prestasi" id="jenis_prestasi">
                      <?php
                      if ($pres->jenis_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Akademik</span>';
                      }elseif ($pres->jenis_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Non-Akademik</span>';
                      }
                      ?></td>
                      <!-- <td title="Tipe Prestasi" name="tipe_prestasi" id="tipe_prestasi">
                      <?php
                      if ($pres->tipe_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Individu</span>';
                      }elseif ($pres->tipe_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Beregu</span>';
                      }
                      ?></td> -->

                      <td title="Level Prestasi" name="level_prestasi" id="level_prestasi">
                      <?php
                      if ($pres->level_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Lokal</span>';
                      }elseif ($pres->level_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Regional</span>';
                      }elseif ($pres->level_prestasi == "3") {
                          echo '<span class="label label-warning label-mini">Nasional</span>';
                      }elseif ($pres->level_prestasi == "4") {
                          echo '<span class="label label-warning label-mini">Internasional</span>';
                      }
                      ?></td>
                      <td ><?php echo $pres->tgl_prestasi_start; ?></td>
                      <td title="Status Prestasi" name="status_prestasi" id="status_prestasi">
                      <?php
                      if ($pres->validasi == "1") {
                          echo '<span class="badge badge-success">Tervalidasi</span>';
                      }elseif ($pres->validasi == "0") {
                          echo '<span class="badge badge-danger">Belum Valid</span>';
                      }
                      ?></td>
                      <!-- <td title="Reward Poin" name="reward_poin" id="reward_poin">
                        <?php
                        if ($reward_poin[$p] == "0") {
                          echo '<h5><span class="badge badge-danger">'.$reward_poin[$p].'</span></h5>';
                        }else {
                          echo '<h5><span class="badge badge-success">'.$reward_poin[$p].'</span></h5>';
                        }
                        ?>
                      </td> -->
                      <td>
                          <div class="btn-group" >
                            <?php if ($pres->validasi == 0): ?>
                              <button class="btn btn-success btn-validate" name="btn-edit" title="Validasi Prestasi" value="<?=$pres->id_prestasi?>" type="button">
                                  <i class="fa fa-fw s fa-check"></i></button>
                            <?php else: ?>
                              <button class="btn btn-secondary btn-unvalidate" name="btn-edit" title="Hapus Validasi Prestasi" value="<?=$pres->id_prestasi?>" type="button">
                                  <i class="fa fa-fw s fa-times"></i></button>
                            <?php endif; ?>
                              <button class="btn btn-primary btn-edit" name="btn-edit" title="Edit/Lihat Prestasi" value="<?=$pres->id_prestasi?>" type="button">
                                  <i class="fa fa-fw s fa-pencil"></i></button>
                              <button class="btn btn-danger btn-delete" name="btn-delete" title="Hapus Prestasi" value="<?=$pres->id_prestasi?>" type="button">
                                  <i class="fa fa-fw fa-remove"></i></button>
                          </div>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                  <tbody id="hasilCari"></tbody>
                </table>


                <?php echo $this->pagination->create_links(); ?>
              </div>
            </div>
          </div>
        </div>
        <!--/.row-->

        <!-- Modal -->
        <div class="modal fade" id="editPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editPrestasiLabel">Edit Data Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <div class="col-md-12 mb-4">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#edit1" role="tab" aria-controls="home">Data Umum</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#edit2" role="tab" aria-controls="profile">Data Lanjutan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#edit3" role="tab" aria-controls="messages">Waktu/Tempat</a>
                    </li>
                  </ul>

                  <div class="tab-content">
                    <div class="tab-pane active" id="edit1" role="tabpanel">

                      <div class="form-group text-left">
                        <label for="" class="">Nama Prestasi</label>
                        <input type="text" class="form-control" id="nama_prestasi_edit" name="nama_prestasi_edit" placeholder="Nama Prestasi" required>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Peringkat Prestasi</label>
                        <input type="text" class="form-control" id="peringkat_prestasi_edit" name="peringkat_prestasi_edit" placeholder="Peringkat yang diraih" required>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Jenis Prestasi</label>
                        <div class="form-group row" style="margin-left:0px">
                          <!-- <input type="text" class="col-md-3 form-control" id="jenis_prestasi_edit" name="jenis_prestasi_edit" placeholder="Nama Perusahaan" disabled> -->
                          <input hidden id="jenis_prestasi_raw" >
                        <div class="col-md-9 col-form-label">
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" type="radio" id="jenis_prestasi_update1" value="1" name="jenis_prestasi_update">
                            <label class="form-check-label" for="inline-radio1">Akademik</label>
                          </div>
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" type="radio" id="jenis_prestasi_update2" value="2" name="jenis_prestasi_update">
                            <label class="form-check-label" for="inline-radio2">Non-Akademik</label>
                          </div>
                        </div>
                      </div>
                      </div>

                    </div>
                    <div class="tab-pane" id="edit2" role="tabpanel">

                      <div class="form-group text-left">
                        <label for="" class="">Tipe Prestasi</label>
                        <div class="form-group row" style="margin-left:0px">
                          <!-- <input type="text" class="col-md-3 form-control" id="tipe_prestasi_edit" name="tipe_prestasi_edit" placeholder="Tipe Prestasi" disabled> -->
                          <input hidden id="tipe_prestasi_raw" >
                        <div class="col-md-9 col-form-label">
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" type="radio" onclick="javascript:TipeCheck();" id="tipe_prestasi_update_individu" value="1" name="tipe_prestasi_update">
                            <label class="form-check-label" for="inline-radio1">Individu</label>
                          </div>
                          <div class="form-check form-check-inline mr-1">
                            <input class="form-check-input" type="radio" onclick="javascript:TipeCheck();" id="tipe_prestasi_update_regu" value="2" name="tipe_prestasi_update">
                            <label class="form-check-label" for="inline-radio2">Beregu/Kelompok</label>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div class="form-group text-left">
                        <label for="" id="role_prestasi_editlabel" class="">Role Regu</label>
                        <input type="text" class="form-control" style="display:block" id="role_prestasi_edit" name="role_prestasi_edit" placeholder="Role Prestasi">
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Skala Kegiatan</label>
                        <div styclass="col-md-9 col-form-label">
                            <select id="level_prestasi_edit" name="level_prestasi_edit" class="form-control">
                              <option value="0">Pilih Skala Kegiatan</option>
                              <option value="1">Lokal</option>
                              <option value="2">Nasional</option>
                              <option value="3">Regional</option>
                              <option value="4">Internasional</option>
                            </select>
                          </div>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Nama Penyelenggara</label>
                        <input type="text" class="form-control" id="penyelenggara_prestasi_edit" name="penyelenggara_prestasi_edit" placeholder="Nama penyelenggara kegiatan" required>
                      </div>

                    </div>
                    <div class="tab-pane" id="edit3" role="tabpanel">
                      <div class="form-group text-left">
                        <label for="" class="">Tempat Kegiatan</label>
                        <input type="text" class="form-control" id="tempat_prestasi_edit" name="tempat_prestasi_edit" placeholder="Tempat kegiatan" required>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_prestasi_edit" name="deskripsi_prestasi_edit" required></textarea>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Tanggal Kegiatan Dimulai</label>
                        <div class="form-group row">
                          <!-- <input type="text" class="form-control col-md-3" id="tgl_prestasi_start_edit" name="tgl_prestasi_start_edit" placeholder="Kota" disabled> -->
                          <div class="col-md-9">
                            <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                            </div>
                            <input id="date_start_edit" name="date_start_edit" class="form-control"  type="date">
                          </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group text-left">
                      <label for="" class="">Tanggal Kegiatan Selesai</label>
                      <div class="form-group row">
                        <!-- <input type="text" class="form-control col-md-3" id="tgl_prestasi_start_edit" name="tgl_prestasi_start_edit" placeholder="Kota" disabled> -->
                        <div class="col-md-9">
                          <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar-times-o"></i></span>
                          </div>
                          <input id="date_end_edit" name="date_end_edit" class="form-control"  type="date">
                        </div>
                        </div>
                    </div>
                  </div>
                    </div>
                  </div>
                </div>


              <input hidden id="hiddenId" >
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btnSimpanPrestasi" name="btnSimpanPrestasi" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <input hidden id="hiddenIdDelete">
            <p><b>Apakah anda yakin ingin menghapus ?</b></p>
            <p style="text-align:center" id="namadelete"><strong>"Nama Orangnya"</strong></p>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button style="width:100px" class="btn btn-danger" id="btnhapus">Ya</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalReward" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-success" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Validasi Prestasi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <input hidden id="hiddenIdValidasi">
            <p><b>Isikan Reward Point untuk validasi prestasi ini ?</b></p>
            <p style="text-align:center" id="nama_prestasi_reward"><strong>"Nama Orangnya"</strong></p>
            <div style="text-align:center">
              <input style="text-align:center" align="center" type="number" class="form-control-lg col-md-4" id="reward_point" placeholder="0" required>
            </div>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button style="width:100px" class="btn btn-success" id="btn_simpan_reward">Validasi</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.conainer-fluid -->
  </main>
</body>

<script type="text/javascript">
$(document).ready(function(){

  // tabel data prestasi datatable
    tabel_prestasi =  $('#tabel_prestasi').DataTable( {
        "dom": 'lrtipB',
        "sScrollY": "500px",
        "bPaginate": false,
        "info":     false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      } );
      $('#cariPrestasi').keyup(function(){
            tabel_prestasi.search($(this).val()).draw() ;
      });

      $( 'button.dt-button,button.button-html5' ).hide();

      $('#exportCopy').on('click', function() {
        $('.buttons-copy').click()
      });

      $('#exportCSV').on('click', function() {
        $('.buttons-csv').click()
      });

      $('#exportExcel').on('click', function() {
        $('.buttons-excel').click()
      });

      $('#exportPDF').on('click', function() {
        $('.buttons-pdf').click()
      });

      $('#exportPrint').on('click', function() {
        $('.buttons-print').click()
      });

      if($('#periode_select').val(<?php echo $periode?>)&&<?php echo $periode?>!=0){
        $('#reset_periode').html('Reset Tahun');
      }
      if($('#semester_select').val(<?php echo $semester?>)&&<?php echo $semester?>!=0){
        $('#reset_semester').html('Reset Semester');
      }


  $( '.select_waktu' ).change(function() {
    var periode_select = $('#periode_select').val();
    var semester_select = $('#semester_select').val();
    document.location = "<?= base_url();?>Admin_prestasi/tabel/"+periode_select+"/"+semester_select;
  });

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
        location.reload();
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

    $(document).on('click', 'button.btn-validate', function() {
      $('#modalReward').modal('show');
      var id_prestasi = $(this).val();
      $('#hiddenIdValidasi').val(id_prestasi);
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/fetchData',
        data: {id_prestasi:id_prestasi},
        dataType:'json',
        success: function(data){
          if(data){
              var prestasi = data[0];
              $('#nama_prestasi_reward').html('"'+prestasi.nama_prestasi+'"');
              $('#btn_simpan_reward').prop("disabled",false);
            }
          }
      });
    });

    $('#btn_simpan_reward').click(function(){
      var id = $('#hiddenIdValidasi').val();
      var id_prestasi = $(this).val();
      var reward_point = $('#reward_point').val();
      if(reward_point==''){
        alert('Validasi gagal, reward point harus diisi');
        return false;
      }else if (reward_point<0) {
        alert('Validasi gagal, reward point tidak boleh negatif');
        return false;
      }
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/validate',
        data: {
          id_prestasi:id,
          reward_point:reward_point
        },
        dataType:'json',
        success: function(data){
        }
      });
        location.reload();
    });

    $(document).on('click', 'button.btn-unvalidate', function() {
      var id_prestasi = $(this).val();
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/unvalidate',
        data: {id_prestasi:id_prestasi},
        dataType:'json',
        success: function(data){
        }
      });
        location.reload();
    });

    // $('#cariPrestasi').keyup(function(){
    //   var query = $(this).val();
    //     $.ajax({
    //       url:"<?php echo base_url();?>Prestasi/view",
    //       method:"post",
    //       data:{query:query},
    //       success:function(data){
    //         // alert('dasdf');
    //         $('#tabel-prestasi').remove();
    //         $('#hasilCari').html(data);
    //       }
    //     });
    // });



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
