

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Prestasi'); ?>">Data Prestasi</a></li>
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
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Nama Kegiatan</label>
                    <div class="col-md-9">
                      <input type="text" id="nama_prestasi" name="nama_prestasi" class="form-control" placeholder="Masukkan nama kegiatan">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Peringkat yang diraih</label>
                    <div class="col-md-4">
                      <input type="text" id="peringkat_prestasi" name="peringkat_prestasi" class="form-control" placeholder="Misal Juara 1, Best Paper..">
                    </div>
                    <label class="col-md-2 col-form-label" for="select1">Tipe Prestasi</label>
                    <div class="col-md-3">
                      <select id="tipe_prestasi" name="tipe_prestasi" class="form-control">
                        <option value="0">Pilih Tipe Prestasi</option>
                        <option value="1">Beregu</option>
                        <option value="2">Individu</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="text-input">Posisi/Role</label>
                    <div class="col-md-9">
                      <input type="text" id="role_prestasi" name="role_prestasi" class="form-control" placeholder="Role yang diambil misal Ketua/Anggota..">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="select1">Jenis Prestasi</label>
                    <div class="col-md-4">
                      <select id="jenis_prestasi" name="jenis_prestasi" class="form-control">
                        <option value="0">Pilih Jenis Prestasi</option>
                        <option value="1">Akademik</option>
                        <option value="2">Non-Akademik</option>
                        <option value="3">Lainnya</option>
                      </select>
                    </div>
                    <label class="col-md-2 col-form-label" for="select1">Skala Kegiatan</label>
                    <div class="col-md-3">
                      <select id="level_prestasi" name="level_prestasi" class="form-control">
                        <option value="0">Pilih Skala Kegiatan</option>
                        <option value="1">Regional</option>
                        <option value="2">Nasional</option>
                        <option value="3">Internasional</option>
                        <option value="4">Institusi</option>
                        <option value="5">Lainnya</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="textarea-input">Deskripsi Pencapaian</label>
                    <div class="col-md-9">
                      <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder="Ceritakan lebih lanjut mengenai pencapaian anda.."></textarea>
                    </div>
                  </div>

                </form>
              </div>
              <div class="card-footer" >
                <button type="submit" style="float: right;" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" style="float: right; margin-right: 10px" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
              </div>
            </div>

        <!--/.row-->

        <!-- Modal -->
        <div class="modal fade" id="addPrestasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer" style="float-right">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

    </div>
    <!-- /.conainer-fluid -->
  </main>

</body>
