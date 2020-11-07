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
                            <a href="<?php echo base_url('C_login/logout') ?>">
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
            <?php
            $id_level = $this->session->userdata('fc_userid');
            $main_menu = $this->db->join('mainmenu', 'mainmenu.idmenu=tab_akses_mainmenu.id_menu')
                ->where('tab_akses_mainmenu.fc_userid', $id_level)
                ->where('tab_akses_mainmenu.r', '1')
                ->order_by('mainmenu.idmenu', 'asc')
                ->get('tab_akses_mainmenu')
                ->result();
            foreach ($main_menu as $rs) {
            ?>
                <?php
                $row = $this->db->where('mainmenu_idmenu', $rs->idmenu)->get('submenu')->num_rows();
                if ($row > 0) {
                    $sub_menu = $this->db->join('submenu', 'submenu.id_sub=tab_akses_submenu.id_sub_menu')
                        ->where('submenu.mainmenu_idmenu', $rs->idmenu)
                        ->where('tab_akses_submenu.fc_userid', $id_level)
                        ->where('tab_akses_submenu.r', '1')
                        ->get('tab_akses_submenu')
                        ->result();
                ?>

                    <li class="hover">
                        <a class="dropdown-toggle">
                            <i class="menu-icon <?= $rs->icon_class ?>"></i>
                            <span class="menu-text">
                                <?= $rs->nama_menu ?>
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <?php
                        echo "<ul class='submenu'>";
                        foreach ($sub_menu as $rsub) {
                        ?>
                    <li class="hover">
                        <a href="<?= base_url() . $rsub->link_sub ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            <?= $rsub->nama_sub ?>
                        </a>

                        <b class="arrow"></b>
                    </li>


                <?php
                        }
                        echo "</ul>";
                    } else {
                ?>
                </li>
                <li class="hover">
                    <a href="<?= base_url() . $rs->link_menu ?>">
                        <i class="menu-icon <?= $rs->icon_class ?>"></i>
                        <span class="menu-text"><?= $rs->nama_menu ?> </span>
                    </a>

                    <b class="arrow"></b>
                </li>
        <?php
                    }
                }
        ?>
        <?php
        if ($id_level == 1) { ?>

        <?php
        }
        ?>


        </ul>

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
                            $sql = mysqli_query($koneksi, "SELECT  td_invoice.id, tm_invoice.fc_noinv, tm_invoice.fd_tglinv, td_invoice.fc_kdstock,tm_invoice.fm_subtot,tm_invoice.fm_grandtotal, sum(td_invoice.fn_berat) as berat  FROM tm_invoice,td_invoice  WHERE tm_invoice.fc_noinv = td_invoice.fc_noinv and fd_tglinv between '$tgl' AND '$tgl2' GROUP BY tm_invoice.fc_noinv");
                            // $sql = mysqli_query($koneksi, "SELECT * FROM tm_invoice WHERE fd_tglinv between '$tgl' AND '$tgl2'");
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
                            $sql = mysqli_query($koneksi, "SELECT  td_invoice.id, tm_invoice.fc_noinv, tm_invoice.fd_tglinv, td_invoice.fc_kdstock,tm_invoice.fm_subtot,tm_invoice.fm_grandtotal, sum(td_invoice.fn_berat) as berat  FROM tm_invoice,td_invoice  WHERE tm_invoice.fc_noinv = td_invoice.fc_noinv GROUP BY tm_invoice.fc_noinv");
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
                                <input type="text" class="form-control" readonly value="<?php echo number_format($berat['berat']) ?> gram">
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
                                            $no = 1;
                                            while ($lp = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $lp['fc_noinv'] ?></td>
                                                    <td>Rp. <?php echo number_format($lp['fm_subtot']);  ?></td>
                                                    <td>Rp. <?php echo number_format($lp['fm_grandtotal']);  ?></td>
                                                    <td>
                                                        <?php echo $lp['berat'] ?> gram
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
                <form action="" method="post">
                    <button type="submit" class="btn btn-success action-cetak"><i class="fa fa-print"> Cetak</i></button>
                </form>
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>


</div>

<script>
    $(".check-item").on("click", function() {
        if ($(".check-item:checked").length < 2) {
            $('.action-cetak').prop('disabled', false);
        } else {
            $('.action-cetak').prop('disabled', true);
        }
    });

    $(".action-cetak").on("click", function() {
        window.print();
    })

    $('.action-nota').click(function(e) {
        e.preventDefault();
        var arr = [];
        var checkedValue = $(".check-inv:checked").val();
        console.log('checked', checkedValue);
        //$('#tampilPenjualan').modal('show');
        // $.ajax({
        //     url: "<?php echo base_url('C_penjualan/tampil_nota/') ?>" + checkedValue,
        //     type: "GET",
        //     dataType: "JSON",
        //     success: function(result) {
        //         $('[name="fv_nmpelanggan_view"]').val(result.fv_nmpelanggan);
        //         $('[name="f_alamat_view"]').val(result.f_alamat);
        //         $('[name="fc_telp_view"]').val(result.fc_telp);
        //         $('[name="fv_nmbarang_view"]').val(result.fv_nmbarang);
        //         $('[name="f_foto_view"]').val(result.f_foto);
        //         $('[name="fc_kadar_view"]').val(result.fc_kadar);
        //         $('[name="ff_berat_view"]').val(result.ff_berat);
        //         $('[name="fm_ongkos_view"]').val(result.fm_ongkos);
        //         $('[name="fm_price_view"]').val(result.fm_price);
        //         $('[name="fm_grandtotal_view"]').val(result.fm_grandtotal);
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         alert('Data Eror');
        //     }
        // })
    });
</script>


<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/js.php') ?>