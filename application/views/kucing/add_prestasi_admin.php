

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


                  <?php echo form_open("Admin_prestasi/addPrestasi_admin");?>

                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Nomor Induk Mahasiswa</label>
                    <div class="col-md-9">
                      <input type="text" id="nim" name="nim" class="form-control" value="<?php echo set_value('nim'); ?>" placeholder="Masukkan NIM">
                      <ul class="dropdown-menu txtnim" role="menu" aria-labelledby="dropdownMenu"  id="DropdownNim"></ul>
                    </div>
                  </div>
                  <?php echo form_error('nim'); ?>

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
                    <label class="col-md-2 col-form-label" id="role_label" style="display:none" for="text-input">Posisi/Role</label>
                    <div class="col-md-9" id="role_input" style="display:none">
                      <input type="text" id="role_prestasi" name="role_prestasi" class="form-control" value="<?php echo set_value('role_prestasi'); ?>" placeholder="Role yang diambil misal Ketua/Anggota..">
                    </div>
                  </div>
                  <?php echo form_error('role_prestasi'); ?>
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
                  <label class="col-md-2 col-form-label" for="select1">Skala Kegiatan</label>
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
                <input type="submit" value="Submit" style="float: right;" class="btn btn-sm btn-primary">
                <button type="reset" style="float: right; margin-right: 10px" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
              </div>
            </div>

        <!--/.row-->


    </div>
    <!-- /.conainer-fluid -->
  </main>

</body>

<script type="text/javascript">
    $(document).ready(function () {
        $("#nim").keyup(function () {
            $.ajax({
                type: "POST",
                url: '<?=base_url()?>Admin_prestasi/getNim',
                data: {
                    keyword: $("#nim").val()
                },
                dataType: "json",
                success: function (data) {
                    if (data.length > 0) {
                        $('#DropdownNim').empty();
                        $('#nim').attr("data-toggle", "dropdown");
                        $('#DropdownNim').dropdown('toggle');
                    }
                    else if (data.length == 0) {
                        $('#nim').attr("data-toggle", "");
                    }
                    $.each(data, function (key,value) {
                        if (data.length >= 0)
                            $('#DropdownNim').append('<li role="displayNim" ><a role="menuitem dropdownNimli" class="dropdownlivalue">' + value['name'] + '</a></li>');
                    });
                }
            });
        });
        $('ul.txtnim').on('click', 'li a', function () {
            $('#nim').val($(this).text());
        });
    });

  function TipeCheck() {
      if (document.getElementById('beregu').checked) {
          document.getElementById('role_label').style.display = 'block';
          document.getElementById('role_input').style.display = 'block';
      } else {
          document.getElementById('role_label').style.display = 'none';
          document.getElementById('role_input').style.display = 'none';
      }
    }

</script>
