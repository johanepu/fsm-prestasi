
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('User_home'); ?>">Dashboard</a></li>

    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">


            <!-- dashboard prestasi yg ada -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-primary">
                <div class="card-body pb-0">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="<?php echo site_url('Prestasi/addPrestasi'); ?>">Tambah Prestasi</a>
                      <a class="dropdown-item" href="<?php echo site_url('prestasi'); ?>">Lihat Data Prestasi</a>
                    </div>
                  </div>
                  <h1 class="mb-0"><?php echo $jml_prestasi; ?></h1>
                  <p>Prestasi Terdata</p>
                </div>
                <div class="chart-wrapper px-3" style="height:70px;">
                  <canvas id="card-chart1" class="chart" height="70"></canvas>
                </div>
              </div>
            </div>
            <!-- dashboard validasi -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-success">
                <div class="card-body pb-0">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="<?php echo site_url('Prestasi/addPrestasi'); ?>">Tambah Prestasi</a>
                      <a class="dropdown-item" href="<?php echo site_url('prestasi'); ?>">Lihat Data Prestasi</a>
                    </div>
                  </div>
                  <h1 class="mb-0"><?php echo $jml_prestasi_validasi; ?></h1>
                  <p>Prestasi Tervalidasi</p>
                </div>
                <div class="chart-wrapper" style="height:70px;">
                  <canvas id="card-chart3" class="chart" height="70"></canvas>
                </div>
              </div>
            </div>
            <!-- dashboard belum verifikasi -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-danger">
                <div class="card-body pb-0">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="<?php echo site_url('Prestasi/addPrestasi'); ?>">Tambah Prestasi</a>
                      <a class="dropdown-item" href="<?php echo site_url('prestasi'); ?>">Lihat Data Prestasi</a>
                    </div>
                  </div>
                  <h1 class="mb-0"><?php echo $jml_prestasi_blmvalidasi; ?></h1>
                  <p>Prestasi Belum Tervalidasi</p>
                </div>
                <div class="chart-wrapper px-3" style="height:70px;">
                  <canvas id="card-chart4" class="chart" height="70"></canvas>
                </div>
              </div>
            </div>
              <!-- dashboard reward point -->
            <div class="col-sm-6 col-lg-3">
              <div class="card text-white bg-warning">
                <div class="card-body pb-0">
                  <div class="btn-group float-right">
                    <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="<?php echo site_url('Prestasi/addPrestasi'); ?>">Tambah Prestasi</a>
                      <a class="dropdown-item" href="<?php echo site_url('prestasi'); ?>">Lihat Data Prestasi</a>
                    </div>
                  </div>
                  <h1 class="mb-0"><?php echo $jml_user; ?></h1>
                  <p>Mahasiswa Terdata</p>
                </div>
                <div class="chart-wrapper px-3" style="height:70px;">
                  <canvas id="card-chart2" class="chart" height="70"></canvas>
                </div>
              </div>
            </div>
        </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    Pemetaan Prestasi
                  </div>
                  <div class="card-body">
                    <h5 class="mb-0">Berdasarkan Tingkat Prestasi</h5>
                    <ul class="horizontal-bars type-2">
                      <li>
                        <i class="icon-location-pin"></i>
                        <span class="title">Lokal</span>
                        <span class="value"><?php echo $jml_prestasi_lokal; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div id="lokal_bar" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="<?php echo $jml_prestasi_lokal; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="icon-map"></i>
                        <span class="title">Nasional</span>
                        <span class="value"><?php echo $jml_prestasi_nasional; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div id="nasional_bar" class="progress-bar bg-success" role="progressbar"style="width: 0%" aria-valuenow="<?php echo $jml_prestasi_nasional; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="icon-plane"></i>
                        <span class="title">Regional</span>
                        <span class="value"><?php echo $jml_prestasi_regional; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div id="regional_bar" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="<?php echo $jml_prestasi_regional; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="icon-globe"></i>
                        <span class="title">Internasional</span>
                        <span class="value"><?php echo $jml_prestasi_internasional; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div id="internasional_bar" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="<?php echo $jml_prestasi_internasional; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <ul class="horizontal-bars type-2">
                    <li class="divider text-center">
                      <button type="button" class="btn btn-sm btn-link text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="show more"><i class="icon-options"></i></button>
                    </li>
                    </ul>
                    <h5 class="mb-0">Berdasarkan Jenis dan Tipe Prestasi</h5>
                    <ul class="horizontal-bars">
                      <li>
                        <div class="title">
                          Jenis Prestasi
                        </div>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div id="akademik_bar" class="progress-bar bg-info" role="progressbar" style="width:0%" aria-valuenow="<?php echo $jml_prestasi_akademik; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                          <div class="progress progress-xs">
                            <div id="non_akademik_bar" class="progress-bar bg-danger" role="progressbar" style="width:0%" aria-valuenow="<?php echo $jml_prestasi_non_akademik; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li class="legend">
                        <span class="badge-pill badge-info"><?php echo $jml_prestasi_akademik; ?></span>
                        <small>Akademik</small> &nbsp;
                        <span class="badge-pill badge-danger"><?php echo $jml_prestasi_non_akademik; ?></span>
                        <small>Non-Akademik</small>
                      </li>
                      <li>
                        <div class="title">
                          Tipe Prestasi
                        </div>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div id="individu_bar" class="progress-bar bg-success" role="progressbar" style="width:0%" aria-valuenow="<?php echo $jml_prestasi_individu; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                          <div class="progress progress-xs">
                            <div id="beregu_bar" class="progress-bar bg-warning" role="progressbar" style="width0%" aria-valuenow="<?php echo $jml_prestasi_beregu; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li class="legend">
                      <span class="badge-pill badge-success"><?php echo $jml_prestasi_individu; ?></span>
                      <small>Individu</small> &nbsp;
                      <span class="badge-pill badge-warning"><?php echo $jml_prestasi_beregu; ?></span>
                      <small>Beregu</small>
                      </li>
                    </ul>

                    <br>
                    <h5 class="mb-0">Ranking Prestasi</h5>
                    <br>
                    <table id="mhs_dashboard"class="table table-responsive-sm table-hover table-outline mb-0">
                      <thead class="thead-light">
                        <tr>
                          <th class="text-center"><i class="icon-people"></i></th>
                          <th>Mahasiswa</th>
                          <th>Departemen</th>
                          <th>Jumlah Prestasi</th>
                          <th>Reward Point</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($user as $p => $mhs){
                        ?>
                        <tr>
                          <td class="text-center">
                            <div class="avatar">
                              <img src="<?php echo base_url(); ?>assets/src/img/avatars/1.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                            </div>
                          </td>
                          <td>
                            <div><?php echo $mhs->namalengkap; ?></div>
                            <div class="small text-muted">
                              Akun Dibuat :<?php echo $mhs->date_created; ?>
                            </div>
                          </td>
                          <td  title="Departemen" name="departemen" id="departemen">
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
                            ?>
                          </td>
                          <td>
                            <div class="clearfix">
                              <div class="float-left">
                                <strong><?php echo $jml_prestasi_user[$p]; ?></strong>
                              </div>
                              <div class="float-right">
                              </div>
                            </div>
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-success" id="<?php echo $mhs->nim?>" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                            </div>
                          </td>
                          <td>
                            <?php
                            if ($reward_poin[$p] <= "10") {
                              echo '<h5><span class="badge badge-danger">'.$reward_poin[$p].'</span></h5>';
                            }else {
                              echo '<h5><span class="badge badge-success">'.$reward_poin[$p].'</span></h5>';
                            }
                            ?>

                          </td>
                        </tr>
                        <?php }?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        <!--/.row-->




    </div>
    <!-- /.conainer-fluid -->
  </main>

