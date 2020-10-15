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

                <img src="../../assets/assets/avatars/user.jpg" alt="Jason's Photo" />
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
    <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse">
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
        </ul>

        <!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {}
        </script>

    </div>

    <!-- /section:basics/sidebar.horizontal -->
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">

                <!-- /section:settings.box -->
                <div class="page-header">
                    <h1>
                        Pelanggan
                        <button type="button" class="pull-right btn btn-primary">Refresh</button>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="center">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No </th>
                                            <th scope="col">Kode </th>
                                            <th scope="col">Nama </th>
                                            <th scope="col">Alamat </th>
                                            <th scope="col">No. Telp </th>
                                            <th scope="col">Keterangan </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($pelanggan as $p) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $p->fc_kdpel; ?></td>
                                                <td><?= $p->fv_nmpelanggan; ?></td>
                                                <td><?= $p->f_alamat; ?></td>
                                                <td><?= $p->fc_telp; ?></td>
                                                <td><?= $p->f_keterangan; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-1" style="margin-top: 5px;">
                                    <a href="" data-toggle="modal" data-target="#tambahpelanggan" class="btn btn-primary">Tambah</a>
                                </div>
                                <div class="col-md-1" style="margin-top: 5px;">
                                    <a href="" data-toggle="modal" data-target="#editpelanggan" class="btn btn-success">Edit</a>
                                </div>
                                <div class="col-md-1" style="margin-top: 5px;">
                                    <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-danger">Hapus</a>
                                </div>
                                <div class="col-md-2" style="margin-top: 5px;">
                                    <form action="">
                                        <input type="text" class="form-control" placeholder="Cari">
                                    </form>
                                </div>
                                <!-- ISI DISINI -->
                                <div class="modal fade" id="tambahpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <form>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Kode</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Nama</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">No Hp</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">No KTP</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Keterangan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-primary ">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="editpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <form>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Kode</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Nama</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="date" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">No Hp</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">No KTP</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">Keterangan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-primary ">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/js.php') ?>