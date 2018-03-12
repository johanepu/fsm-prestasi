
<style>
.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0;}
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
</style>

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
                <strong>Tambah</strong>
                Data Prestasi
              </div>
              <div class="card-body">


                  <?php echo form_open("addPrestasi");?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">Tipe Prestasi</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" onclick="javascript:TipeCheck();" type="radio" id="individu" value="1" name="tipe_prestasi">
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
                      <a href="#" data-toggle="referral_tooltip" title="Pisahkan NIM dengan koma ',' untuk masukan lebih dari satu">*</i></a>
                    </label>
                    <div class="col-md-9" id="referral_input" style="display:none">
                      <input type="text" id="referral_prestasi" name="referral_prestasi"  class="form-control" value="<?php echo set_value('referral_prestasi'); ?>" placeholder="Masukan NIM anggota lain sebagai bagian dari regu">
                    </div>
                  </div>
                  <?php echo form_error('referral_prestasi'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Nama Kegiatan</label>
                    <div class="col-md-9">
                      <input type="text" id="nama_prestasi" name="nama_prestasi" class="form-control" value="<?php echo set_value('nama_prestasi'); ?>" placeholder="Masukkan nama kegiatan">
                    </div>
                  </div>
                  <?php echo form_error('nama_prestasi'); ?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Peringkat yang diraih</label>
                    <div class="col-md-9">
                      <input type="text" id="peringkat_prestasi" name="peringkat_prestasi" class="form-control" value="<?php echo set_value('peringkat_prestasi'); ?>" placeholder="Misal Juara 1, Best Paper..">
                    </div>
                  </div>
                  <?php echo form_error('peringkat_prestasi'); ?>
                  <!-- <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="select1">Tipe Prestasi</label>
                    <div class="col-md-3">
                      <select id="tipe_prestasi" name="tipe_prestasi" class="form-control">
                        <option value="0">Pilih Tipe Prestasi</option>
                        <option value="1">Beregu</option>
                        <option value="2">Individu</option>
                      </select>
                    </div>
                  </div> -->

                  <!-- <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="select1">Jenis Prestasi</label>
                    <div class="col-md-4">
                      <select id="jenis_prestasi" name="jenis_prestasi" class="form-control">
                        <option value="0">Pilih Jenis Prestasi</option>
                        <option value="1">Akademik</option>
                        <option value="2">Non-Akademik</option>
                      </select>
                    </div>
                  </div> -->

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jenis Prestasi</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" id="jenis_prestasi" value="1" name="jenis_prestasi">
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
                  <label class="col-md-2 col-form-label" for="select1">Skala Kegiatan
                    <a href="#" data-toggle="skala_tooltip"
                    title="1. Lokal ⇒ Untuk prestasi di ruang lingkup daerah lokal atau lingkup
2. Nasional ⇒ Untuk prestasi di lingkup dalam negara lokal saja
3. Regional ⇒ Untuk prestasi di satu kawasan yang terdiri dari beberapa negara
4. Internasional ⇒ Untuk prestasi dengan ruang lingkup seluruh dunia.">*</i></a>
                  </label>
                  <div class="col-md-3">
                      <select id="level_prestasi" name="level_prestasi" class="form-control">
                        <option value="0">Pilih Skala Kegiatan</option>
                        <option value="1">Lokal</option>
                        <option value="2">Nasional</option>
                        <option value="3">Regional</option>
                        <option value="4">Internasional</option>
                      </select>
                    </div>
                  </div>
                  <?php echo form_error('level_prestasi'); ?>

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
    });

      $( function() {
      var available_nim = <?= json_encode($available_nim) ?>;
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

      $('#submit').click(function(){
        if (document.getElementById('beregu').checked) {
          var array = $('#referral_prestasi').val().split(",");
          var sorted_arr = array.slice().sort();
          for(i=0;i<sorted_arr.length;i++)
          {
              sorted_arr[i] = sorted_arr[i].replace(/^\s\s*/, '').replace(/\s\s*$/, '');
          }
          var results = [];
            for (var i = 1; i < sorted_arr.length; i++) {
                if (sorted_arr[i + 1] != sorted_arr[i] && sorted_arr[i].length == 14) {
                    results.push(sorted_arr[i]);
                }
            }
          console.log(sorted_arr);
          console.log(results);
          var radiotipe = document.getElementsByName('tipe_prestasi');
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
          var radiojenis = document.getElementsByName('jenis_prestasi');
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
          for (i=0;i<results.length;i++){

              var nim = results[i];
              var tipe_prestasi = tipe_prestasi;
              var nama_prestasi = $('#nama_prestasi').val();
              var peringkat_prestasi =  $('#peringkat_prestasi').val();
              var jenis_prestasi =  jenis_prestasi;
              var level_prestasi =  $('#level_prestasi').val();
              var penyelenggara_prestasi =  $('#penyelenggara_prestasi').val();
              var tempat_prestasi =  $('#tempat_prestasi').val();
              var date_start =  $('#date_start').val();
              var date_end =  $('#date_end').val();
              var deskripsi_prestasi =  $('#deskripsi_prestasi').val();
              $.ajax({
                type: "POST",
                url: '<?=base_url()?>Prestasi/addRefPrestasi',
                data: {
                  nim:nim,
                  tipe_prestasi:tipe_prestasi,
                  nama_prestasi:nama_prestasi,
                  peringkat_prestasi:peringkat_prestasi,
                  jenis_prestasi:jenis_prestasi,
                  level_prestasi:level_prestasi,
                  penyelenggara_prestasi:penyelenggara_prestasi,
                  tempat_prestasi:tempat_prestasi,
                  date_start:date_start,
                  date_end:date_end,
                  deskripsi_prestasi:deskripsi_prestasi
                },
                success: function(data){
                }
              });
          }
        }
        //
        //
        // if(nama_lengkap==''||email==''||alamat==''||tingkatan==''||nomor_hp==''){
        //     alert('Data harus diisi lengkap, Cek kembali isian Anda');
        //     return false;
        //   }else {
        //     $.ajax({
        //       type: "POST",
        //       url: '<?=base_url()?>User_profile/updateProfil',
        //       data: {namalengkap:nama_lengkap,
        //             email:email,
        //             alamat:alamat,
        //             tingkatan:tingkatan,
        //             nomor_hp:nomor_hp},
        //       success: function(data){
        //       }
        //     });
        //     location.reload();
        //   }
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


  function TipeCheck() {
      if (document.getElementById('beregu').checked) {
          document.getElementById('referral_label').style.display = 'block';
          document.getElementById('referral_input').style.display = 'block';
      } else {
          document.getElementById('referral_label').style.display = 'none';
          document.getElementById('referral_input').style.display = 'none';
      }
    }

</script>
