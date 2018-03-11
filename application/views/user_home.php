
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


          <?php if ($jml_prestasi <= 0): ?>
            <div class="col-sm-12 col-xl-12">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> Notifikasi
                </div>
                <div class="card-body">
                  <div class="jumbotron">
                    <h1 class="display-3">Selamat Datang !</h1>
                    <p class="lead">RewardMe merupakan sistem pendataan mahasiswa berprestasi FSM, sistem ini juga menghitung <u>Reward Point</u>
                      yang nantinya menjadi bahan pertimbangan keperluan akademis dan penilaian mahasiswa.</p>
                    <hr class="my-4">
                    <p>Anda belum memiliki prestasi di sistem. Silakan klik tombol "Tambah Prestasi" untuk mulai menambah prestasi atau "Edit Profil" untuk melengkapi profil anda.</p>
                    <p>Kelengkapan profil/biodata anda akan menjadi pertimbangan validasi prestasi anda.</p>
                    <p class="lead">
                      <a class="btn btn-primary btn-lg" href="<?php echo site_url('Prestasi/addPrestasi'); ?>" role="button">Tambah Prestasi</a>
                      <a class="btn btn-danger btn-lg" href="<?php echo site_url('User_profile'); ?>" role="button">Lengkapi Profil</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php else: ?>
            <!-- dashboard prestasi yg ada -->
            <div class="row">
              <div class="col-sm-12 col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Pengumuman Sistem
                    <div class="card-actions">
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="jumbotron">
                      <h1 class="display-3" id="preview_judul">Preview Judul</h1>
                      <p class="lead" id="preview_pengumuman">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                      <hr class="my-4">
                      <div class="row">
                        <div class="col-md-4 col-sm-4">
                          <div class="card bg-primary">
                            <div class="card-body text-center">
                              <div class="text-muted small text-uppercase font-weight-bold">Periode Akademik</div>
                              <div class="h2 py-3" id="preview_periode">Tahun Akademik</div>
                            </div>
                          </div>
                        </div>
                        <!--/.col-->
                        <div class="col-md-4 col-sm-4">
                          <div class="card bg-primary">
                            <div class="card-body text-center">
                              <div class="text-muted small text-uppercase font-weight-bold">Semester</div>
                              <div class="h2 py-3" id="preview_semester">Semester Sekarang</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="card bg-primary">

                              <a  type="button" class=" btn btn-success card-body text-center" href="<?php echo site_url('Prestasi/addPrestasi'); ?>">
                                <i class="fa fa-plus"></i>&nbsp; Tambah Prestasi</a>
                              <a  type="button" class=" btn btn-danger card-body text-center" href="<?php echo site_url('User_profile'); ?>">
                                <i class="fa fa-user"></i>&nbsp; Lihat Profil</a>

                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

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
                  </div>
                </div>
              </div>
        <!--/.row-->
          <?php endif; ?>




    </div>
    <!-- /.conainer-fluid -->
  </main>

</body>
<script type="text/javascript">
  $(document).ready(function(){
      $.ajax({
        type: "POST",
        url: '<?=base_url()?>Admin_setting/fetchSetting',
        dataType:'json',
        success: function(data){
          console.log(data);
          if(data)
          {
            var stg = data[0];
              $('#preview_judul').html(stg.judul_pengumuman);
              $('#preview_pengumuman').html(stg.pesan_admin);
              $('#preview_periode').html(stg.periode);
              $('#preview_semester').html(stg.semester);
              $('#select_periode').val(stg.periode);
              $('#select_semester').val(stg.semester);
              $('#input_judul').val(stg.judul_pengumuman);
              $('#input_isi').val(stg.pesan_admin);
          }
        }
      });
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
    })
</script>
