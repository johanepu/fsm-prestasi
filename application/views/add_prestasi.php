

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <!-- Main content -->
  <main class="main">

    <!-- Breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item"><a href="<?php echo site_url('Prestasi'); ?>">Data Prestasi</a></li>
      <li class="breadcrumb-item">Tambah Prestasi</li>
    </ol>

    <div class="container-fluid">

      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <strong>Tambah</strong>
                Data Prestasi
              </div>
              <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Static</label>
                    <div class="col-md-9">
                      <p class="form-control-static">Username</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">Text Input</label>
                    <div class="col-md-9">
                      <input type="text" id="text-input" name="text-input" class="form-control" placeholder="Text">
                      <span class="help-block">This is a help text</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="email-input">Email Input</label>
                    <div class="col-md-9">
                      <input type="email" id="email-input" name="email-input" class="form-control" placeholder="Enter Email">
                      <span class="help-block">Please enter your email</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password-input">Password</label>
                    <div class="col-md-9">
                      <input type="password" id="password-input" name="password-input" class="form-control" placeholder="Password">
                      <span class="help-block">Please enter a complex password</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="disabled-input">Disabled Input</label>
                    <div class="col-md-9">
                      <input type="text" id="disabled-input" name="disabled-input" class="form-control" placeholder="Disabled" disabled="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="textarea-input">Textarea</label>
                    <div class="col-md-9">
                      <textarea id="textarea-input" name="textarea-input" rows="9" class="form-control" placeholder="Content.."></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="select1">Select</label>
                    <div class="col-md-9">
                      <select id="select1" name="select1" class="form-control">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="select2">Select Large</label>
                    <div class="col-md-9">
                      <select id="select2" name="select2" class="form-control form-control-lg">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="select3">Select Small</label>
                    <div class="col-md-9">
                      <select id="select3" name="select3" class="form-control form-control-sm">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="disabledSelect">Disabled Select</label>
                    <div class="col-md-9">
                      <select id="disabledSelect" class="form-control" disabled="">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="multiple-select">Multiple select</label>
                    <div class="col-md-9">
                      <select id="multiple-select" name="multiple-select" class="form-control" size="5" multiple="">
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                        <option value="4">Option #4</option>
                        <option value="5">Option #5</option>
                        <option value="6">Option #6</option>
                        <option value="7">Option #7</option>
                        <option value="8">Option #8</option>
                        <option value="9">Option #9</option>
                        <option value="10">Option #10</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Radios</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="radio1" id="radio1" name="radios">
                        <label class="form-check-label" for="radio1">
                          Option 1
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="radio2" id="radio2" name="radios">
                        <label class="form-check-label" for="radio2">
                          Option 2
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" value="radio2" id="radio3" name="radios">
                        <label class="form-check-label" for="radio3">
                          Option 3
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Inline Radios</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" id="inline-radio1" value="option1" name="inline-radios">
                        <label class="form-check-label" for="inline-radio1">One</label>
                      </div>
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" id="inline-radio2" value="option2" name="inline-radios">
                        <label class="form-check-label" for="inline-radio2">Two</label>
                      </div>
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="radio" id="inline-radio3" value="option3" name="inline-radios">
                        <label class="form-check-label" for="inline-radio3">Three</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Checkboxes</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="" id="check1">
                        <label class="form-check-label" for="check1">
                          Option 1
                        </label>
                      </div>
                      <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="" id="check2">
                        <label class="form-check-label" for="check2">
                          Option 2
                        </label>
                      </div>
                      <div class="form-check checkbox">
                        <input class="form-check-input" type="checkbox" value="" id="check3">
                        <label class="form-check-label" for="check3">
                          Option 3
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Inline Checkboxes</label>
                    <div class="col-md-9 col-form-label">
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="checkbox" id="inline-checkbox1" value="check1">
                        <label class="form-check-label" for="inline-checkbox1">One</label>
                      </div>
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="checkbox" id="inline-checkbox2" value="check2">
                        <label class="form-check-label" for="inline-checkbox2">Two</label>
                      </div>
                      <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" type="checkbox" id="inline-checkbox3" value="check3">
                        <label class="form-check-label" for="inline-checkbox3">Three</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="file-input">File input</label>
                    <div class="col-md-9">
                      <input type="file" id="file-input" name="file-input">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="file-multiple-input">Multiple File input</label>
                    <div class="col-md-9">
                      <input type="file" id="file-multiple-input" name="file-multiple-input" multiple="">
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
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
