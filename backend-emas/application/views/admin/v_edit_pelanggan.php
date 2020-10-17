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
                    Edit Pelanggan
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <form>
                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                            <div class="col-sm-7">
                                <input type="text" value="<?= $data->fc_salesid ?>" name="fc_kdpel" class="form-control" id="kode" placeholder="Kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" value="<?= $data->fv_nmpelanggan ?>" name="fv_nmpelanggan" id="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no.hp" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="f_alamat" value="<?= $data->f_alamat ?>" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no.hp" class="col-sm-2 col-form-label">No. hp</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="fc_telp" value="<?= $data->fc_telp ?>" placeholder="No.hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no.ktp" class="col-sm-2 col-form-label">No. KTP</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="fc_noktp" value="<?= $data->fc_noktp ?>" placeholder="No. KTP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="f_keterangan" value="<?= $data->f_keterangan ?>" placeholder="f_keterangan">
                            </div>
                        </div>
                        <div class="col-md-1" style="margin-top: 5px; margin-left: 16%;">
                            <button type="button" class="btn btn-primary"><i class="fa fa-edit"> Edit</i></button>
                        </div>
                    </form>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div><!-- /.main-content -->

    <?php $this->load->view('partials/footer.php') ?>
    <?php $this->load->view('partials/js.php') ?>