<style>
div.dataTables_wrapper {
  margin: 0 auto;
  width: 97%;
}
</style>

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
                <i class="fa fa-align-justify"></i> Data Reward Mahasiswa FSM
              </div>
              <div class="card-body">
                <div class="row mt">
                  <div class="form-group col-lg-2">
                      <select id="status_select" name="select_status" class="form-control select_status">
                        <option id="reset_status" value="2">Pilih Status</option>
                        <option value="1">Valid</option>
                        <option value="0">Belum Valid</option>
                      </select>
                  </div>
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
                  <div class="form-group col-lg-8">
                    <input type="text" class="form-control" id="cariReward" placeholder="Cari nama mahasiswa atau atribut mahasiswa">
                </div>
                <table id="tabel_reward" style="width: 100%" class="table table-responsive-sm table-bordered table-striped table-sm">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama Prestasi</th>
                      <th>Nama</th>
                      <th>Tipe Prestasi</th>
                      <th>Level</th>
                      <th>Tanggal Kegiatan</th>
                      <th>Poin</th>
                      <!-- <th>Aksi</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($prestasi as $p){
                    ?>
                    <tr id="<?php echo $p->id_prestasi?>">
                      <td ><?php echo $p->nim; ?></td>
                      <td ><?php echo $p->nama_prestasi; ?></td>
                      <td ><?php echo $p->namalengkap; ?></td>
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
                      <td ><?php
                      $date=date_create($p->tgl_prestasi_start);
                      echo date_format($date,"d-M-Y");
                      ?></td>
                      <td title="Status Prestasi" name="status_prestasi" id="status_prestasi">
                      <?php
                      if ($p->validasi == "1") {
                          echo '<span class="badge badge-success">Poin : '.$p->poin.'</span>';
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
    tabel_reward =  $('#tabel_reward').DataTable( {
        "dom": 'lrtipB',
        "sScrollY": "500px",
        scrollCollapse: true,
        responsive: true,
        "bPaginate": true,
        "info":     true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      } );
      $('#cariReward').keyup(function(){
            tabel_reward.search($(this).val()).draw() ;
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

      if(<?php echo $status_select?>!=2){
        $('#status_select').val(<?php echo $status_select?>);
        $('#reset_status').html('Reset Status');
      }
      $( '.select_status' ).change(function() {
        var status_select = $('#status_select').val();
        document.location = "<?= base_url();?>Admin_reward/tabel/"+status_select;
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
