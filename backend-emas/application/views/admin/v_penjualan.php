<?php $this->load->view('partials/header.php') ?>
<!-- #section:basics/navbar.layout -->
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
            <li class="  hover">
                <a href="home.html">
                    <i class="menu-icon fa fa-home"></i>
                    <span class="menu-text"> Home </span>
                </a>
            </li>

            <li class="  hover">
                <a href="hal_barang.html">
                    <i class="menu-icon fa fa-inbox"></i>
                    <span class="menu-text"> Barang </span>
                </a>
            </li>

            <li class="  hover">
                <a href="hal_pelanggan.html">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text">
                        Pelanggan
                    </span>
                </a>
            </li>

            <li class="hover">
                <a href="hal_sales.html">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
                        Sales
                    </span>
                </a>
            </li>

            <li class="active hover">
                <a href="hal_penjualan.html">
                    <i class=" menu-icon fa fa-bar-chart"></i>
                    <span class="menu-text">
                        Penjualan
                    </span>
                </a>
            </li>

            <li class="  hover">
                <a href="hal_pembelian.html">
                    <i class="menu-icon fa fa-pie-chart"></i>
                    <span class="menu-text">
                        Pembelian
                    </span>
                </a>
            </li>
            <li class="hover">
                <a href="laporan_penjualan.html">
                    <i class="menu-icon fa fa-cart-plus"></i>
                    <span class="menu-text">
                        Lap. Jual
                    </span>
                </a>
            </li>
            <li class="hover">
                <a href="laporan_pembelian.html">
                    <i class="menu-icon fa fa-cart-arrow-down"></i>
                    <span class="menu-text">
                        Lap. Beli
                    </span>
                </a>
            </li>
            <li class="hover">
                <a href="pengaturan.html">
                    <i class="menu-icon fa fa-cog"></i>
                    <span class="menu-text">
                        Pengaturan
                    </span>
                </a>
            </li>



        </ul><!-- /.nav-list -->

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
                <div class="page-header">
                    <h1>
                        Penjualan

                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <button type="button" data-toggle="modal" data-target="#tampilPenjualan" class="btn btn-success"><i class="fa fa-print"> Penjualan</i></button>

                        <!-- Modal -->
                        <div class="modal fade" id="tampilPenjualan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Penjualan</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form>
                                                    <div class="col-md-4">

                                                    </div>
                                                    <div class="col-md-3 ">

                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Faktur</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal</label>
                                                            <?php
                                                            $tgl = date("Y-m-d");
                                                            ?>
                                                            <div class="col-sm-8">
                                                                <input type="date" class="form-control" id="inputPassword" value="<?= $tgl ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Pelanggan</label>
                                                            <div class="col-sm-6">
                                                                <select class="form-control " required name="metode">
                                                                    <?php $i = 1;
                                                                    foreach ($pelanggan as $p) : ?>
                                                                        <option name="<?= $p->fv_nmpelanggan ?>"><?= $p->fv_nmpelanggan ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahpelanggan">
                                                                    <i class=" ace-icon glyphicon glyphicon-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>


                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Uraian Barang</th>
                                                    <th scope="col">Berat</th>
                                                    <th scope="col">Kadar</th>
                                                    <th scope="col">Harga Per Gram</th>
                                                    <th scope="col">Ongkos</th>
                                                    <th scope="col">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>Kotak</td>
                                                    <td>1Kg</td>
                                                    <td>10%</td>
                                                    <td>10.000</td>
                                                    <td class="hidden-480">
                                                        <span class="label label-sm label-warning">Expiring</span>
                                                    </td>
                                                    <td>10.000</td>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group row">
                                                            <div class="col-sm-1">
                                                            </div>
                                                            <label for="inputPassword" class="col-sm-3 col-form-label">Subtotal</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-1">
                                                            </div>
                                                            <label for="inputPassword" class="col-sm-3 col-form-label">GrandTotal</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">

                                                            <label for="inputPassword" class="col-sm-2 col-form-label">Terbilang</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- /section:settings.box -->

                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <!-- Modal -->
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

                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div>
        </div><!-- /.main-content -->
    </div>
</div>


<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/js.php') ?>