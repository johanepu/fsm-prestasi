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
                <table class="table table-responsive-sm table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Prestasi</th>
                      <th>Peringkat</th>
                      <th>Jenis</th>
                      <th>Level</th>
                      <th>Tanggal Ubahan</th>
                    </tr>
                  </thead>
                  <tbody id="tabel-prestasi">
                    <?php
                    $no = 1;
                    foreach($prestasi as $p){
                    ?>
                    <tr id="<?php echo $p->id_prestasi?>">
                      <td><?php echo $no++?></td>
                      <td title="Data ini tidak dapat di ubah" ><?php echo $p->nama_prestasi; ?></td>
                      <td title="Data ini tidak dapat di edit" ><?php echo $p->peringkat_prestasi; ?></td>
                      <td title="Data ini tidak dapat di edit" ><?php echo $p->jenis_prestasi; ?></td>
                      <td title="Data ini tidak dapat di edit" ><?php echo $p->level_prestasi; ?></td>
                      <td title="Data ini tidak dapat di edit" ><?php echo $p->date_modified; ?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </div>
            </div>
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
