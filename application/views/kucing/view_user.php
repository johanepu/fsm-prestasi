<style>
    .profile_photo{
      object-fit: cover;
      width:230px;
      height:230px;
    }

</style>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_user'); ?>">Data Mahasiswa</a></li>
      <li class="breadcrumb-item"><?php echo $data_user[0]->namalengkap?></li>
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
                                  <?php if ($data_user[0]->foto==NULL): ?>
                                    <img src="<?php echo base_url(); ?>assets/src/img/avatars/0.jpg" class="mx-auto profile_photo img-avatar" alt="avatar">
                                  <?php else: ?>
                                    <img src="<?php echo base_url('image-upload/'.$data_user[0]->foto);?>" class="mx-auto profile_photo img-avatar" alt="avatar">
                                  <?php endif; ?>
                                </div>
                              </div>
                                <div class="col-md-6">
                                    <h6>Nama</h6>
                                    <p>
                                      <?php echo $data_user[0]->namalengkap?>
                                    </p>
                                    <h6>Nomor Induk Mahasiswa</h6>
                                    <p>
                                      <?php echo $data_user[0]->nim?>
                                    </p>
                                    <h6>Email</h6>
                                    <p>
                                      <?php echo $data_user[0]->email?>
                                    </p>
                                    <h6>Departemen/Jurusan</h6>
                                    <p>
                                      <?php
                                        $jurusan = $data_user[0]->jurusan;
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
                                    <h6>Angkatan</h6>
                                    <p>
                                      <?php if ($data_user[0]->tingkatan == 0): ?>
                                        <?php echo 'User belum mengisi data angkatan'?>
                                      <?php else: ?>
                                        <?php echo $data_user[0]->tingkatan?>
                                      <?php endif; ?>
                                    </p>
                                    <h6>Alamat</h6>
                                    <p>
                                      <?php if ($data_user[0]->alamat == NULL): ?>
                                        <?php echo 'User belum mengisi data alamat'?>
                                      <?php else: ?>
                                        <?php echo $data_user[0]->alamat?>
                                      <?php endif; ?>
                                    </p>
                                    <h6>Kontak</h6>
                                    <p>
                                      <?php if ($data_user[0]->nomor_hp == NULL): ?>
                                        <?php echo 'User belum mengisi data nomor handphone'?>
                                      <?php else: ?>
                                        <?php echo $data_user[0]->nomor_hp?>
                                      <?php endif; ?>
                                    </p>
                                    <h6>Tanggal Akun Dibuat</h6>
                                    <p>
                                      <?php
                                        $tanggal = $data_user[0]->date_created;
                                        echo $tanggal;
                                       ?>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                  <br>
                                  <h5 class="mb-0 text-center">Data Prestasi <?php echo $data_user[0]->namalengkap?></h5>
                                  <br>
                                  <table id="tabel_prestasi" class="table table-responsive-sm table-striped">
                                    <thead>
                                      <tr>
                                        <th>Nama Prestasi</th>
                                        <th>Peringkat</th>
                                        <th>Jenis</th>
                                        <th>Tipe Prestasi</th>
                                        <th>Level</th>
                                        <th>Tanggal Kegiatan</th>
                                        <th>Poin</th>
                                        <!-- <th>Aksi</th> -->
                                      </tr>
                                    </thead>
                                    <tbody id="tabel-prestasi">
                                      <?php
                                      foreach($prestasi_user as $p){
                                      ?>
                                      <tr id="<?php echo $p->id_prestasi?>">
                                        <td ><?php echo $p->nama_prestasi; ?></td>
                                        <td ><?php echo $p->peringkat_prestasi; ?></td>
                                        <td title="Jenis Prestasi" name="jenis_prestasi" id="jenis_prestasi">
                                        <?php
                                        if ($p->jenis_prestasi == "1") {
                                            echo '<span class="label label-success label-mini">Akademik</span>';
                                        }elseif ($p->jenis_prestasi == "2") {
                                            echo '<span class="label label-warning label-mini">Non-Akademik</span>';
                                        }
                                        ?></td>
                                        <td title="Tipe Prestasi" name="tipe_prestasi" id="tipe_prestasi">
                                        <?php
                                        if ($p->tipe_prestasi == "1") {
                                            echo '<span class="label label-success label-mini">Individu</span>';
                                        }elseif ($p->tipe_prestasi == "2") {
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
                                        <td ><?php echo $p->tgl_prestasi_start; ?></td>
                                        <td title="Status Prestasi" name="status_prestasi" id="status_prestasi">
                                        <?php
                                        if ($p->validasi == "1") {
                                            echo '<span class="badge badge-success">Poin Valid : '.$p->poin.'</span>';
                                        }elseif ($p->validasi == "0") {
                                            echo '<span class="badge badge-danger">Belum Valid</span>';
                                        }
                                        ?></td>
                                        <!-- <td>
                                            <div class="btn-group" >
                                                <button class="btn btn-primary btn-edit" name="btn-edit" title="Edit Prestasi" value="<?=$p->id_prestasi?>" type="button">
                                                    <i class="fa fa-fw s fa-pencil"></i></button>
                                                <button class="btn btn-danger btn-delete" name="btn-delete" title="Hapus Prestasi" value="<?=$p->id_prestasi?>" type="button">
                                                    <i class="fa fa-fw fa-remove"></i></button>
                                            </div>
                                        </td> -->
                                      </tr>
                                      <?php }?>
                                    </tbody>
                                    <tbody id="hasilCari"></tbody>
                                  </table>
                                </div>
                            </div>
                            <!--/row-->
                        </div>

                        <div class="tab-pane" id="edit" nim="<?php echo $data_user[0]->nim?>">
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
                                        <input type="submit" id="btnSimpanProfil" class="btn btn-primary" value="Simpan">
                                    </div>
                                </div>
                                <input class="form-control" type="hidden" id="hidden_nim" value="">
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

      // tabel data prestasi datatable
        tabel_prestasi =  $('#tabel_prestasi').DataTable( {
            "dom": 'lrtip',
            "bPaginate": false,
            "info":     false
          } )

      $(document).on('click', 'a.edit', function() {
        var nim = document.getElementById("edit").getAttribute("nim");
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>Admin_user/userData',
          data:{nim:nim},
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
                $('#hidden_nim').val(mhs.nim);
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
        var nim = $('#hidden_nim').val();


        if(nama_lengkap==''||email==''||alamat==''||tingkatan==''||nomor_hp==''||nim==''){
            alert('Data harus diisi lengkap, Cek kembali isian Anda');
            return false;
          }else {
            $.ajax({
              type: "POST",
              url: '<?=base_url()?>Admin_user/updateUser',
              data: {namalengkap:nama_lengkap,
                    email:email,
                    alamat:alamat,
                    tingkatan:tingkatan,
                    nomor_hp:nomor_hp,
                    nim:nim
                  },
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
