
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">User</li>
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
              <div class="card text-white bg-info">
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
                  <h1 class="mb-0"><?php echo $jml_reward_point; ?></h1>
                  <p>Reward Point</p>
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
                    Review Prestasi Anda
                  </div>
                  <div class="card-body">
                    <h5 class="mb-0">Berdasarkan Tingkat Prestasi</h5>
                    <ul class="horizontal-bars type-2">
                      <li>
                        <i class="icon-globe"></i>
                        <span class="title">Lokal</span>
                        <span class="value"><?php echo $jml_prestasi_lokal; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $jml_prestasi_lokal; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="icon-social-facebook"></i>
                        <span class="title">Nasional</span>
                        <span class="value"><?php echo $jml_prestasi_nasional; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $jml_prestasi_nasional; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="icon-social-twitter"></i>
                        <span class="title">Regional</span>
                        <span class="value"><?php echo $jml_prestasi_regional; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div class="progress-bar bg-success" role="progressbar" style=<?php echo "width: $jml_prestasi_regional% ";?> aria-valuenow="<?php echo $jml_prestasi_regional; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                      <li>
                        <i class="icon-social-linkedin"></i>
                        <span class="title">Internasional</span>
                        <span class="value"><?php echo $jml_prestasi_internasional; ?>
                        </span>
                        <div class="bars">
                          <div class="progress progress-xs">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="<?php echo $jml_prestasi_internasional; ?>" aria-valuemin="0" aria-valuemax="<?php echo $jml_prestasi; ?>"></div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>


        <!--/.row-->



    </div>
    <!-- /.conainer-fluid -->
  </main>

</body>
