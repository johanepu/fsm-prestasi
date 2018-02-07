<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Prestasi'); ?>">Data Prestasi</a></li>

    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Data Prestasi
                <a  type="button" class="btn btn-primary" href="<?php echo site_url('Prestasi/addPrestasi'); ?>" style="float: right;"><i class="fa fa-plus"></i>&nbsp; Tambah Prestasi</a>
              </div>
              <div class="card-body">
                <div class="row mt">
                  <div class="form-group col-lg-12">
                    <input type="text" class="form-control" id="cariPrestasi" placeholder="Cari Nama Kegiatan atau Prestasi Anda" >
                  </div>
                </div>
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Prestasi</th>
                      <th>Peringkat</th>
                      <th>Tipe Prestasi</th>
                      <th>Jenis</th>
                      <th>Level</th>
                      <th>Tanggal Kegiatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="tabel-prestasi">
                    <?php
                    $no = 1;
                    foreach($prestasi as $p){
                    ?>
                    <tr id="<?php echo $p->id_prestasi?>">
                      <td><?php echo $p->id_prestasi?></td>
                      <td title="Data ini tidak dapat di ubah" ><?php echo $p->nama_prestasi; ?></td>
                      <td title="Data ini tidak dapat di edit" ><?php echo $p->peringkat_prestasi; ?></td>
                      <td title="Tipe Prestasi" name="jenis_prestasi" id="jenis_prestasi">
                      <?php
                      if ($p->tipe_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Akademik</span>';
                      }elseif ($p->tipe_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Non-Akademik</span>';
                      }
                      ?></td>
                      <td title="Jenis Prestasi" name="jenis_prestasi" id="jenis_prestasi">
                      <?php
                      if ($p->jenis_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Individu</span>';
                      }elseif ($p->jenis_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Beregu</span>';
                      }
                      ?></td>
                      <td title="Level Prestasi" name="level_prestasi" id="level_prestasi">
                      <?php
                      if ($p->level_prestasi == "1") {
                          echo '<span class="label label-success label-mini">Lokal</span>';
                      }elseif ($p->level_prestasi == "2") {
                          echo '<span class="label label-warning label-mini">Nasional</span>';
                      }elseif ($p->level_prestasi == "3") {
                          echo '<span class="label label-warning label-mini">Regional</span>';
                      }elseif ($p->level_prestasi == "4") {
                          echo '<span class="label label-warning label-mini">Internasional</span>';
                      }
                      ?></td>
                      <td title="Data ini tidak dapat di edit" ><?php echo $p->tgl_prestasi_start; ?></td>
                      <td>
                          <div class="btn-group" >
                              <button class="btn btn-default btn-edit" name="btn-edit"  value="<?=$p->id_prestasi?>" type="button">
                                  <i class="fa fa-fw s fa-pencil"></i>Edit</button>
                              <button class="btn btn-default btn-delete" name="btn-delete" value="<?=$p->id_prestasi?>" type="button">
                                  <i class="fa fa-fw fa-remove"></i>Delete</button>
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
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editPrestasiLabel">Edit Data Prestasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group text-left">
                  <label for="" class="">Nama Prestasi</label>
                  <input type="text" class="form-control" id="nama_prestasi_edit" name="nama_prestasi_edit" placeholder="Nama PIC">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">Peringkat Prestasi</label>
                  <input type="text" class="form-control" id="peringkat_prestasi_edit" name="peringkat_prestasi_edit" placeholder="Nama Perusahaan">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">Tipe Prestasi</label>
                  <div class="form-group row" style="margin-left:0px">
                  <input type="text" class="col-md-3 form-control" id="tipe_prestasi_edit" name="tipe_prestasi_edit" placeholder="Nama Perusahaan" disabled>
                  <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" type="radio" id="tipe_prestasi_update" value="1" name="tipe_prestasi_update">
                      <label class="form-check-label" for="inline-radio1">Individu</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" type="radio" id="tipe_prestasi_update" value="2" name="tipe_prestasi_update">
                      <label class="form-check-label" for="inline-radio2">Beregu/Kelompok</label>
                    </div>
                  </div>
                </div>
              </div>
                <div class="form-group text-left">
                  <label for="" id="role_prestasi_editlabel" class="">Role Regu</label>
                  <input type="text" class="form-control" style="display:block" id="role_prestasi_edit" name="role_prestasi_edit" placeholder="Nomor Telephone">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">Jenis Prestasi</label>
                  <div class="form-group row" style="margin-left:0px">
                    <input type="text" class="col-md-3 form-control" id="jenis_prestasi_edit" name="jenis_prestasi_edit" placeholder="Nama Perusahaan" disabled>
                  <div class="col-md-9 col-form-label">
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" type="radio" id="jenis_prestasi_update" value="1" name="jenis_prestasi_update">
                      <label class="form-check-label" for="inline-radio1">Akademik</label>
                    </div>
                    <div class="form-check form-check-inline mr-1">
                      <input class="form-check-input" type="radio" id="jenis_prestasi_update" value="2" name="jenis_prestasi_update">
                      <label class="form-check-label" for="inline-radio2">Non-Akademik</label>
                    </div>
                  </div>
                </div>
                </div>
                <div class="form-group text-left">
                  <label for="" class="">Deskripsi</label>
                  <textarea class="form-control" id="deskripsi_prestasi_edit" name="deskripsi_prestasi_edit"></textarea>
                </div>
                <div class="form-group text-left">
                  <label for="" class="">Tanggal Kegiatan</label>
                  <div class="form-group row" style="margin-left:0px">
                    <input type="text" class="form-control col-md-3" id="tgl_prestasi_start_edit" name="tgl_prestasi_start_edit" placeholder="Kota" disabled>
                    <div class="col-md-6">
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar-check-o"></i></span>
                      </div>
                      <input id="date_start_edit" name="date_start_edit" class="form-control"  type="date">
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
    <!-- /.conainer-fluid -->
  </main>
</body>

<script src="<?php echo base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click', 'button.btn-edit,button.btn-edit2', function() {
      var id_prestasi = $(this).val();
      var jenisPrestasi = '';
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
              } else {
                jenisPrestasi = 'Non-Akademik';
              }
              if (prestasi.tipe_prestasi == 1) {
                tipePrestasi = 'Individu';
                document.getElementById('role_prestasi_edit').style.display = 'none';
                document.getElementById('role_prestasi_editlabel').style.display = 'none';
              } else {
                tipePrestasi = 'Kelompok';
              }
              $('#nama_prestasi_edit').val(prestasi.nama_prestasi);
              $('#peringkat_prestasi_edit').val(prestasi.peringkat_prestasi);
              $('#tipe_prestasi_edit').val(tipePrestasi);
              $('#role_prestasi_edit').val(prestasi.role_prestasi);
              $('#jenis_prestasi_edit').val(jenisPrestasi);
              $('#deskripsi_prestasi_edit').val(prestasi.deskripsi_prestasi);
              $('#tgl_prestasi_start_edit').val(prestasi.tgl_prestasi_start);
              $('#hiddenId').val(prestasi.id_prestasi);
          }
        }
      });
    });

    $('#btnSimpanPrestasi').click(function(){
      console.log('tombol mati cuk');
      var nama_prestasi = $('#nama_prestasi_edit').val();
      var peringkat_prestasi = $('#peringkat_prestasi_edit').val();
      var role_prestasi = $('#role_prestasi_edit').val();
      var deskripsi_prestasi =  $('#deskripsi_prestasi_edit').val();
      var tipe_prestasi = $('#tipe_prestasi_update').val();
      var jenis_prestasi = $('#jenis_prestasi_update').val();
      var tgl_prestasi_start =  $('#date_start_edit').val();
      var id_prestasi = $('#hiddenId').val();


    if(tipe_prestasi==''){
       tipe_prestasi = $('#tipe_prestasi_edit').val();
    }
    if(jenis_prestasi==''){
       jenis_prestasi = $('#jenis_prestasi_edit').val();
    }
    if(tgl_prestasi_start==''){
       tgl_prestasi_start =  $('#tgl_prestasi_start_edit').val();
    }

    console.log('if e salah boss');

    if(nama_prestasi==''||peringkat_prestasi==''|deskripsi_prestasi==''){
        console.log('gagal cuk');
        return false;
      }else {
         nama_prestasi =   $('#nama_prestasi_edit').val();
         peringkat_prestasi = $('#peringkat_prestasi_edit').val();
         role_prestasi =  $('#role_prestasi_edit').val();
         deskripsi_prestasi =  $('#deskripsi_prestasi_edit').val();
         id_prestasi =$('#hiddenId').val();
    }
        console.log(tipe_prestasi);
        console.log(jenis_prestasi);
        console.log(tgl_prestasi_start);
        console.log(id_prestasi);
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Prestasi/updatePrestasi',
          data: {nama_prestasi:nama_prestasi,
                peringkat_prestasi:peringkat_prestasi,
                tipe_prestasi:tipe_prestasi,
                role_prestasi:role_prestasi,
                jenis_prestasi:jenis_prestasi,
                deskripsi_prestasi:deskripsi_prestasi,
                tgl_prestasi_start:tgl_prestasi_start,
                id_prestasi:id_prestasi },
          success: function(data){}
        });

    });

  })


  </script>
