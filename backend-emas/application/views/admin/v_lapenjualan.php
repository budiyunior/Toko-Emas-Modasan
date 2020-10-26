<?php $this->load->view('partials/header.php') ?>
<?php
$koneksi =  mysqli_connect("localhost", "root", "", "tokoemas");
?>

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
    <div id="sidebar" class="sidebar h-sidebar navbar-collapse collapse">
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'fixed')
            } catch (e) {}
        </script>
        <ul class="nav nav-list">
            <?php foreach ($menu as $me) : ?>
                <li class="hover">
                    <a href="<?php echo base_url($me->link_menu);  ?>">
                        <i class="menu-icon <?= base_url($me->icon_class);  ?>"></i>
                        <span class="menu-text"> <?= $me->nama_menu ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->

        <!-- /section:basics/sidebar.layout.minimize -->
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
                    <h2 style="color: #07A1C8;">
                        Laporan Penjualan
                    </h2>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="widget-box">

                            <div class="widget-body">
                                <div class="widget-main">
                                    <?php
                                    $today = date("Y-m-d");
                                    $yesterday = date("Y-m-d", strtotime("-1 days"));
                                    ?>
                                    <form method="get">
                                        <label>Mulai Tanggal</label>
                                        <input type="date" name="startdate" class="form-control" value="<?= $yesterday ?>" />
                                        <label>S/D Tanggal</label>
                                        <input type="date" name="enddate" class="form-control" value="<?= $today ?>" />
                                        <div style="margin-top: 10px;">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <?php
                        if (isset($_GET['startdate'])) {
                            $tgl = $_GET['startdate'];
                            $tgl2 = $_GET['enddate'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM tm_invoice WHERE fd_tglinv between '$tgl' AND '$tgl2'");
                            $sql2 = mysqli_query($koneksi, "SELECT SUM(fm_grandtotal) as gtotal FROM tm_invoice  WHERE  fd_tglinv between '$tgl' AND '$tgl2'");
                            $sql3 = mysqli_query($koneksi, "SELECT SUM(fm_subtot) as stotal FROM tm_invoice  WHERE  fd_tglinv between '$tgl' AND '$tgl2'");
                            $sql4 = mysqli_query($koneksi, "SELECT  SUM(fn_berat) as berat FROM tm_invoice, td_invoice WHERE tm_invoice.fc_noinv=td_invoice.fc_noinv and  fd_tglinv between '$tgl' AND '$tgl2'");
                            $sql5 = mysqli_query($koneksi, "SELECT COUNT(fc_noinv) as transaksi FROM tm_invoice WHERE fd_tglinv between '$tgl' AND '$tgl2'");
                            $gtotal = mysqli_fetch_array($sql2);
                            $stotal = mysqli_fetch_array($sql3);
                            $berat = mysqli_fetch_array($sql4);
                            $tran = mysqli_fetch_array($sql5);
                        }

                        // } else if (isset($_GET['shift'])){
                        //     $shift = $_GET['shift'];
                        //     $sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE shift = '$shift' ");
                        else {
                            $sql = mysqli_query($koneksi, "SELECT * FROM tm_invoice");
                            $sql2 = mysqli_query($koneksi, "SELECT SUM(fm_grandtotal) as gtotal FROM tm_invoice ");
                            $sql3 = mysqli_query($koneksi, "SELECT SUM(fm_subtot) as stotal FROM tm_invoice  ");
                            $sql4 = mysqli_query($koneksi, "SELECT SUM(fn_berat) as berat FROM tm_invoice, td_invoice WHERE tm_invoice.fc_noinv=td_invoice.fc_noinv ");
                            $sql5 = mysqli_query($koneksi, "SELECT COUNT(fc_noinv) as transaksi FROM tm_invoice ");
                            $gtotal = mysqli_fetch_array($sql2);
                            $stotal = mysqli_fetch_array($sql3);
                            $berat = mysqli_fetch_array($sql4);
                            $tran = mysqli_fetch_array($sql5);
                        }
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <form>
                            <div>
                                <label for="form-field-8">Transaksi</label>
                                <input type="text" class="form-control" readonly value="<?php echo $tran['transaksi'] ?>">
                            </div>
                            <div>
                                <label for="form-field-9">Berat</label>
                                <input type="text" class="form-control" readonly value="Rp. <?php echo number_format($berat['berat']) ?> KG">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <form>
                            <div>
                                <label for="form-field-8">Grand Total</label>
                                <input type="text" class="form-control" readonly value="Rp. <?php echo number_format($gtotal['gtotal']) ?>">
                            </div>
                            <div>
                                <label for="form-field-9">Sub Total</label>
                                <input type="text" class="form-control" readonly value="Rp. <?php echo number_format($stotal['stotal']) ?>">
                            </div>
                        </form>
                    </div>
                </div><!-- /.span -->
                <div class="row">
                    <div class="col-xs-12" style="margin-top: 30px;">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table id="simple-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Detail</th>
                                                <th>Subtotal</th>
                                                <th>Grand Total</th>
                                                <th>Berat</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($lp = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $lp['fc_noinv'] ?></td>
                                                    <td><?php echo $lp['fv_catatan'] ?></td>
                                                    <td>Rp. <?php echo number_format($lp['fm_subtot']);  ?></td>
                                                    <td>Rp. <?php echo number_format($lp['fm_grandtotal']);  ?></td>

                                                    <td class="hidden-480">
                                                        <span class="label label-sm label-warning">s</span>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-success"><i class="fa fa-print"> Cetak</i></a>
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>


</div>

<script>

</script>


<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/js.php') ?>