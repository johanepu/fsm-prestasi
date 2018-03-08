
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Admin</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Admin_setting'); ?>">Pengaturan Akademik</a></li>

    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> Pengaturan isian prestasi
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="tab" href="#list-home" role="tab" aria-controls="list-home" aria-selected="true">Tahun Akademik</a>
                      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="tab" href="#list-profile" role="tab" aria-controls="list-profile">Data Prestasi</a>
                      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="tab" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
                      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="tab" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
                    </div>
                  </div>
                  <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade active show" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="select2">Set Periode</label>
                          <div class="col-md-9">
                            <select id="select2" name="select2" class="form-control form-control-lg">
                              <option value="0">Pilih tahun akademik</option>
                              <option value="2017/2018">2017/2018</option>
                              <option value="2018/2019">2018/2019</option>
                              <option value="2019/2020">2019/2020</option>
                              <option value="2020/2021">2020/2021</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="select2">Set Semester</label>
                          <div class="col-md-9">
                            <select id="select2" name="select2" class="form-control form-control-lg">
                              <option value="0">Pilih semester</option>
                              <option value="Ganjil">Ganjil</option>
                              <option value="Genap">Genap</option>
                            </select>
                          </div>
                        </div>
                        <div style="text-align:right">
                          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan Pengaturan</button>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="form-group col-sm-4">
                          <label for="postal-code">Reset Reward Point</label>
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-exclamation-triangle"></i> Reset Poin</button>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <p>Ut ut do pariatur aliquip aliqua aliquip exercitation do nostrud commodo reprehenderit aute ipsum voluptate. Irure Lorem et laboris nostrud amet cupidatat cupidatat anim do ut velit mollit consequat enim tempor. Consectetur est
                          minim nostrud nostrud consectetur irure labore voluptate irure. Ipsum id Lorem sit sint voluptate est pariatur eu ad cupidatat et deserunt culpa sit eiusmod deserunt. Consectetur et fugiat anim do eiusmod aliquip nulla laborum
                          elit adipisicing pariatur cillum.</p>
                      </div>
                      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <p>Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore
                          aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor
                          eiusmod eu pariatur culpa mollit in irure.</p>
                      </div>
                    </div>
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
