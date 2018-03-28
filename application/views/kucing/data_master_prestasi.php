<style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
</style>
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
                <?php if($this->session->flashdata('v_status')){
                  echo $this->session->flashdata('v_status');
                  }
                ?>
                <div class="row mt">
                  <div class="form-group col-lg-2">
                      <select id="periode_select" name="select_waktu" class="form-control select_waktu">
                        <option id="reset_periode" value="0">Pilih Tahun</option>
                        <option value="1">2017</option>
                        <option value="2">2018</option>
                        <option value="3">2019</option>
                        <option value="4">2020</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <select id="semester_select" name="select_waktu" class="form-control select_waktu">
                          <option id="reset_semester" value="0">Pilih Semester</option>
                          <option value="1">Gasal</option>
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
                <table id="tabel_prestasi" class="table table-responsive-sm table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>NIM Pengisi</th>
                      <th>Nama Prestasi</th>
                      <th>Peringkat</th>
                      <th>Jml</th>
                      <!-- <th>Jenis</th> -->
                      <th>Level</th>
                      <th>Tgl Kegiatan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($prestasi as $p => $pres){
                    ?>
                    <tr id="<?php echo $pres->id_prestasi?>">
                      <td ><?php echo $pres->nim; ?></td>
                      <td ><?php echo $pres->nama_prestasi; ?></td>
                      <td ><?php echo $pres->peringkat_prestasi; ?></td>
                      <td ><?php echo $pres->jml_anggota; ?></td>
                      <!-- <td title="Jenis Prestasi" name="jenis_prestasi" id="jenis_prestasi">
                      <?php
                      if ($pres->jenis_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Akademik</span>';
                      }elseif ($pres->jenis_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Non-Akademik</span>';
                      }
                      ?></td> -->
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
                      <td ><?php
                      $date=date_create($pres->tgl_prestasi_start);
                      echo date_format($date,"d-M-Y");
                      ?></td>
                      <td title="Status Prestasi" name="status_prestasi" id="status_prestasi">
                      <?php
                      if ($pres->validasi == "1") {
                          echo '<span class="badge badge-success">Poin Valid : '.$pres->reward_poin.'</span>';
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
                              <button class="btn btn-secondary btn-unvalidate" name="btn-edit" title="Reset Poin/Unvalidasi" value="<?=$pres->id_prestasi?>" type="button">
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
                </table>

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
                        <label for="" class="">Skala Kegiatan</label>
                        <div styclass="col-md-9 col-form-label">
                          <select id="level_prestasi_edit" name="level_prestasi_edit" class="form-control">
                            <option value="">Pilih Level Prestasi</option>
                            <?php
                            foreach ($setting_reward as $sr => $value) {
                              echo "<option value='".$value->level."'>".$value->nama_level."</option>";
                            }
                            ?>
                          </select>
                          </div>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Peringkat Prestasi</label>
                          <select  id="peringkat_prestasi_edit" name="peringkat_prestasi_edit" class="form-control">
                            <option value="">Pilih level prestasi terlebih dulu</option>
                          </select>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Jenis Prestasi</label>
                        <div class="form-group row" style="margin-left:0px">
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
                        <label class="" id="referral_editlabel" style="display:none" for="text-input">NIM Anggota
                          <a href="#" data-toggle="referral_tooltip" title="Pisahkan NIM dengan koma ',' untuk masukan lebih dari satu, tidak termasuk NIM sendiri"><h7>info</h7></a>
                        </label>
                        <input type="text" id="referral_prestasi_edit" name="referral_prestasi"  class="form-control" value=""
                        placeholder="Pisahkan NIM dengan koma ',' untuk masukan lebih dari satu (Misal : 2402XXXXXXXX, 2401XXXXXXXXX)" onfocusout="hitungAnggota()">
                      </div>
                      <div class="form-group text-left">
                        <label class="" id="jml_anggota_editlabel" style="display:none" for="text-input">Jumlah Anggota
                          <a href="#" data-toggle="jml_tooltip" title="Anggota dihitung dari NIM anggota VALID ditambah user "><h7>info</h7></a>
                        <input type="number" id="jml_anggota_edit" name="jml_anggota_edit"  class="form-control" value=""
                        placeholder="Jumlah mahasiswa yang terdaftar prestasi">
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
                        <label for="" class="">Tanggal Kegiatan</label>
                        <div class="form-group row">
                          <div class="col-md-6">
                            <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                            </div>
                              <input id="date_start_edit" name="date_start_edit" class="form-control" value="<?php echo set_value('date_start'); ?>" type="date" placeholder="Tanggal Mulai" required>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-calendar-times-o"></i></span>
                            </div>
                              <input id="date_end_edit" name="date_end_edit" class="form-control" value="<?php echo set_value('date_end'); ?>" type="date" placeholder="Tanggal Selesai">
                            </div>
                          </div>
                        </div>
                        <div class="form-group text-left">
                          <label for="" class="">Semester</label>
                          <select id="smt_prestasi_edit" name="smt_prestasi_edit" class="form-control" value="<?php echo set_value('smt_prestasi'); ?>" required>
                            <option value="">Pilih Semester</option>
                            <option value="1">Gasal</option>
                            <option value="2">Genap</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group text-left">
                        <label for="" class="">Informasi Tambahan</label>
                        <textarea class="form-control" id="deskripsi_prestasi_edit" name="deskripsi_prestasi_edit" required></textarea>
                      </div>
                    </div>

                  </div>
                </div>


              <input hidden id="hiddenId" >
              <input hidden id="hidden_nim" >
              <div class="modal-footer">
                <div class="row mt" style="margin-right:10px">
                  <h6> *Memperbarui data akan menghilangkan status validasi, prestasi perlu di validasi ulang </h6>
                </div>
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
            <p style="text-align:center" id="nama_delete"><strong>"Nama Orangnya"</strong></p>
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
            <p><b>Reward Point untuk validasi prestasi ini ?</b></p>
            <p style="text-align:center" id="nama_prestasi_reward"><strong>"Nama Prestasi"</strong></p>
            <p style="text-align:center" id="poin_prestasi_reward"><strong>"Poin Prestasi"</strong></p>
            <div class="row" style="margin-bottom : -20px">
            <div class="form-group col-md-9"><p><b>NIM</b></p></div>
            <div class="form-group col-md-3"><p><b>Poin</b></p></div>
            </div>
            <span id="info_anggota"></span>
          </div>
          <div class="modal-footer">
                <button style="width:100px" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button style="width:100px" class="btn btn-success" id="btn_simpan_reward">Validasi</button>
                <button style="width:100px" class="btn btn-danger" id="btn_unreward">Un-Validasi</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.conainer-fluid -->
  </main>
</body>

<script type="text/javascript">
$(document).ready(function(){

    $('[data-toggle="referral_tooltip"]').tooltip();
    $('[data-toggle="jml_tooltip"]').tooltip();

    $('select[name="level_prestasi_edit"]').on('change', function() {
        var level = $(this).val();
        if(level) {
            $.ajax({
                url: '<?= base_url();?>Prestasi/getPeringkat/'+level,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="peringkat_prestasi_edit"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="peringkat_prestasi_edit"]').append('<option value="'+ value.peringkat +'">'+ value.peringkat +'</option>');
                    });
                }
            });
        }else{
            $('select[name="peringkat_prestasi_edit"]').empty();
        }
    });

    $( function() {
      var available_nim = <?= json_encode($available_nim) ?>;
      function split( val ) {
        return val.split( /,\s*/ );
      }
      function extractLast( term ) {
        return split( term ).pop();
      }

      $( "#referral_prestasi_edit" )
        // don't navigate away from the field on tab when selecting an item
        .on( "keydown", function( event ) {
          if ( event.keyCode === $.ui.keyCode.TAB &&
              $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
          }
        })
        .autocomplete({
          minLength: 0,
          source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            response( $.ui.autocomplete.filter(
              available_nim, extractLast( request.term ) ) );
          },
          focus: function() {
            // prevent value inserted on focus
            return false;
          },
          select: function( event, ui ) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( ", " );
            return false;
          }
        });
    } );
  // tabel data prestasi datatable
    tabel_prestasi =  $('#tabel_prestasi').DataTable( {
        "dom": 'lrtipB',
        "sScrollY": "550px",
        responsive: true,
        "bPaginate": true,
        "info":     true,
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
      url: '<?=base_url()?>Admin_prestasi/fetchPrestasi',
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
              document.getElementById('jml_anggota_edit').style.display = 'none';
              document.getElementById('jml_anggota_editlabel').style.display = 'none';
              document.getElementById('referral_prestasi_edit').style.display = 'none';
              document.getElementById('referral_editlabel').style.display = 'none';
              document.getElementById("tipe_prestasi_update_individu").checked = true;
            } else {
              tipePrestasi = 'Kelompok';
              document.getElementById('jml_anggota_edit').style.display = 'block';
              document.getElementById('jml_anggota_editlabel').style.display = 'block';
              document.getElementById('referral_prestasi_edit').style.display = 'block';
              document.getElementById('referral_editlabel').style.display = 'block';
              document.getElementById("tipe_prestasi_update_regu").checked = true;
              $('#referral_prestasi_edit').val(prestasi.referral_nim);
            }

            $('#nama_prestasi_edit').val(prestasi.nama_prestasi);
            $('#tipe_prestasi_edit').val(tipePrestasi);
            $('#jml_anggota_edit').val(prestasi.jml_anggota);
            $('#jenis_prestasi_edit').val(jenisPrestasi);
            $('#level_prestasi_edit option[value="'+prestasi.level_prestasi+'"]').prop('selected', true);
            var level = $('#level_prestasi_edit').val();
            var peringkat = prestasi.peringkat_prestasi;
            if(level) {
                $.ajax({
                    url: '<?= base_url();?>Prestasi/getPeringkat/'+level,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('#peringkat_prestasi_edit').empty();
                        $.each(data, function(key, value) {
                          if (peringkat == value.peringkat) {
                            $('#peringkat_prestasi_edit').append('<option selected="selected" value="'+ value.peringkat +'">'+ value.peringkat +'</option>');
                          }else {
                            $('#peringkat_prestasi_edit').append('<option value="'+ value.peringkat +'">'+ value.peringkat +'</option>');
                          }
                        });
                    }
                });
            }else{
                $('#peringkat_prestasi_edit').empty();
            }
            if (prestasi.semester == "Gasal") {
              var smt_prestasi = 1;
            } else {
              var smt_prestasi = 2;
            }
            $('#smt_prestasi_edit option[value="'+smt_prestasi+'"]').prop('selected', true);
            $('#penyelenggara_prestasi_edit').val(prestasi.penyelenggara_prestasi);
            $('#tempat_prestasi_edit').val(prestasi.tempat_prestasi);
            $('#deskripsi_prestasi_edit').val(prestasi.deskripsi_prestasi);
            $('#date_start_edit').val(prestasi.tgl_prestasi_start);
            $('#date_end_edit').val(prestasi.tgl_prestasi_end);
            $('#hiddenId').val(prestasi.id_prestasi);
            $('#hidden_nim').val(prestasi.nim);
        }
      }
    });
  });

  $('#btnSimpanPrestasi').click(function(){

    var id_prestasi = $('#hiddenId').val();
    var nama_prestasi = $('#nama_prestasi_edit').val();
    var peringkat_prestasi = $('#peringkat_prestasi_edit').val();
    var deskripsi_prestasi =  $('#deskripsi_prestasi_edit').val();
    var jml_anggota = $('#jml_anggota_edit').val();
    var referral_nim =  $('#referral_prestasi_edit').val();
    var radiotipe = document.getElementsByName('tipe_prestasi_update');
    for (var i = 0, length = radiotipe.length; i < length; i++)
    {
     if (radiotipe[i].checked)
     {
      var tipe_prestasi = radiotipe[i].value;
      break;
      }
    }
    if (tipe_prestasi == 1) {
      jml_anggota = 1;
      referral_nim =  '';
    } else {
      jml_anggota = $('#jml_anggota_edit').val();
      referral_nim =  $('#referral_prestasi_edit').val();
    }
    if (tipe_prestasi == 2 && jml_anggota =='1') {
      tipe_prestasi = 1;
    }
    var radiojenis = document.getElementsByName('jenis_prestasi_update');
    for (var i = 0, length = radiojenis.length; i < length; i++)
    {
     if (radiojenis[i].checked)
     {
      var jenis_prestasi = radiojenis[i].value;
      break;
      }
    }
    var tgl_prestasi_start =  $('#date_start_edit').val();
    var tgl_prestasi_end =  $('#date_end_edit').val();
    var penyelenggara_prestasi =  $('#penyelenggara_prestasi_edit').val();
    var tempat_prestasi =  $('#tempat_prestasi_edit').val();
    var level_prestasi =  $('#level_prestasi_edit').val();
    var smt_prestasi =  $('#smt_prestasi_edit').val();

    if(nama_prestasi==''||peringkat_prestasi==''||deskripsi_prestasi==''
    ||penyelenggara_prestasi==''||tempat_prestasi==''||level_prestasi==0||smt_prestasi=='')
    {
        console.log('gagal edit');
        alert('Edit Data Gagal, Cek kembali isian Anda');
        return false;
      }else {
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Prestasi/updatePrestasi',
          data: {nama_prestasi:nama_prestasi,
                peringkat_prestasi:peringkat_prestasi,
                tipe_prestasi:tipe_prestasi,
                referral_nim:referral_nim,
                jml_anggota:jml_anggota,
                jenis_prestasi:jenis_prestasi,
                deskripsi_prestasi:deskripsi_prestasi,
                penyelenggara_prestasi:penyelenggara_prestasi,
                tempat_prestasi:tempat_prestasi,
                level_prestasi:level_prestasi,
                tgl_prestasi_start:tgl_prestasi_start,
                tgl_prestasi_end:tgl_prestasi_end,
                smt_prestasi:smt_prestasi,
                id_prestasi:id_prestasi },
          success: function(data){
          }
        });
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Prestasi/deleteRefPrestasi',
          data: {
            id_prestasi:id_prestasi
          },
          success: function(data){
            var head_nim = $('#hidden_nim').val();
            var array = referral_nim.split(",");
            var sorted_arr = array.slice().sort();
            for(i=0;i<sorted_arr.length;i++)
            {
                sorted_arr[i] = sorted_arr[i].replace(/^\s\s*/, '').replace(/\s\s*$/, '');
            }
            var results = [];
              for (var i = 0; i < sorted_arr.length; i++) {
                  if (sorted_arr[i + 1] != sorted_arr[i] && sorted_arr[i].length == 14) {
                      results.push(sorted_arr[i]);
                  }
              }
            results.push(head_nim);
            console.log(sorted_arr);
            console.log(results);
            for (i=0;i<results.length;i++){
                var nim = results[i];
                $.ajax({
                  type: "POST",
                  url: '<?=base_url()?>Prestasi/updateRefPrestasi2',
                  data: {
                    nim:nim,
                    id_prestasi:id_prestasi
                  },
                  success: function(data){
                    location.reload();
                  }
                });
            }
          }
        });
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
              $('#nama_delete').html('"'+prestasi.nama_prestasi+'"');
              $('#btnhapus').prop("disabled",false);
            }
          }
      });
    });

    $('#btnhapus').click(function(){
      var id = $('#hiddenIdDelete').val();
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Admin_prestasi/delete',
        data: {id_prestasi:id},
        dataType:'json',
        success: function(data){
        }
      });
        location.reload();
    });

    $(document).on('click', 'button.btn-validate', function() {
      var id_prestasi = $(this).val();
      $('#modalReward').modal('show');
      $('#btn_unreward').toggle(false);
      $('#btn_simpan_reward').toggle(true);
      $('#hiddenIdValidasi').val(id_prestasi);
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/fetchData',
        data: {id_prestasi:id_prestasi},
        dataType:'json',
        success: function(data){
          if(data){
              var prestasi = data[0];
              var poin_mhs = prestasi.reward_poin / prestasi.jml_anggota;
              $('#nama_prestasi_reward').html('"'+prestasi.nama_prestasi+'"');
              $('#poin_prestasi_reward').html('Poin Prestasi : '+prestasi.reward_poin+'');
              $.each(data, function (i) {
                if (i == 0) {
                  $('#info_anggota').html(
                    '<div class="row">'
                    +'<div class="form-group col-md-9"><input style="margin-top : 10px" type="text" class="form-control anggota_input" id="anggota_team'+i
                    +'" name="anggota_team" placeholder="Anggota" readonly></div>'
                    +'<div class="form-group col-md-3"><input style="margin-top : 10px" type="text" class="form-control poin_input" id="anggota_poin'+i
                    +'" name="anggota_poin" placeholder="Poin" readonly></div>'
                    +'</div>'
                  )
                  $('#anggota_team'+i).val(data[i].nim);
                  $('#anggota_poin'+i).val(poin_mhs);
                } else if (i >= 1) {
                  $('#info_anggota').append(
                    '<div class="row">'
                    +'<div class="form-group col-md-9"><input style="margin-top : 10px" type="text" class="form-control anggota_input" id="anggota_team'+i
                    +'" name="anggota_team" placeholder="Anggota" readonly></div>'
                    +'<div class="form-group col-md-3"><input style="margin-top : 10px" type="text" class="form-control poin_input" id="anggota_poin'+i
                    +'" name="anggota_poin" placeholder="Poin" readonly></div>'
                    +'</div>'
                  )
                  $('#anggota_team'+i).val(data[i].nim);
                  $('#anggota_poin'+i).val(poin_mhs);
                }
              });
              $('#btn_simpan_reward').prop("disabled",false);
            }
          }
      });
    });

    $('#btn_simpan_reward').click(function(){
      var id = $('#hiddenIdValidasi').val();
      var id_prestasi = $(this).val();
      var poin_ele = document.getElementsByClassName('poin_input');
      var nim_ele = document.getElementsByClassName('anggota_input');
      for (var i = 0; i < poin_ele.length; ++i) {
          var po_item = poin_ele[i];
          var n_item = nim_ele[i];
          var poin = $(po_item).val();
          var nim = $(n_item).val();
          if(poin==''){
            alert('Validasi gagal, reward point harus diisi');
            return false;
          }else if (poin<0) {
            alert('Validasi gagal, reward point tidak boleh negatif');
            return false;
          } else {
            $.ajax({
              type: "POST",
              url: '<?=base_url()?>Admin_prestasi/validate',
              data: {
                id_prestasi:id,
                nim:nim,
                poin:poin
              },
              dataType:'json',
              success: function(data){
              }
            });
          }
        location.reload();
      }
      location.reload();
    });

    $(document).on('click', 'button.btn-unvalidate', function() {
      var id_prestasi = $(this).val();
      $('#modalReward').modal('show');
      $('#btn_unreward').toggle(true);
      $('#btn_simpan_reward').toggle(false);
      $('#hiddenIdValidasi').val(id_prestasi);
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/fetchData',
        data: {id_prestasi:id_prestasi},
        dataType:'json',
        success: function(data){
          if(data){
              var prestasi = data[0];
              var poin_mhs = prestasi.reward_poin / prestasi.jml_anggota;
              $('#nama_prestasi_reward').html('"'+prestasi.nama_prestasi+'"');
              $('#poin_prestasi_reward').html('Poin Prestasi : '+prestasi.reward_poin+'');
              $.each(data, function (i) {
                if (i == 0) {
                  $('#info_anggota').html(
                    '<div class="row">'
                    +'<div class="form-group col-md-9"><input style="margin-top : 10px" type="text" class="form-control anggota_input" id="anggota_team'+i
                    +'" name="anggota_team" placeholder="Anggota" readonly></div>'
                    +'<div class="form-group col-md-3"><input style="margin-top : 10px" type="text" class="form-control poin_input" id="anggota_poin'+i
                    +'" name="anggota_poin" placeholder="Poin" readonly></div>'
                    +'</div>'
                  )
                  $('#anggota_team'+i).val(data[i].nim);
                  $('#anggota_poin'+i).val(poin_mhs);
                } else if (i >= 1) {
                  $('#info_anggota').append(
                    '<div class="row">'
                    +'<div class="form-group col-md-9"><input style="margin-top : 10px" type="text" class="form-control anggota_input" id="anggota_team'+i
                    +'" name="anggota_team" placeholder="Anggota" readonly></div>'
                    +'<div class="form-group col-md-3"><input style="margin-top : 10px" type="text" class="form-control poin_input" id="anggota_poin'+i
                    +'" name="anggota_poin" placeholder="Poin" readonly></div>'
                    +'</div>'
                  )
                  $('#anggota_team'+i).val(data[i].nim);
                  $('#anggota_poin'+i).val(poin_mhs);
                }
              });
              $('#btn_unreward').prop("disabled",false);
            }
          }
      });
    });

    $('#btn_unreward').click(function(){
      var id_prestasi = $('#hiddenIdValidasi').val();
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Admin_prestasi/unvalidate',
        data: {id_prestasi:id_prestasi},
        dataType:'json',
        success: function(data){
        }
      });
        location.reload();
    });

  })

  function hitungAnggota() {
    if (document.getElementById('tipe_prestasi_update_regu').checked) {
      var array = $('#referral_prestasi_edit').val().split(",");
      var sorted_arr = array.slice().sort();
      for(i=0;i<sorted_arr.length;i++)
      {
          sorted_arr[i] = sorted_arr[i].replace(/^\s\s*/, '').replace(/\s\s*$/, '');
      }
      var results = [];
        for (var i = 0; i < sorted_arr.length; i++) {
            if (sorted_arr[i + 1] != sorted_arr[i] && sorted_arr[i].length == 14) {
                results.push(sorted_arr[i]);
            }
        }
      var ref_length = results.length + 1;
    }
      var x = document.getElementById("jml_anggota_edit");
      if (ref_length >= 1) {
          x.value = ref_length;
      }
  }

  function TipeCheck() {
      if (document.getElementById('tipe_prestasi_update_regu').checked) {
          document.getElementById('jml_anggota_edit').style.display = 'block';
          document.getElementById('jml_anggota_editlabel').style.display = 'block';
          document.getElementById('referral_prestasi_edit').style.display = 'block';
          document.getElementById('referral_editlabel').style.display = 'block';
      } else {
          document.getElementById('jml_anggota_edit').style.display = 'none';
          document.getElementById('jml_anggota_editlabel').style.display = 'none';
          document.getElementById('referral_prestasi_edit').style.display = 'none';
          document.getElementById('referral_editlabel').style.display = 'none';
      }
    }

</script>
