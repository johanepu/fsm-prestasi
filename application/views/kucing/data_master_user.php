<!-- <style>
    .table tr {
        cursor: pointer;
    }

    .action-table {
        z-index: 3;
    }

    .table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th {
      background-color: #4eb2fc;
      color:#ffffff;
    }
</style> -->
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_user'); ?>">Data Mahasiswa</a></li>

    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Data Mahasiswa
                <!-- <a  type="button" class="btn btn-primary" href="<?php echo site_url('Prestasi/addPrestasi'); ?>" style="float: right;"><i class="fa fa-plus"></i>&nbsp; Tambah Prestasi</a> -->
              </div>
              <div class="card-body">
                <div class="row mt">
                  <div class="btn-group col-lg-2">
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
                  <div class="form-group col-lg-10">
                    <input type="text" class="form-control" id="cariUser" placeholder="Cari nama mahasiswa atau atribut mahasiswa">
                </div>
                <table id="tabel_user" class="table table-responsive-sm table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama Lengkap</th>
                      <th>Departemen</th>
                      <th>Email</th>
                      <th>Nomor HP</th>
                      <th>Tingkatan</th>
                      <th>Reward Poin</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($user as $p => $mhs){
                    ?>
                    <tr id="<?php echo $mhs->nim?>">
                      <td ><?php echo $mhs->nim; ?></td>
                      <td ><?php echo $mhs->namalengkap; ?></td>
                      <td title="Departemen" name="departemen" id="departemen">
                      <?php
                      if ($mhs->jurusan == "1") {
                          echo '<span class="label label-success label-mini">Matematika</span>';
                      }elseif ($mhs->jurusan == "2") {
                          echo '<span class="label label-warning label-mini">Kimia</span>';
                      }elseif ($mhs->jurusan == "3") {
                          echo '<span class="label label-warning label-mini">Biologi</span>';
                      }elseif ($mhs->jurusan == "4") {
                          echo '<span class="label label-warning label-mini">Fisika</span>';
                      }elseif ($mhs->jurusan == "5") {
                          echo '<span class="label label-warning label-mini">Statistika</span>';
                      }elseif ($mhs->jurusan == "6") {
                          echo '<span class="label label-warning label-mini">Informatika</span>';
                      }
                      ?></td>
                      <td ><?php echo $mhs->email; ?></td>
                      <td ><?php
                        if ($mhs->nomor_hp == NULL) {
                          echo "Belum diisi";
                        } else {
                          echo $mhs->nomor_hp;
                        }
                      ?></td>
                      <td ><?php
                        if ($mhs->tingkatan == 0) {
                          echo "Belum diisi";
                        } else {
                          echo $mhs->tingkatan;
                        }
                      ?></td>
                      <!-- <td ><?php echo $reward_poin[$p]; ?></td> -->
                      <td >
                        <?php
                        if ($reward_poin[$p] <= "0") {
                          echo '<h5><span class="badge badge-danger">'.$reward_poin[$p].'</span></h5>';
                        }else {
                          echo '<h5><span class="badge badge-success">'.$reward_poin[$p].'</span></h5>';
                        }
                        ?>

                      <td>
                          <div class="btn-group action-table" >
                              <a class="btn btn-success" href="<?php echo site_url('Admin_user/user/'.$mhs->nim);?>"
                                title="Lihat User">
                                <i class="fa fa-fw s fa-eye"></i></a>
                              <button class="btn btn-danger btn-delete" name="delete_user" id="delete_user" title="Hapus User" value="<?=$mhs->nim?>">
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


    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" >
      <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus User</h4>
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
    <!-- /.conainer-fluid -->
  </main>
</body>

<script type="text/javascript">
$(document).ready(function(){

  // tabel data prestasi datatable
    tabel_user =  $('#tabel_user').DataTable( {
        "dom": 'lrtipB',
        "sScrollY": "550px",
        "bPaginate": true,
        "info":     true,
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      } );
      $('#cariUser').keyup(function(){
            tabel_user.search($(this).val()).draw() ;
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

    $(document).on('click', '#delete_user', function(){
      $('#modalDelete').modal('show');
      var nim=$(this).val();
      alert(nim);
      $('#hiddenIdDelete').val(nim);
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Admin_user/userData',
        data: {nim:nim},
        dataType:'json',
        success: function(data){
          if(data){
              var user = data[0];
              $('#namadelete').html('"'+user.namalengkap+'"');
              $('#btnhapus').prop("disabled",false);
            }
          }
      });
    });

    $('#btnhapus').click(function(){
      var nim = $('#hiddenIdDelete').val();
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Admin_user/deleteUser',
        data: {nim:nim},
        dataType:'json',
        success: function(data){
        }
      });
        location.reload();
    });

    $(document).on('click', 'button.btn-validate', function() {
      var id_prestasi = $(this).val();
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Prestasi/validate',
        data: {id_prestasi:id_prestasi},
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
