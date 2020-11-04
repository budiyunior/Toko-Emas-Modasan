<?php $this->load->view('partials/header.php') ?>
<?php
$koneksi =  mysqli_connect("localhost", "root", "", "tokoemas");
?>
<script type="text/javascript" src=" https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js "></script>

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
        <!-- <ul class="nav nav-list">
            <?php foreach ($menu as $me) : ?>
                <li class="hover">
                    <a href="<?php echo base_url($me->link_menu);  ?>">
                        <i class="menu-icon <?= base_url($me->icon_class);  ?>"></i>
                        <span class="menu-text"> <?= $me->nama_menu ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul> -->
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

                        <i class="menu-icon <?= $rs->icon_class ?>"></i>
                        <span class="menu-text">
                            <?= $rs->nama_menu ?>
                        </span>

                        <b class="arrow fa fa-angle-down"></b>

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
        <script type="text/javascript">
            try {
                ace.settings.check('sidebar', 'collapsed')
            } catch (e) {}
        </script>
    </div>
    <?php
    $bu = base_url();

    $fc_userid = $this->session->userdata('fc_userid');
    $get_menu = $this->M_barang->getMenu($this->uri->segment(1));
    $cr = $this->M_barang->getRole($fc_userid, 'r', $get_menu->idmenu)->r;
    $cc = $this->M_barang->getRole($fc_userid, 'c', $get_menu->idmenu)->r;
    $cu = $this->M_barang->getRole($fc_userid, 'u', $get_menu->idmenu)->r;
    $cd = $this->M_barang->getRole($fc_userid, 'd', $get_menu->idmenu)->r;

    ?>
    <div class="main-content-inner">
        <div class="page-content">

            <!-- /section:settings.box -->
            <div class="page-header">


                <div class="row">
                    <div class="col-md-3">
                        <h2 style="color: #07A1C8;">
                            Laporan Harian
                        </h2>
                    </div>
                    <div class="col-md-3">

                        <?php
                        $today = date("Y-m-d");
                        $yesterday = date("Y-m-d", strtotime("-1 days"));
                        $tomorrow = date("Y-m-d", strtotime("+1 days"));
                        ?>
                        <form method="get">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>Mulai Tanggal</label>
                                    <input type="date" name="date" class="form-control" value="<?= $today ?>" />
                                </div>
                                <br>
                                <div class="col-md-5">
                                    <div style="margin-top: 10px;">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.page-header -->
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="simple-table" class="table table-striped table-bordered table-hover">

                            <tr>
                                <th rowspan="2">Jenis</th>
                                <th colspan="2" scope="colgroup">Kemarin</th>
                                <th colspan="2" scope="colgroup">Laku</th>
                                <th colspan="2" scope="colgroup">Diambil</th>
                                <th colspan="2" scope="colgroup">Tambahan</th>
                                <th colspan="2" scope="colgroup">Total</th>

                            </tr>
                            <tr>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Berat</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Berat</th>
                            </tr>
                            <?php
                            if (isset($_GET['date'])) {

                                $tgl = $_GET['date'];
                                $tgl2 = date("$tgl", strtotime("-1 days"));
                                $tgl3 = date("$tgl", strtotime("+1 days"));
                                $row = mysqli_query($koneksi, "SELECT COUNT(fc_kdkelompok) as row FROM tm_kelompok ");
                                $countrow = mysqli_fetch_array($row);
                                for ($i = 1; $i <= $countrow['row']; $i++) {
                                    $v = "kl00$i";
                                    // jenis barang
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tm_kelompok where fc_kdkelompok = '$v'");
                                    $barang = mysqli_fetch_array($sql);
                                    //Kemarin
                                    $sql2 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$tgl2' and fc_kondisi = 0),'0') As jumlah");
                                    $sql3 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$tgl2' and fc_kondisi = 0),'0') As berat");
                                    $jumlah1 = mysqli_fetch_array($sql2);
                                    $berat1 = mysqli_fetch_array($sql3);
                                    //laku
                                    $sql4 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(td_invoice.fc_kdkelompok) from td_invoice, tm_invoice where tm_invoice.fc_noinv = td_invoice.fc_noinv and td_invoice.fc_kdkelompok = '$v' and tm_invoice.fd_tglinv = '$today' ),'0') As jumlah");
                                    $sql5 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(td_invoice.fn_berat) from td_invoice, tm_invoice where tm_invoice.fc_noinv = td_invoice.fc_noinv and td_invoice.fc_kdkelompok = '$v' and tm_invoice.fd_tglinv = '$today'  ),'0') As berat");
                                    $jumlah2 = mysqli_fetch_array($sql4);
                                    $berat2 = mysqli_fetch_array($sql5);
                                    //diambil
                                    $sql6 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 1),'0') As jumlah");
                                    $sql7 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 1),'0') As berat");
                                    $jumlah3 = mysqli_fetch_array($sql6);
                                    $berat3 = mysqli_fetch_array($sql7);
                                    //tambahan
                                    $sql8 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 0),'0') As jumlah");
                                    $sql9 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 0),'0') As berat");
                                    $jumlah4 = mysqli_fetch_array($sql8);
                                    $berat4 = mysqli_fetch_array($sql9);
                                    //total
                                    $sql10 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$tomorrow' and fc_kondisi = 0),'0') As jumlah");
                                    $sql11 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$tomorrow' and fc_kondisi = 0),'0') As berat");
                                    $jumlah5 = mysqli_fetch_array($sql10);
                                    $berat5 = mysqli_fetch_array($sql11);
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $barang['fv_nmkelompok']  ?></th>
                                        <td><?php echo $jumlah1['jumlah'] ?></td>
                                        <td><?php echo $berat1['berat'] ?></td>
                                        <td><?php echo $jumlah2['jumlah'] ?></td>
                                        <td><?php echo $berat2['berat'] ?></td>
                                        <td><?php echo $jumlah3['jumlah'] ?></td>
                                        <td><?php echo $berat3['berat'] ?></td>
                                        <td><?php echo $jumlah4['jumlah'] ?></td>
                                        <td><?php echo $berat4['berat'] ?></td>
                                        <td><?php echo $jumlah5['jumlah'] ?></td>
                                        <td><?php echo $berat5['berat'] ?></td>

                                    </tr>
                                <?php
                                }
                            } else {
                                $row = mysqli_query($koneksi, "SELECT COUNT(fc_kdkelompok) as row FROM tm_kelompok ");
                                $countrow = mysqli_fetch_array($row);
                                for ($i = 1; $i <= $countrow['row']; $i++) {
                                    $v = "kl00$i";
                                    // jenis barang
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tm_kelompok where fc_kdkelompok = '$v'");
                                    $barang = mysqli_fetch_array($sql);
                                    //Kemarin
                                    $sql2 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$today' and fc_kondisi = 0),'0') As jumlah");
                                    $sql3 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$today' and fc_kondisi = 0),'0') As berat");
                                    $jumlah1 = mysqli_fetch_array($sql2);
                                    $berat1 = mysqli_fetch_array($sql3);
                                    //laku
                                    $sql4 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(td_invoice.fc_kdkelompok) from td_invoice, tm_invoice where tm_invoice.fc_noinv = td_invoice.fc_noinv and td_invoice.fc_kdkelompok = '$v' and tm_invoice.fd_tglinv = '$today' ),'0') As jumlah");
                                    $sql5 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(td_invoice.fn_berat) from td_invoice, tm_invoice where tm_invoice.fc_noinv = td_invoice.fc_noinv and td_invoice.fc_kdkelompok = '$v' and tm_invoice.fd_tglinv = '$today'  ),'0') As berat");
                                    $jumlah2 = mysqli_fetch_array($sql4);
                                    $berat2 = mysqli_fetch_array($sql5);
                                    //diambil
                                    $sql6 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 1),'0') As jumlah");
                                    $sql7 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 1),'0') As berat");
                                    $jumlah3 = mysqli_fetch_array($sql6);
                                    $berat3 = mysqli_fetch_array($sql7);
                                    //tambahan
                                    $sql8 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 0),'0') As jumlah");
                                    $sql9 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date = '$today' and fc_kondisi = 0),'0') As berat");
                                    $jumlah4 = mysqli_fetch_array($sql8);
                                    $berat4 = mysqli_fetch_array($sql9);
                                    //total
                                    $sql10 = mysqli_query($koneksi, "SELECT IFNULL((select COUNT(fc_kdkelompok) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$tomorrow' and fc_kondisi = 0),'0') As jumlah");
                                    $sql11 = mysqli_query($koneksi, "SELECT IFNULL((select SUM(ff_berat) from tm_stock where fc_kdkelompok = '$v' and fd_date < '$tomorrow' and fc_kondisi = 0),'0') As berat");
                                    $jumlah5 = mysqli_fetch_array($sql10);
                                    $berat5 = mysqli_fetch_array($sql11);

                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $barang['fv_nmkelompok']  ?></th>
                                        <td><?php echo $jumlah1['jumlah'] ?></td>
                                        <td><?php echo $berat1['berat'] ?></td>
                                        <td><?php echo $jumlah2['jumlah'] ?></td>
                                        <td><?php echo $berat2['berat'] ?></td>
                                        <td><?php echo $jumlah3['jumlah'] ?></td>
                                        <td><?php echo $berat3['berat'] ?></td>
                                        <td><?php echo $jumlah4['jumlah'] ?></td>
                                        <td><?php echo $berat4['berat'] ?></td>
                                        <td><?php echo $jumlah5['jumlah'] ?></td>
                                        <td><?php echo $berat5['berat'] ?></td>

                                    </tr>
                            <?php }
                            }
                            ?>
                        </table>
                    </div>





                    <!-- <div class="col-sm-2">
                            <table id="simple-table" class="table table-striped table-bordered table-hover">

                                <tr>

                                    <th colspan="2" scope="colgroup">Kemarin</th>

                                </tr>
                                <tr>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Berat</th>
                                </tr>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT tm_kelompok.fc_kdkelompok, tm_kelompok.fv_nmkelompok, SUM(tm_stock.ff_berat) as berat, COUNT(tm_stock.fc_kdkelompok) as jumlah
                                                        FROM tm_stock,tm_kelompok 
                                                        WHERE tm_kelompok.fc_kdkelompok = tm_stock.fc_kdkelompok AND tm_stock.fd_date = '2020-10-19'
                                                        GROUP BY fc_kdkelompok");
                                while ($lp = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td><?php echo $lp['jumlah'] ?></td>
                                        <td><?php echo $lp['berat'] ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                </div> -->


                </div>

            </div>

        </div>


        <?php $this->load->view('partials/footer.php') ?>
        <?php $this->load->view('partials/js.php') ?>