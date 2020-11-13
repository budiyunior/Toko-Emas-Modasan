<?php $this->load->view('partials/header.php') ?>
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
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
                        <img class="nav-user-photo" src="<?php base_url() ?>assets/assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Welcome,</small>
                            <?= $this->session->userdata('fv_username') ?>
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
                    <div class="col-md-1">
                        <h2 style="color: #07A1C8;">
                            Barang
                        </h2>
                    </div>
                    <div class="col-md-3"></div>
                    <form action="<?= base_url('C_barang/cobafilter') ?>" method="get">
                        <div class="col-md-2">
                            <label>Kadar</label>
                            <select class="form-control" id="kadar" name="fc_kadar">
                                <option value="">--Pilih--</option>
                                <option value="40" <?php if ($tkd == "40") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>40%</option>
                                <option value="70" <?php if ($tkd == "70") {
                                                        echo "selected=\"selected\"";
                                                    } ?>>70%</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Kelompok</label>
                            <select class="form-control" id="kelompok" name="fc_kdkelompok">
                                <option value="">--Pilih--</option>
                                <?php $i = 1;
                                foreach ($kelompok2 as $k) : ?>
                                    <option <?php if ($tkl == $k->fc_kdkelompok) {
                                                echo 'selected="selected"';
                                            } ?> value="<?= $k->fc_kdkelompok ?>"><?= $k->fv_nmkelompok ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Lokasi</label>
                            <select class="form-control" id="lokasi" name="fc_kdlokasi">
                                <option value="">--Pilih--</option>
                                <?php $i = 1;
                                foreach ($lokasi2 as $l) : ?>
                                    <option <?php if ($l->fc_kdlokasi == $tlk) {
                                                echo 'selected="selected"';
                                            } ?> value="<?= $l->fc_kdlokasi ?>"><?= $l->fv_nmlokasi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"> Filter</i></button>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a href="<?= base_url('C_barang') ?>" class="btn btn-success"><i class="fa fa-undo"> Refresh</i></a>
                        </div>
                    </form>
                </div>

            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="center">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabel_barang">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            Checklist
                                        </th>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kelompok</th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Berat Gram</th>
                                        <th scope="col">Kadar %</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Sales</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo form_open('C_barang/delete'); ?>
                                    <?php
                                    $no = $this->uri->segment('3') + 1;
                                    foreach ($barang as $s) : ?>
                                        <tr>
                                            <td class="check">
                                                <input type="checkbox" class="check-item" name="id[]" value="<?= $s->fn_id ?>">
                                            </td>
                                            <th scope="col"><?= $no++ ?></th>
                                            <td scope="row"><?= $s->fc_kdstock ?></td>
                                            <td scope="row"><?= $s->fv_nmbarang ?></td>
                                            <td scope="row"><?= $s->fv_nmkelompok ?></td>
                                            <td scope="row"><?= $s->fv_nmlokasi ?></td>
                                            <td scope="row"><?= $s->ff_berat ?></td>
                                            <td scope="row"><?= $s->fc_kadar ?></td>
                                            <td scope="row"><?= $s->fm_hargabeli ?></td>
                                            <td scope="row"><?= $s->fv_nama ?></td>
                                            <td scope="row"><?= $s->fc_sts ?></td>
                                            <td scope="row"><?= $s->fd_date ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <th class="center">TOTAL</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="center"><?= round($jmlberat->ff_berat, 3) ?> Gram</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="">
                                    <!--Tampilkan pagination-->
                                    <?php echo $pagination; ?>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-1" style="margin-top: 5px;">
                                <?php if ($cc == '1') { ?>
                                    <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"> Tambah</i></a>
                                <?php } ?>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px;">
                                <?php if ($cu == '1') { ?>
                                    <button type="button" class="btn btn-success update"><i class="fa fa-edit"> Edit</i></button>
                                <?php } ?>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px;">
                                <?php if ($cd == '1') { ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('anda yakin mengambil data barang ?')"><i class="fa fa-upload"></i> Diambil</button>
                                <?php } ?>
                            </div>
                            <?= form_close(); ?>
                            <div class="col-md-2" style="margin-top: 5px;">
                                <form action="">
                                    <input type="text" class="form-control" placeholder="Cari">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal tambah -->
                    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title center" id="exampleModalLabel">Form Barang</h5>

                                </div>
                                <form method="post" action="<?= base_url('C_barang/save_barang') ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="fn_id" id="fn_idbarang" class="form-control">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <?php
                                                    $tgl = date("Y-m-d");
                                                    ?>
                                                    <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="fd_date" id="tgl_1" class="form-control" value="<?= $tgl ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Kode</label>
                                                    <div class="col-sm-7">
                                                        <input type="hidden" name="fc_barcode" id="fc_barcode" class="form-control" value="<?php echo $kode_barcode ?>">
                                                        <input type="text" name="fc_kdstock" id="fc_kdstock" class="form-control" placeholder="Kode" value="<?php echo $kode_barang ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fv_nmbarang" id="fv_nmbarang" class="form-control" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Kelompok</label>
                                                    <div class="col-sm-7">

                                                        <div id="kelompokne" style="display: none;"> </div>

                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 5px;" onclick="kelompok_modal()">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Lokasi</label>
                                                    <div class="col-sm-7">

                                                        <div id="lokasine" style="display: none;"> </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 5px;" onclick="lokasi_modal()">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Sales</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="fc_salesid" id="fc_salesidne">
                                                            <option value="">Pilih </option>
                                                            <?php $i = 1;
                                                            foreach ($sales as $s) : ?>
                                                                <option value="<?= $s->fc_salesid ?>"><?= $s->fv_nama ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <!-- <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#sales">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button> -->
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Ongkos</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fm_ongkos" id="fm_ongkos" class="form-control" placeholder="Ongkos">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Berat</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="ff_berat" id="ff_berat" class="form-control" placeholder="Berat">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Kadar</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="fc_kadar" id="fc_kadar">
                                                            <option value="">Pilih </option>
                                                            <option value="40">40</option>
                                                            <option value="70">70</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Harga Beli</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fm_hargabeli" id="fm_hargabeli" class="form-control" placeholder="Harga Beli">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Harga Jual</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fm_hargajual" id="fm_hargajual" class="form-control" placeholder="Harga Jual">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Foto</label>
                                                    <div class="col-sm-7 custome-file">
                                                        <input type="file" name="f_foto" class="custom-file-input" placeholder="Foto">
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Status</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" required name="fc_sts" id="fc_sts">
                                                            <option>Pilih </option>
                                                            <option value="1">Baru</option>
                                                            <option value="2">Bekas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Stok</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fn_stock" id="fn_stock" class="form-control" placeholder="Stok">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 center">
                                                <div id="camBox" style="width:100%;height:100%;">
                                                    <!--POPUP DIALOG BOX TO SHOW LIVE WEBCAM.-->
                                                    <div class="revdivshowimg" style="top:20%;text-align:center;margin:0 auto;">
                                                        <div id="camera" style="height:auto;text-align:center;margin:0 auto;"></div>
                                                        <p>
                                                            <input type="button" class="btn btn-success" value="Ok" id="btAddPicture" onclick="addCamPicture()" />
                                                            <input type="button" class="btn btn-danger" value="Cancel" onclick="document.getElementById('camBox').style.display = 'none';" />
                                                        </p>
                                                        <input type="hidden" id="rowid" /><input type="hidden" id="dataurl" />
                                                    </div>
                                                </div>
                                                <div style="margin-top: 140%;">
                                                    <div style="margin-bottom: 10px;" id="div_alpha"></div>
                                                    <input type="button" value="Cam" class="btn btn-primary" id="alpha" onclick="takeSnapshot(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-4" style="margin-top: 5px;">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                                <div class="col-md-3" style="margin-top: 5px;">
                                                    <button type="button" class="btn btn-success" onclick="barcode()">Cetak Barcode</button>
                                                </div>
                                                <div class="col-md-1" style="margin-top: 5px;">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- akhir tambah -->
                    </div>
                </div>
            </div>
        </div>

        <!-- modal kelompok -->

        <div class="modal fade" id="editkelompok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Kelompok
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div id="list_kelompok" style="display: none;"></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <form id="form-add" action="<?= site_url('C_barang/ajax_add_kelompok') ?>" method="POST" role="form" enctype="multipart/form-data">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="hidden" name="fn_id" id="fn_id2" class="form-control">
                                        <input type="text" name="fc_kdkelompok" id="fc_kdkelompok2" class="form-control" placeholder="kode kelompok" value="<?php echo $kode_kelompok ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fv_nmkelompok" id="fv_nmkelompok2" class="form-control" placeholder="nama kelompok">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="submit" value="Add" id="btnSave" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="button" class="btn btn-primary btn-sm delete_kelompok"><i class="fa fa-minus"></i></button>
                                    <!-- <button type="button" class="btn btn-success update"><i class="fa fa-edit"> Edit</i></button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal lokasi -->

        <div class="modal fade" id="editlokasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Lokasi
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">


                                <div id="list_lokasi" style="display: none;"></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <form id="form-add-lokasi" action="<?= site_url('C_barang/ajax_add_lokasi') ?>" method="POST" role="form" enctype="multipart/form-data">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="hidden" name="fn_id" id="fn_id3" class="form-control">
                                        <input type="text" name="fc_kdlokasi" id="fc_kdlokasi2" class="form-control" placeholder="Kode Lokasi" value="<?php echo $kode_lokasi ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fv_nmlokasi" id="fv_nmlokasi2" class="form-control" placeholder="Lokasi">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="submit" value="Add" id="btnSave2" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-md-2" style="margin-top: 5px;">
                                    <button type="button" class="btn btn-primary btn-sm delete_lokasi"><i class="fa fa-minus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- sales -->


        <!-- Modal Edit -->

        <div class="modal fade" id="modalupdate" tabindex="-1">
            <div class="modal-dialog ">
                <form method="post" action="<?= base_url('C_barang/update_barang') ?>" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                                        <div class="col-sm-7">
                                            <input type="hidden" name="fn_id_edit">
                                            <input type="date" name="fd_date_edit" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Kode</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="fc_kdstock_edit" class="form-control" placeholder="Kode">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="fv_nmbarang_edit" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Kelompok</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" required name="fc_kdkelompok_edit">
                                                <option value="">Pilih </option>
                                                <?php $i = 1;
                                                foreach ($kelompok as $k) : ?>
                                                    <option value="<?= $k->fc_kdkelompok ?>"><?= $k->fv_nmkelompok ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#editkelompok">
                                            <i class="fa fa-search-plus"></i>
                                        </button>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Lokasi</label>
                                        <div class="col-sm-7">
                                            <select class="form-control " required name="fc_kdlokasi_edit">
                                                <option value="">Pilih </option>
                                                <?php $i = 1;
                                                foreach ($lokasi as $l) : ?>
                                                    <option value="<?= $l->fc_kdlokasi ?>"><?= $l->fv_nmlokasi ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#editlokasi">
                                            <i class="fa fa-search-plus"></i>
                                        </button>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Sales</label>
                                        <div class="col-sm-7">
                                            <select class="form-control " required name="fc_salesid_edit">
                                                <option value="">Pilih </option>
                                                <?php $i = 1;
                                                foreach ($sales as $s) : ?>
                                                    <option value="<?= $s->fc_salesid ?>"><?= $s->fv_nama ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!-- <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#editsales">
                                            <i class="fa fa-search-plus"></i>
                                        </button> -->
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Ongkos</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="fm_ongkos_edit" placeholder="Ongkos">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Berat</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="ff_berat_edit" class="form-control" placeholder="Berat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Kadar</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" required name="fc_kadar_edit">
                                                <option>Pilih </option>
                                                <option value="40">40</option>
                                                <option value="70">70</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Harga Beli</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="fm_hargabeli_edit" class="form-control" placeholder="Harga Beli">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Harga Jual</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="fm_hargajual_edit" class="form-control" placeholder="Harga Jual">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-7 custome-file">
                                            <input type="file" name="f_foto" class="custom-file-input" placeholder="Foto">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" required name="fc_sts_edit">
                                                <option>--Pilih--</option>
                                                <option value="1">Baru</option>
                                                <option value="2">Bekas</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Stok</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="fn_stock_edit" class="form-control" placeholder="Stok">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 center">
                                    <div id="camBox" style="width:100%;height:100%;">
                                        <!--POPUP DIALOG BOX TO SHOW LIVE WEBCAM.-->
                                        <div class="revdivshowimg" style="top:20%;text-align:center;margin:0 auto;">
                                            <div id="camera" style="height:auto;text-align:center;margin:0 auto;"></div>
                                            <p>
                                                <input type="button" value="Ok" id="btAddPicture" onclick="addCamPicture()" />
                                                <input type="button" value="Cancel" onclick="document.getElementById('camBox').style.display = 'none';" />
                                            </p>
                                            <input type="hidden" id="rowid" /><input type="hidden" id="dataurl" />
                                        </div>
                                    </div>
                                    <div style="margin-top: 140%;">
                                        <div style="margin-bottom: 10px;" id="div_alpha"></div>
                                        <input type="button" value="Take a SnapShot" class="btn btn-primary" id="alpha" onclick="takeSnapshot(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row" style="position: center;">
                                <div class="col-md-4" style="margin-top: 5px;">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="col-md-3" style="margin-top: 5px;">
                                    <button type="submit" class="btn btn-success">Cetak Barcode</button>
                                </div>
                                <div class="col-md-1" style="margin-top: 5px;">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- modal kelompok -->

                <!-- <div class="modal fade" id="editkelompok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title center" id="exampleModalLabel">Kelompok
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($kelompok as $k) : ?>
                                                    <tr>
                                                        <td class="check center">
                                                            <input type="checkbox" class="check-item">
                                                        </td>
                                                        <td>
                                                            <input type='text' readonly class='txtedit' data-id='<?= $k->fc_kdkelompok ?>' data-field='name' id='nametxt_"<?= $k->fc_kdkelompok ?>"' value='<?= $k->fv_nmkelompok ?>'>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <form action="<?= base_url('C_barang/save_kelompok') ?>" method="post">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" name="fc_kdkelompok" class="form-control" placeholder="kode kelompok">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="fv_nmkelompok" class="form-control" placeholder="nama kelompok">
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- modal lokasi -->

                <!-- <div class="modal fade" id="editlokasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title center" id="exampleModalLabel">Lokasi
                                </h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <table class="table ">
                                            <thead>
                                                <tr>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($lokasi as $l) : ?>
                                                    <tr>
                                            </tbody>
                                            <td class="check center">
                                                <input type="checkbox" class="check-item">
                                            </td>
                                            <td>
                                                <input type='text' readonly class='txtedit' data-id='<?= $l->fc_kdlokasi ?>' data-field='name' id='nametxt_"<?= $l->fc_kdlokasi ?>"' value='<?= $l->fv_nmlokasi ?>'>
                                            </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <form action="<?= base_url('C_barang/save_lokasi') ?>" method="post">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="kode lokasi">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="lokasi">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 5px;"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- sales -->



            </div>
        </div>
        <div class="modal fade" id="modalbarcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Barcode</h5>
                    </div>
                    <form method="post" action="<?php echo base_url('C_barang/cetak_barcode') ?>">
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="fd_date2" id="fd_date2">
                                <input type="hidden" name="fc_barcode2" id="fc_barcode2">
                                <input type="hidden" name="fc_kdstock2" id="fc_kdstock2">
                                <input type="hidden" name="fv_nmbarang2" id="fv_nmbarang2">
                                <input type="hidden" name="fc_kdkelompok2" id="fc_kdkelompok2">
                                <input type="hidden" name="fc_kdlokasi2" id="fc_kdlokasi2">
                                <input type="hidden" name="fc_salesid2" id="fc_salesid2">
                                <input type="hidden" name="fm_ongkos2" id="fm_ongkos2">
                                <input type="hidden" name="ff_berat2" id="ff_berat2">
                                <input type="hidden" name="fc_kadar2" id="fc_kadar2">
                                <input type="hidden" name="fm_hargabeli2" id="fm_hargabeli2">
                                <input type="hidden" name="fm_hargajual2" id="fm_hargajual2">

                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Nama">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-md-4" style="margin-top: 5px;">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });

            $(".check-item").on("click", function() {
                if ($(".check-item:checked").length < 2) {
                    $('.update').prop('disabled', false);
                } else {
                    $('.update').prop('disabled', true);
                }
            });

            // $(document).ready(function() {
            //     barang();
            //     kelompok();
            //     $("#kadar").change(function() {
            //         barang();
            //     })
            //     $("#kelompok").change(function() {
            //         kelompok();
            //     })
            //     $("#lokasi").change(function() {
            //         // let a = $(this).val();
            //         // console.log(a);
            //         lokasi();
            //     })
            // })

            // function barang() {
            //     var kadar = $("#kadar").val();
            //     // var kelompok = $("#kelompok").val();
            //     // var lokasi = $("#lokasi").val();
            //     $.ajax({
            //         url: "<?= base_url('C_barang/kadar') ?>",
            //         data: "kadar=" + kadar,
            //         // data2: "kelompok=" + kelompok,
            //         // data3: "lokasi=" + lokasi,
            //         success: function(data) {
            //             //$("#tabel_barang tbody").html('<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>')
            //             //console.log(data);
            //             $("#tabel_barang tbody").html(data)
            //         }
            //     })
            // }

            // function kelompok() {
            //     var kelompok = $("#kelompok").val();
            //     $.ajax({
            //         url: "<?= base_url('C_barang/kelompok') ?>",
            //         data: "kelompok=" + kelompok,
            //         success: function(data) {
            //             //$("#tabel_barang tbody").html('<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>')
            //             //console.log(data);
            //             $("#tabel_barang tbody").html(data)
            //         }
            //     })
            // }

            // function lokasi() {
            //     var lokasi = $("#lokasi").val();
            //     $.ajax({
            //         url: "<?= base_url('C_barang/lokasi') ?>",
            //         data: "lokasi=" + lokasi,
            //         success: function(data) {
            //             //$("#tabel_barang tbody").html('<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>')
            //             //console.log(data);
            //             $("#tabel_barang tbody").html(data)
            //         }
            //     })
            // }

            $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
                $("#check-all").click(function() { // Ketika user men-cek checkbox all
                    if ($(this).is(":checked")) // Jika checkbox all diceklis
                        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
                    else // Jika checkbox all tidak diceklis
                        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
                });

                $('#tgl_1').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true
                });

                setTimeout(function() {
                    get_kelompok();
                }, 1000);

                setTimeout(function() {
                    get_lokasi();
                }, 1000);

                $('#form-add').submit(function(e) {

                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    $.ajax({
                        url: $(this).attr("action"),
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        async: true,
                        beforeSend: function() {
                            $('#btnSave').attr('disabled', true);
                        },
                        success: function(response) {
                            if (response.status) {
                                Batal();
                                kelompok_list();

                                setTimeout(function() {
                                    get_kelompok();
                                }, 1000);
                                // swal_berhasil();
                            } else {
                                Batal();
                                // swal_error(response.error);
                            }
                        },
                        complete: function() {
                            $('#btnSave').attr('disabled', false);
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    return false;
                });

                $('#form-add-lokasi').submit(function(e) {

                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    $.ajax({
                        url: $(this).attr("action"),
                        type: 'POST',
                        dataType: 'json',
                        data: formData,
                        async: true,
                        beforeSend: function() {
                            $('#btnSave2').attr('disabled', true);
                        },
                        success: function(response) {
                            if (response.status) {
                                BatalLokasi();
                                lokasi_list();

                                setTimeout(function() {
                                    get_lokasi();
                                }, 1000);
                                // swal_berhasil();
                            } else {
                                BatalLokasi();
                                // swal_error(response.error);
                            }
                        },
                        complete: function() {
                            $('#btnSave2').attr('disabled', false);
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                    return false;
                });

            });

            function get_kelompok() {
                var okeycabang = '<select name="fc_kdkelompok" id="fc_kdkelompok" class="form-control" ><option>--Pilih Kelompok--</option>';
                $.getJSON('<?php echo base_url() ?>C_barang/ajax_get_kelompok/', {
                        format: "json"
                    })
                    .done(function(datae) {
                        $.each(datae, function(key, val) {

                            okeycabang += '<option value="' + val.fc_kdkelompok + '" >' + val.fv_nmkelompok + '</option>';
                            //  }

                        });
                        okeycabang += '</select></div></div>';

                        var f = document.getElementById("kelompokne");
                        f.innerHTML = okeycabang;
                        document.getElementById('kelompokne').style.display = "block";
                        //   document.getElementById('pengganti_cabangn').style.display = "none";
                    })
            }

            function get_lokasi() {
                var lokasi = '<select name="fc_kdlokasi" id="fc_kdlokasi" class="form-control" ><option>--Pilih Lokasi--</option>';

                $.getJSON('<?php echo base_url() ?>C_barang/ajax_get_lokasi/', {
                        format: "json"
                    })
                    .done(function(datae) {
                        $.each(datae, function(key, val) {

                            lokasi += '<option value="' + val.fc_kdlokasi + '" >' + val.fv_nmlokasi + '</option>';
                            //  }

                        });
                        lokasi += '</select></div></div>';

                        var g = document.getElementById("lokasine");
                        g.innerHTML = lokasi;
                        document.getElementById('lokasine').style.display = "block";
                        //   document.getElementById('pengganti_cabangn').style.display = "none";
                    })
            }

            $('.delete_kelompok').click(function(e) {
                e.preventDefault();
                var arr = [];
                var checkedValue = $(".check-kelompok:checked").val();
                console.log('checked', checkedValue);

                if (confirm('Are you sure delete this data?')) {
                    $.ajax({
                        url: "<?php echo site_url('C_barang/ajax_delete_kelompok') ?>/" + checkedValue,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            setTimeout(function() {
                                Batal();
                            }, 1000);

                            kelompok_list();

                            setTimeout(function() {
                                get_kelompok();
                            }, 1000);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                            setTimeout(function() {
                                Batal();
                            }, 1000);

                            kelompok_list();

                            setTimeout(function() {
                                get_kelompok();
                            }, 1000);
                        }
                    });
                }
            })

            $('.delete_lokasi').click(function(e) {
                e.preventDefault();
                var arr = [];
                var checkedValue = $(".check-lokasi:checked").val();
                console.log('checked', checkedValue);

                if (confirm('Are you sure delete this data?')) {
                    $.ajax({
                        url: "<?php echo site_url('C_barang/ajax_delete_lokasi') ?>/" + checkedValue,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            setTimeout(function() {
                                BatalLokasi();
                            }, 1000);

                            lokasi_list();

                            setTimeout(function() {
                                get_lokasi();
                            }, 1000);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                            setTimeout(function() {
                                BatalLokasi();
                            }, 1000);

                            lokasi_list();

                            setTimeout(function() {
                                get_lokasi();
                            }, 1000);
                        }
                    });
                }
            })

            $('.update').click(function(e) {
                e.preventDefault();
                var arr = [];
                var checkedValue = $(".check-item:checked").val();
                console.log('checked', checkedValue);
                // jQuery.noConflict();
                $('#tambah').modal('show');
                $.ajax({
                    url: "<?php echo base_url('C_barang/edit/') ?>" + checkedValue,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('#fn_idbarang').val(result.fn_id);
                        $('#tgl_1').val(result.fd_date);
                        $('#fc_barcode').val(result.fc_barcode);
                        $('#fc_kdstock').val(result.fc_kdstock);
                        $('#fv_nmbarang').val(result.fv_nmbarang);
                        $('#fc_kdkelompok').val(result.fc_kdkelompok);
                        $('#fc_kdlokasi').val(result.fc_kdlokasi);
                        $('#fc_salesidne').val(result.fc_salesid);
                        $('#fm_ongkos').val(result.fm_ongkos);
                        $('#ff_berat').val(result.ff_berat);
                        $('#fc_kadar').val(result.fc_kadar);
                        $('#fm_hargabeli').val(result.fm_hargabeli);
                        $('#fm_hargajual').val(result.fm_hargajual);
                        $('#fc_sts').val(result.fc_sts);
                        $('#fn_stock').val(result.fn_stock);
                        // $('[name="fc_sts_edit"]').val(result.fc_sts);
                        // $('[name="fn_stock_edit"]').val(result.fn_stock);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Data Eror');
                    }
                })

                // $('input.check-item:checked').each(function() {
                //     arr.push($(this).val());
                // });

                // var action = $(this).attr('data-href') + '/' + arr.join("-");
                // window.location.href = action;
            });

            $('.hapus').click(function(e) {
                e.preventDefault();
                var arr = [];
                var checkedValue = $(".check-item:checked").val();
                console.log('checked', checkedValue);
                // jQuery.noConflict();
                // $('#tambah').modal('show');
                $.ajax({
                    url: "<?php echo base_url('C_barang/edit/') ?>" + checkedValue,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('#fn_idbarang').val(result.fn_id);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Data Eror');
                    }
                })
            });


            function check_lokasi(value) {
                $.ajax({
                    url: "<?php echo base_url('C_barang/get_edit_lokasi/') ?>" + value,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('#fn_id3').val(result.fn_id);
                        $('#fc_kdlokasi2').val(result.fc_kdlokasi);
                        $('#fv_nmlokasi2').val(result.fv_nmlokasi);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Data Eror');
                    }
                })
            }


            function barcode() {
                var fd_date = $('#fd_date').val();
                var fc_barcode = $('#fc_barcode').val();
                var fc_kdstock = $('#fc_kdstock').val();
                var fv_nmbarang = $('#fv_nmbarang').val();
                var fc_kdkelompok = $('#fc_kdkelompok').val();
                var fc_kdlokasi = $('#fc_kdlokasi').val();
                var fc_salesid = $('#fc_salesid').val();
                var fm_ongkos = $('#fm_ongkos').val();
                var ff_berat = $('#ff_berat').val();
                var fc_kadar = $('#fc_kadar').val();
                var fm_hargabeli = $('#fm_hargabeli').val();
                var fm_hargajual = $('#fm_hargajual').val();

                $('#fd_date2').val(fd_date);
                $('#fc_barcode2').val(fc_barcode);
                $('#fc_kdstock2').val(fc_kdstock);
                $('#fv_nmbarang2').val(fv_nmbarang);
                $('#fc_kdkelompok2').val(fc_kdkelompok);
                $('#fc_kdlokasi2').val(fc_kdlokasi);
                $('#fc_salesid2').val(fc_salesid);
                $('#fm_ongkos2').val(fm_ongkos);
                $('#ff_berat2').val(ff_berat);
                $('#fc_kadar2').val(fc_kadar);
                $('#fm_hargabeli2').val(fm_hargabeli);
                $('#fm_hargajual2').val(fm_hargajual);
                $('#modalbarcode').modal('show');
            }

            function kelompok_modal() {
                $('#editkelompok').modal('show');
                $('[name="fv_nmkelompok"]').val("");
                kelompok_list();
            }

            function lokasi_modal() {
                $('#editlokasi').modal('show');
                lokasi_list();
            }

            function Batal() {
                $('#editkelompok').modal('hide');
            }

            function BatalLokasi() {
                $('#editlokasi').modal('hide');
            }

            function kelompok_list() {
                var gabungan = '';
                $.getJSON('<?php echo base_url() ?>C_barang/ajax_get_kelompok/', {
                        format: "json"
                    })
                    .done(function(datae) {
                        var list_kelompok_atas = '<table class="table table-bordered"><thead><tr></tr> </thead><tbody>';
                        var list_kelompok_bawah = '</tbody></table>';
                        var tengah = '';
                        var list_kelompok_isi = '';
                        $.each(datae, function(key, val) {

                            list_kelompok_isi = '<tr><td class="check center"><input type="checkbox" class="check-kelompok" onchange="check_kelompok(' + val.fn_id + ')" value="' + val.fn_id + '"></td><td><input type="text" readonly class="txtedit" data-id=' + val.fc_kdkelompok + ' data-field="name" id="nametxt_' + val.fc_kdkelompok + '" value="' + val.fv_nmkelompok + '"> </td></tr>';
                            tengah += '' + list_kelompok_isi + '';
                        });
                        if (tengah != "") {
                            gabungan = list_kelompok_atas + tengah + list_kelompok_bawah;
                        } else {
                            gabungan = "Tidak Ada Data";
                        }

                        var h = document.getElementById("list_kelompok");
                        h.innerHTML = gabungan;
                        document.getElementById('list_kelompok').style.display = "block";
                    })
            }

            function lokasi_list() {
                var gabungan_lokasi = '';
                $.getJSON('<?php echo base_url() ?>C_barang/ajax_get_lokasi/', {
                        format: "json"
                    })
                    .done(function(datae) {
                        var list_lokasi_atas = '<table class="table table-bordered"><thead><tr></tr> </thead><tbody>';
                        var list_lokasi_bawah = '</tbody></table>';
                        var tengah_lokasi = '';
                        var list_lokasi_isi = '';
                        $.each(datae, function(key, val) {

                            list_lokasi_isi = '<tr><td class="check center"><input type="checkbox" class="check-lokasi" onchange="check_lokasi(' + val.fn_id + ')" value="' + val.fn_id + '"></td><td><input type="text" readonly class="txtedit" data-id=' + val.fc_kdlokasi + ' data-field="name" id="nametxt_' + val.fc_kdlokasi + '" value="' + val.fv_nmlokasi + '"> </td></tr>';
                            tengah_lokasi += '' + list_lokasi_isi + '';
                        });
                        if (tengah_lokasi != "") {
                            gabungan_lokasi = list_lokasi_atas + tengah_lokasi + list_lokasi_bawah;
                        } else {
                            gabungan_lokasi = "Tidak Ada Data";
                        }

                        var i = document.getElementById("list_lokasi");
                        i.innerHTML = gabungan_lokasi;
                        document.getElementById('list_lokasi').style.display = "block";
                    })
            }
        </script>

        <script>
            Webcam.set({
                width: 400,
                height: 300,
                image_format: 'jpeg',
                jpeg_quality: 100
            });
            Webcam.attach('#camera');

            takeSnapshot = function(oButton) {
                document.getElementById('camBox').style.display = 'block';
                document.getElementById('rowid').value = oButton.id
            }

            addCamPicture = function() {
                var rowid = document.getElementById('rowid').value;

                Webcam.snap(function(data_uri) {
                    document.getElementById('div_' + rowid).innerHTML =
                        '<img src="' + data_uri + '" id="" width="150px" height="150px" />';
                });

                document.getElementById('rowid').value = '';
                document.getElementById('camBox').style.display = 'none'; // HIDE THE POPUP DIALOG BOX.
            }

            $(document).ready(function() {

                $(".delete").click(function(event) {
                    alert("Delete?");
                    var href = $(this).attr("<?php base_url('C_barang/delete') ?>")
                    var btn = this;

                    $.ajax({
                        type: "POST",
                        url: href,
                        success: function(response) {

                            if (response == "Success") {
                                $(btn).closest('tr').fadeOut("slow");
                            } else {
                                alert("Error");
                            }

                        }
                    });
                    event.preventDefault();
                })
            });
        </script>
        <style>
            #camBox {
                display: none;
                position: fixed;
                border: 0;
                top: 0;
                right: 0;
                left: 0;
                overflow-x: auto;
                overflow-y: hidden;
                z-index: 9999;
                background-color: rgba(239, 239, 239, .9);
                width: 100%;
                height: 100%;
                padding-top: 10px;
                text-align: center;
                cursor: pointer;
                -webkit-box-align: center;
                -webkit-box-orient: vertical;
                -webkit-box-pack: center;
                -webkit-transition: .2s opacity;
                -webkit-perspective: 1000
            }

            .revdivshowimg {
                width: 500px;
                height: 500px;
                top: 0;
                padding: 0;
                position: relative;
                margin: 0 auto;
                display: block;
                background-color: #fff;
                webkit-box-shadow: 6px 0 10px rgba(0, 0, 0, .2), -6px 0 10px rgba(0, 0, 0, .2);
                -moz-box-shadow: 6px 0 10px rgba(0, 0, 0, .2), -6px 0 10px rgba(0, 0, 0, .2);
                box-shadow: 6px 0 10px rgba(0, 0, 0, .2), -6px 0 10px rgba(0, 0, 0, .2);
                overflow: hidden;
                border-radius: 3px;
                color: #17293c
            }
        </style>
        <?php $this->load->view('partials/footer.php') ?>
        <?php $this->load->view('partials/js.php') ?>