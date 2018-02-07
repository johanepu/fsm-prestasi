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
                  <label for="" class="">CONTACT PERSON CLIENT</label>
                  <input type="text" class="form-control" id="pic" name="pic" placeholder="Nama PIC">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">NAMA PERUSAHAAN</label>
                  <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Nama Perusahaan">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">EMAIL</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email Resmi">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">TELEPHONE</label>
                  <input type="text" class="form-control" id="telephone" onkeypress="var key = event.keyCode || event.charCode; return ((key >= 48 && key <= 57) || key == 8);" name="telephone" placeholder="Nomor Telephone">
                </div>
                <div class="form-group text-left">
                  <label for="" class="">ALAMAT PERUSAHAAN</label>
                  <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="form-group text-left">
                  <label for="" class="">KOTA</label>
                  <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
                </div>
              </div>
              <div class="modal-footer">
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

<script src="<?php echo base_url(); ?>assets/node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $(document).on('click', 'button.btn-edit,button.btn-edit2', function() {
      var id_client = $(this).val();
      $('#editPrestasiModal').modal('show');
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>client/fetchData',
        data: {id_client:id_client},
        dataType:'json',
        success: function(data){
          console.log(data);
          if(data)
          {
            var client = data[0];
              $('#picEditClient').val(client.nama_pic);
              $('#perusahaanEditClient').val(client.perusahaan);
              $('#emailEditClient').val(client.email);
              $('#telephoneEditClient').val(client.telephone);
              $('#alamatEditClient').val(client.alamat_usaha);
              $('#kotaEditClient').val(client.kota);
              $('#hiddenId').val(client.id_client);
          }
        }
      });
    });

    $('#btnSimpanclient').click(function(){
      var pic =   $('#picEditClient').val();
      var perusahaan = $('#perusahaanEditClient').val();
      var email = $('#emailEditClient').val();
      var telephone =  $('#telephoneEditClient').val();
      var alamat = $('#alamatEditClient').val();
      var kota =  $('#kotaEditClient').val();
      var id_client =$('#hiddenId').val();

      if(pic==''||perusahaan==''||email==''||telephone==''||alamat==''||kota==''){
        return false;
      }else{
        $.ajax({
          type: "POST",
          url: '<?=base_url()?>client/updateclient',
          data: {pic:pic,perusahaan:perusahaan,email:email,telephone:telephone,alamat:alamat,kota:kota,id_client:id_client },
          success: function(data){}
        });
        location.reload();
      }
    });
  })


  </script>
