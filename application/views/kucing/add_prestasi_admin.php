

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_prestasi'); ?>">Data Prestasi</a></li>
      <li class="breadcrumb-item">Tambah Prestasi</li>
    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong>Tambah</strong>
                Data Prestasi
              </div>
              <div class="card-body">


                  <?php
                  $attributes = array('id' => 'addPrestasi');
                  echo form_open("Admin_prestasi/addPrestasi_admin");
                  ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">NIM</label>
                    <div class="col-md-9">
                      <input type="text" id="nim" name="nim" class="form-control" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM" required>
                    </div>
                  </div>
                  <?php echo form_error('nim'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tipe Prestasi</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" onclick="javascript:TipeCheck();" type="radio" id="individu" value="1" name="tipe_prestasi" checked>
                        <label class="form-check-label" for="inline-radio1">Individu</label>
                      </div>
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" onclick="javascript:TipeCheck();" type="radio" id="beregu" value="2" name="tipe_prestasi">
                        <label class="form-check-label" for="inline-radio2">Beregu/Kelompok</label>
                      </div>
                    </div>
                  </div>
                  <?php echo form_error('tipe_prestasi'); ?>

                  <div class="form-group row" >
                    <label class="col-md-2 col-form-label" id="referral_label" style="display:none" for="text-input">NIM Anggota
                      <a href="#" data-toggle="referral_tooltip" title="Pisahkan NIM dengan koma ',' untuk masukan lebih dari satu, tidak termasuk NIM sendiri"><h7>info</h7></a>
                    </label>
                    <div class="col-md-9" id="referral_input" style="display:none">
                      <input type="text" id="referral_prestasi" name="referral_prestasi"  class="form-control" value="<?php echo set_value('referral_prestasi'); ?>"
                      placeholder="Pisahkan NIM dengan koma ',' untuk masukan lebih dari satu (Misal : 2402XXXXXXXX, 2401XXXXXXXXX)" onfocusout="hitungAnggota()">
                    </div>
                  </div>
                  <?php echo form_error('referral_prestasi'); ?>

                  <div class="form-group row" >
                    <label class="col-md-2 col-form-label" id="jml_regu_label" style="display:none" for="text-input">Jumlah Anggota
                      <a href="#" data-toggle="jml_tooltip" title="Anggota dihitung dari NIM anggota VALID ditambah user "><h7>info</h7></a>
                    </label>
                    <div class="col-md-9" id="jml_regu_input" style="display:none">
                      <input type="number" id="jml_anggota" name="jml_anggota"  class="form-control" value="<?php echo set_value('jml_anggota'); ?>"
                      placeholder="Jumlah mahasiswa yang terdaftar prestasi">
                    </div>
                  </div>
                  <?php echo form_error('jml_anggota'); ?>

                  <input id="array_nim" name="array_nim" class="form-control" value="<?php echo set_value('array_nim'); ?>" type="text" hidden>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Nama Kegiatan</label>
                    <div class="col-md-9">
                      <input type="text" id="nama_prestasi" name="nama_prestasi" class="form-control" value="<?php echo set_value('nama_prestasi'); ?>" placeholder="Masukkan nama kegiatan">
                    </div>
                  </div>
                  <?php echo form_error('nama_prestasi'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="select1">Level Prestasi
                      <a href="#" data-toggle="skala_tooltip"
                      title="1. Lokal ⇒ Untuk prestasi di ruang lingkup daerah lokal atau lingkup universitas.
2. Regional ⇒ Untuk prestasi yang di lingkup daerah/provinsi.
3. Nasional ⇒ Untuk prestasi di lingkup nasional (dalam negeri) saja.
4. Internasional ⇒ Untuk prestasi di tingkat luar negara."><h7>info</h7></a>
                    </label>
                    <div class="col-md-3">
                      <select id="level_prestasi" name="level_prestasi" class="form-control">
                        <option value="">Pilih Level Prestasi</option>
                        <?php
                        foreach ($setting_reward as $sr => $value) {
                          echo "<option value='".$value->level."'>".$value->nama_level."</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <label class="col-md-2 col-form-label" for="text-input">Peringkat yang diraih</label>
                    <div class="col-md-4">
                      <select  id="peringkat_prestasi" name="peringkat_prestasi" class="form-control">
                      <option value="">Pilih level prestasi terlebih dulu</option>
                      </select>
                  </div>
                  <?php echo form_error('level_prestasi'); ?>
                  <?php echo form_error('peringkat_prestasi'); ?>

                  </div>


                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jenis Prestasi</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" id="jenis_prestasi" value="1" name="jenis_prestasi" checked>
                        <label class="form-check-label" for="inline-radio1">Akademik</label>
                      </div>
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" id="jenis_prestasi" value="2" name="jenis_prestasi">
                        <label class="form-check-label" for="inline-radio2">Non-Akademik</label>
                      </div>
                    </div>
                  </div>
                  <?php echo form_error('jenis_prestasi'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Nama Penyelenggara</label>
                    <div class="col-md-9">
                      <input type="text" id="penyelenggara_prestasi" name="penyelenggara_prestasi" class="form-control" value="<?php echo set_value('penyelenggara_prestasi'); ?>" placeholder="Nama instansi penyelenggara kegiatan">
                    </div>
                  </div>
                  <?php echo form_error('penyelenggara_prestasi'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Tempat Kegiatan</label>
                    <div class="col-md-9">
                      <input type="text" id="tempat_prestasi" name="tempat_prestasi" class="form-control" value="<?php echo set_value('temppat_prestasi'); ?>" placeholder="Kota/Alamat kegiatan diselenggarakan">
                    </div>
                  </div>
                  <?php echo form_error('tempat_prestasi'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="textarea-input">Tanggal Kegiatan</label>
                      <div class="col-md-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                        </div>
                        <input id="date_start" name="date_start" class="form-control" value="<?php echo set_value('date_start'); ?>" type="date">
                      </div>
                      </div>
                    <label class="col-md-2 col-form-label" for="textarea-input">Tanggal Selesai</label>
                      <div class="col-md-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-calendar-times-o"></i></span>
                        </div>
                        <input id="date_end" name="date_end" class="form-control" value="<?php echo set_value('date_end'); ?>" type="date">
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="textarea-input">Deskripsi Pencapaian</label>
                    <div class="col-md-9">
                      <textarea id="deskripsi_prestasi" name="deskripsi_prestasi" rows="9" class="form-control" value="<?php echo set_value('deskripsi_prestasi'); ?>" placeholder="Ceritakan lebih lanjut mengenai pencapaian anda.."></textarea>
                    </div>
                  </div>
                  <?php echo form_error('deskripsi_prestasi'); ?>


              </div>
              <div class="card-footer" >
                <input type="submit" id="submit" value="Submit" style="float: right;" class="btn btn-sm btn-primary">
                <button type="reset" style="float: right; margin-right: 10px" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
              </div>
            </div>

        <!--/.row-->


    </div>
    <!-- /.conainer-fluid -->
  </main>

</body>

<script type="text/javascript">

    $(document).ready(function(){
      $('[data-toggle="referral_tooltip"]').tooltip();
      $('[data-toggle="jml_tooltip"]').tooltip();

      $('select[name="level_prestasi"]').on('change', function() {
          var level = $(this).val();
          if(level) {
              $.ajax({
                  url: '<?= base_url();?>Prestasi/getPeringkat/'+level,
                  type: "GET",
                  dataType: "json",
                  success:function(data) {
                      $('select[name="peringkat_prestasi"]').empty();
                      $.each(data, function(key, value) {
                          $('select[name="peringkat_prestasi"]').append('<option value="'+ value.peringkat +'">'+ value.peringkat +'</option>');
                      });
                  }
              });
          }else{
              $('select[name="peringkat_prestasi"]').empty();
          }

          var head_nim = $('#nim').val();
          var array = $('#referral_prestasi').val().split(",");
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
          var x = document.getElementById("jml_anggota");
          if (ref_length >= 1) {
              x.value = ref_length;
          }

          results.push(head_nim);
          var y = document.getElementById("array_nim");
          y.value = results;
          console.log(y.value);
      });
    });

    $( function() {
      var available_nim = <?= json_encode($available_nim) ?>;
      $( "#nim" ).autocomplete({
        source: available_nim
      });
      function split( val ) {
        return val.split( /,\s*/ );
      }
      function extractLast( term ) {
        return split( term ).pop();
      }
      $( "#referral_prestasi" )
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

    function hitungAnggota() {
        var head_nim = $('#nim').val();
        var array = $('#referral_prestasi').val().split(",");
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
        var x = document.getElementById("jml_anggota");
        if (ref_length >= 1) {
            x.value = ref_length;
        }

        results.push(head_nim);
        var y = document.getElementById("array_nim");
        y.value = results;
        console.log(y.value);
    }

    function TipeCheck() {
        if (document.getElementById('beregu').checked) {
            document.getElementById('referral_label').style.display = 'block';
            document.getElementById('referral_input').style.display = 'block';
            document.getElementById('jml_regu_label').style.display = 'block';
            document.getElementById('jml_regu_input').style.display = 'block';
        } else {
            document.getElementById('referral_label').style.display = 'none';
            document.getElementById('referral_input').style.display = 'none';
            document.getElementById('jml_regu_label').style.display = 'none';
            document.getElementById('jml_regu_input').style.display = 'none';
        }
      }

</script>
