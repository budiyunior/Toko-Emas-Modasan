<?php $this->load->view('partials/header.php') ?>

<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    LOGO
                </small>
            </a>
            <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                <span class="sr-only">Toggle user menu</span>

                <img src="../assets/assets/avatars/user.jpg" alt="Jason's Photo" />
            </button>

            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
            <ul class="nav ace-nav">
                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue user-min">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="../../assets/assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Welcome,</small>
                            Jason
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li>
                            <a href="profile.html">
                                <i class="ace-icon fa fa-user"></i>
                                Profile
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-power-off"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

    </div>
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {}
    </script>

    <!-- #section:basics/sidebar.horizontal -->
    <div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {}
        </script>
        <ul class="nav nav-list">
            <?php foreach ($menu as $me) : ?>
                <li class="hover">
                    <a href="<?php echo $me->link_menu ?>">
                        <i class="menu-icon <?= $me->icon_class ?>"></i>
                        <span class="menu-text"> <?= $me->nama_menu ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {}
        </script>
    </div>
    <div class="main-content-inner">
        <div class="page-content">

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Sales
                    <button type="button" class="pull-right btn btn-primary">Refresh</button>
                </h1>
            </div><!-- /.page-header -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="center">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="check">
                                            <input type="checkbox" />
                                        </th>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No.Hp</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($sales as $s) : ?>
                                        <tr>
                                            <td class="check">
                                                <input type="checkbox" />
                                            </td>
                                            <th scope="col"><?= $i++ ?></th>
                                            <td class="id" scope="row"><?= $s->fc_salesid ?></td>
                                            <td scope="row"><?= $s->fv_nama ?></td>
                                            <td scope="row"><?= $s->fc_email ?></td>
                                            <td scope="row"><?= $s->fc_hp ?></td>
                                            <td scope="row"><?= $s->fc_aktif ?></td>
                                            <td scope="row"><?= $s->fv_mposisi ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="center">
                        <div class="row">
                            <div class="col-md-1" style="margin-top: 5px">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"> Tambah</i></button>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px">
                                <button type="button" class="btn btn-success" id="edit" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"> Edit</i></button>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px">
                                <button type="button" class="btn btn-danger" id="btnSubmit" ><i class="fa fa-trash"> Hapus</i></button>
                            </div>
                            <div class="md-form active-purple active-purple-2 mb-3">
                            </div>


                            <!-- Search form -->

                            <div class="col-md-3" style="margin-top: 5px">
                                <input class="form-control" type="text" placeholder="Cari" aria-label="Search">
                            </div>
                        </div>

                        <div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="<?= base_url('C_sales/save') ?>" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="fc_salesid" class="form-control" id="kode" placeholder="Kode">
                                                    <?= form_error('fc_salesid', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="fv_nama" id="nama" placeholder="Nama">
                                                    <?= form_error('fv_nama', '<small class="text-danger pl-3">', '</small>') ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-7">
                                                    <input type="email" class="form-control" name="fc_email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no.hp" class="col-sm-2 col-form-label">No.hp</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="fc_hp" id="no.hp" placeholder="No.hp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Sales</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="fc_aktif">
                                                        <option>--Pilih--</option>
                                                        <option value="Y">Aktif</option>
                                                        <option value="N">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-7">
                                                    <input type="date" name="fd_tgllahir" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" name="fc_kdposisi">
                                                        <option>--Pilih Jabatan--</option>
                                                        <?php foreach ($jabatan as $k) : ?>
                                                            <option value="<?= $k->fc_kdposisi ?>"><?= $k->fv_mposisi ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-md-1" style="margin-top: 5px">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Simpan</i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--MODAL EDIT-->
                        <?php foreach ($sales3 as $sls) : ?>
                            <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form>
                                            <div class="form-group row">
                                                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                                                <div class="col-sm-7">
                                                    <input type="text" name="fc_salesid" value="<?= $sls->fc_salesid ?>" class="form-control" id="kode" placeholder="Kode">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" value="<?= $sls->fv_nama ?>" name="fv_nama" id="nama" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="no.hp" class="col-sm-2 col-form-label">No.hp</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="no.hp" placeholder="No.hp">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Sales</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" required name="metode">
                                                        <option value="">Pilih </option>
                                                        <option name="Indomaret"> Janda </option>
                                                        <option name="Alfamart"> Duda </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="jabatan" placeholder="Jabatan">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="col-md-1" style="margin-top: 5px">
                                                    <button type="button" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


    <?php $this->load->view('partials/footer.php') ?>
    <script type="text/javascript">
        var checkedValue = document.querySelector('.checklist:checked').value;
        var checkedValue = $('.checklist:checked').val();
        var checkedValue = null;
        var inputElements = document.getElementsByClassName('checklist');
        for (var i = 0; inputElements[i]; ++i) {
            if (inputElements[i].checked) {
                checkedValue = inputElements[i].value;
                break;
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#edit').click(function() {

                $('.checklist:checked')
            })
        })
    </script>
    <?php $this->load->view('partials/js.php') ?>