</body>
<script type="text/javascript">
  $(document).ready(function(){

    $('#mhs_dashboard').dataTable( {
    "scrollY": "350px",
    "scrollCollapse": true,
    "bFilter" :false,
    "order": [[ 3, "desc" ]],
    "paging": false
  } );

    var cek = <?php echo $jml_user; ?> ;
    // console.log($cek);
    // progress bar tingkat prestasi
    var lokal_bar=(<?php echo $jml_prestasi_lokal; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#lokal_bar').css('width', lokal_bar + "%");
    var nasional_bar=(<?php echo $jml_prestasi_nasional; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#nasional_bar').css('width', nasional_bar + "%");
    var regional_bar=(<?php echo $jml_prestasi_regional; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#regional_bar').css('width', regional_bar + "%");
    var internasional_bar=(<?php echo $jml_prestasi_internasional; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#internasional_bar').css('width', internasional_bar + "%");

    // progress bar jensi tipe prestasi
    var akademik_bar=(<?php echo $jml_prestasi_akademik; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#akademik_bar').css('width', akademik_bar + "%");
    var non_akademik_bar=(<?php echo $jml_prestasi_non_akademik; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#non_akademik_bar').css('width', non_akademik_bar + "%");
    var individu_bar=(<?php echo $jml_prestasi_individu; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#individu_bar').css('width', individu_bar + "%");
    var beregu_bar=(<?php echo $jml_prestasi_beregu; ?>/<?php echo $jml_prestasi; ?>*100);
    $('#beregu_bar').css('width', beregu_bar + "%");



      <?php
      foreach($user as $p => $mhs){
        echo "
        var prestasi_bar=($jml_prestasi_user[$p]/$jml_prestasi*100);
        $('#$mhs->nim').css('width', prestasi_bar + '%');
        ";
      }
      ?>
    })
</script>
