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


                <div class="row">
                    <div class="col-md-1">
                        <h2 style="color: #07A1C8;">
                            Barang
                        </h2>
                    </div>
                    <form action="" method=""></form>
                    <div class="col-md-2">
                        <label>Jenis</label>
                        <select class="form-control" required name="metode">
                            <option value="">Pilih </option>
                            <option name="Indomaret">Indomaret</option>
                            <option name="Alfamart">Alfamart</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Kelompok</label>
                        <select class="form-control" required name="metode">
                            <option value="">Pilih </option>
                            <option name="Indomaret">Indomaret</option>
                            <option name="Alfamart">Alfamart</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Lokasi</label>
                        <select class="form-control" required name="metode">
                            <option value="">Pilih </option>
                            <option name="Indomaret">Indomaret</option>
                            <option name="Alfamart">Alfamart</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Sales</label>
                        <select class="form-control" required name="metode">
                            <option value="">Pilih </option>
                            <option name="Indomaret">Indomaret</option>
                            <option name="Alfamart">Alfamart</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Status</label>
                        <select class="form-control" required name="metode">
                            <option value="">Pilih </option>
                            <option name="Indomaret">Indomaret</option>
                            <option name="Alfamart">Alfamart</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <br>
                        <button type="button" class="btn btn-primary">Refresh</button>
                    </div>
                    </form>
                </div>

            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->



                    <div class="center">
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            <input type="checkbox" id="check-all" />
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
                                    <?php $i = 1;
                                    foreach ($barang as $s) : ?>
                                        <tr>
                                            <td class="check">
                                                <input type="checkbox" class="check-item">
                                            </td>
                                            <th scope="col"><?= $i++ ?></th>
                                            <td scope="row"><?= $s->fc_kdstock ?></td>
                                            <td scope="row"><?= $s->fv_nmbarang ?></td>
                                            <td scope="row"><?= $s->fc_kdkelompok ?></td>
                                            <td scope="row"><?= $s->fc_kdlokasi ?></td>
                                            <td scope="row"><?= $s->ff_berat ?></td>
                                            <td scope="row"><?= $s->fc_kadar ?></td>
                                            <td scope="row"><?= $s->fm_hargabeli ?></td>
                                            <td scope="row"><?= $s->fc_salesid ?></td>
                                            <td scope="row"><?= $s->fc_sts ?></td>
                                            <td scope="row"><?= $s->fd_date ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="col-md-1" style="margin-top: 5px;">
                                <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px;">
                                <button type="button" class="btn btn-success update">Edit</button>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px;">
                                <a href="" class="btn btn-danger">Hapus</a>
                            </div>
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
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="<?= base_url('C_barang/save_barang') ?>" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <?php
                                                    $tgl = date("Y-m-d");
                                                    ?>
                                                    <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="fd_date" class="form-control" value="<?= $tgl ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Kode</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fc_kdstock" class="form-control" placeholder="Kode">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fv_nmbarang" class="form-control" placeholder="Nama">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Kelompok</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" required name="fc_kdkelompok">
                                                            <option value="">Pilih </option>
                                                            <?php $i = 1;
                                                            foreach ($kelompok as $k) : ?>
                                                                <option name="<?= $k->fv_nmkelompok ?>"><?= $k->fv_nmkelompok ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#kelompok">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Lokasi</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control " required name="fc_kdlokasi">
                                                            <option value="">Pilih </option>
                                                            <?php $i = 1;
                                                            foreach ($lokasi as $l) : ?>
                                                                <option name="<?= $l->fv_nmlokasi ?>"><?= $l->fv_nmlokasi ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#lokasi">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Sales</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control " required name="fc_salesid">
                                                            <option value="">Pilih </option>
                                                            <?php $i = 1;
                                                            foreach ($sales as $s) : ?>
                                                                <option value="<?= $s->fc_salesid ?>"><?= $s->fv_nama ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#sales">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Ongkos</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fm_ongkos" class="form-control" placeholder="Ongkos">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Berat</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="ff_berat" class="form-control" placeholder="Berat">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Kadar</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" name="fc_kadar">
                                                            <option value="">Pilih </option>
                                                            <option name="Indomaret">10</option>
                                                            <option name="Alfamart">50</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Harga Beli</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fm_hargabeli" class="form-control" placeholder="Harga Beli">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Harga Jual</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fm_hargajual" class="form-control" placeholder="Harga Jual">
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
                                                        <select class="form-control" required name="fc_sts">
                                                            <option value="">Pilih </option>
                                                            <option name="Indomaret">Baru</option>
                                                            <option name="Alfamart">Bekas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 center">
                                                <div style="margin-top: 140%;">
                                                    <div style="margin-bottom: 10px;">
                                                        <img src="../../assets/assets/img/php.png" alt="Foto" width="150"><br>
                                                    </div>
                                                    <button type="button" class="btn btn-primary">Cam</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="row">
                                                <div class="col-md-4" style="margin-top: 5px;">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                                <div class="col-md-3" style="margin-top: 5px;">
                                                    <button type="button" class="btn btn-success">Cetak Barcode</button>
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

        <div class="modal fade" id="kelompok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Kelompok
                        </h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <?php $i = 1;
                            foreach ($sales as $s) : ?>
                                <tr>
                                    <td>
                                        <span class='edit'><?= $s->fv_nama ?></span>
                                        <input type='text' class='txtedit' data-id='<?= $s->fc_salesid ?>' data-field='name' id='nametxt_"<?= $s->fc_salesid ?>"' value='<?= $s->fv_nama ?>'>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 5px;">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="col-md-2" style="margin-top: 5px;">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- modal lokasi -->

        <div class="modal fade" id="lokasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Lokasi
                        </h5>
                    </div>
                    <div class="modal-body">
                        <br><br><br>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm" style="margin-top: 5px;"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="col-md-2" style="margin-top: 5px;">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- sales -->

        <div class="modal fade" id="sales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Sales</h5>
                    </div>
                    <div class="modal-body">
                        <br><br><br>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm" style="margin-top: 5px;"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="col-md-2" style="margin-top: 5px;">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->

        <div class="modal fade" id="modalupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
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
                                        <input type="date" name="fd_date_edit" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Kode</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="fc_barcode_edit" class="form-control" placeholder="Kode">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="fc_kdstock_edit" class="form-control" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Kelompok</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="" placeholder="kelompok">
                                    </div>
                                    <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#editkelompok">
                                        <i class="fa fa-search-plus"></i>
                                    </button>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Lokasi</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Lokasi">
                                    </div>
                                    <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#editlokasi">
                                        <i class="fa fa-search-plus"></i>
                                    </button>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Sales</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Sales">
                                    </div>
                                    <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#editsales">
                                        <i class="fa fa-search-plus"></i>
                                    </button>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Ongkos</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Ongkos">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Berat</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Berat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Kadar</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" required name="metode">
                                            <option value="">Pilih </option>
                                            <option name="Indomaret">10</option>
                                            <option name="Alfamart">20</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Harga Beli</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Harga Beli">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Harga Jual</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Harga Jual">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Foto</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Foto">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" required name="metode">
                                            <option value="">Pilih </option>
                                            <option name="Indomaret">Baru</option>
                                            <option name="Alfamart">Bekas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 center">
                                <div style="margin-top: 140%;">
                                    <div style="margin-bottom: 10px;">
                                        <img src="../../assets/assets/img/php.png" alt="Foto" width="150"><br>
                                    </div>
                                    <button type="button" class="btn btn-primary">Cam</button>
                                </div>
                            </div>
                            </form>
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
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                                        </div>
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
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- sales -->

                    <div class="modal fade" id="editsales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title center" id="exampleModalLabel">Sales</h5>
                                </div>
                                <div class="modal-body">
                                    <br><br><br>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 5px;">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row" style="position: center;">
                            <div class="col-md-4" style="margin-top: 5px;">
                                <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <button type="button" class="btn btn-success">Cetak Barcode</button>
                            </div>
                            <div class="col-md-1" style="margin-top: 5px;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                            </div>
                        </div>


                    </div>
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
                    $('.action-update').prop('disabled', false);
                } else {
                    $('.action-update').prop('disabled', true);
                }
            });

            $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
                $("#check-all").click(function() { // Ketika user men-cek checkbox all
                    if ($(this).is(":checked")) // Jika checkbox all diceklis
                        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
                    else // Jika checkbox all tidak diceklis
                        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
                });

            });
            $('.update').click(function(e) {
                e.preventDefault();
                var arr = [];
                var checkedValue = $(".check-item:checked").val();
                console.log('checked', checkedValue);
                // jQuery.noConflict();
                $('#modalupdate').modal('show');
                $.ajax({
                    url: "<?php echo base_url('C_sales/ajax_edit/') ?>" + checkedValue,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('[name="fc_salesid_edit"]').val(result.fc_salesid);
                        $('[name="fv_nama_edit"]').val(result.fv_nama);
                        $('[name="fc_email_edit"]').val(result.fc_email);
                        $('[name="fc_hp_edit"]').val(result.fc_hp);
                        $('[name="fc_aktif_edit"]').val(result.fc_aktif);
                        $('[name="fd_tgllahir_edit"]').val(result.fd_tgllahir);
                        $('[name="fc_kdposisi_edit"]').val(result.fc_kdposisi);
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
        </script>
        <?php $this->load->view('partials/footer.php') ?>
        <?php $this->load->view('partials/js.php') ?>