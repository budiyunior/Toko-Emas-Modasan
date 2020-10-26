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
                        <img class="nav-user-photo" src="<?php base_url() ?>assets/assets/avatars/user.jpg" alt="Jason's Photo" />
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
                        Pembelian

                    </h2>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <button type="button" data-toggle="modal" data-target="#tampilPembelian" class="btn btn-success"><i class="fa fa-print"> Pembelian</i></button>

                        <div class="modal fade" id="tampilPembelian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pembelian</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form>
                                                    <div class=" col-md-3">
                                                        <label for="form-field-9">No Faktur Lama</label>
                                                        <button type="button" data-toggle="modal" data-target="#tampilFaktur" class="btn btn-success"><i class="fa fa-search"></i> Cari No Faktur Lama</i></button>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <label for="inputPassword" class="col-form-label">Kode</label>
                                                        <div class="form-group row">

                                                            <div class="col-sm-8">

                                                                <input type="text" class="col-md-12" name="fc_kdstock_view" id="fc_kdstock" readonly>
                                                                <input type="hidden" class="col-md-12" name="fc_kdstock_view" id="no" readonly>
                                                                <input type="hidden" class="col-md-12" name="fv_nmbarang_view" id="fv_nmbarang" readonly>
                                                                <input type="hidden" class="col-md-12" name="ff_berat_view" id="ff_berat" readonly>
                                                                <input type="hidden" class="col-md-12" name="fc_kadar_view" id="fc_kadar" readonly>
                                                                <input type="hidden" class="col-md-12" name="fm_hargajual_view" id="fm_hargajual" onkeyup="sum();" readonly>
                                                                <input type="hidden" class="col-md-12" name="fm_ongkos_view" id="fm_ongkos" onkeyup="sum();" readonly>
                                                                <input type="hidden" class="col-md-12" name="fm_hargabeli_view" id="fm_hargabeli" readonly>
                                                                <input type="hidden" class="col-md-12" name="fm_total" id="fm_total" readonly>
                                                            </div>



                                                            <div class="col-sm-4 ">
                                                                <button class="btn btn-sm btn-primary" id="add_data">Add Data</button>
                                                            </div>



                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 ">
                                                        <label for="form-field-9">Transaksi Terdahulu</label>
                                                        <input id="tags" type="text" name="fc_noinv_view" class="form-control">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Faktur</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="fc_noinv_view" class=" form-control" id="inputPassword" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal</label>
                                                            <?php
                                                            $tgl = date("Y-m-d");
                                                            ?>
                                                            <div class="col-sm-8">
                                                                <input type="date" class="form-control" name="fd_tglinv_view" id="inputPassword" value="<?= $tgl ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Kode Penjual</label>
                                                            <div class="col-sm-5">
                                                                <input type="text" class="form-control" id="inputPassword" name="fc_kdpel_view" readonly>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="col-sm-6">
                                                                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#caripelanggan">
                                                                        <i class=" ace-icon glyphicon glyphicon-search"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#tambahpelanggan">
                                                                        <i class=" ace-icon glyphicon glyphicon-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Nama Penjual</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="fv_nmpelanggan_view" id="inputPassword" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">Alamat Penjual</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="f_alamat_view" id="inputPassword" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <table class="table  table-bordered" id="data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode</th>
                                                            <th>Uraian Barang</th>
                                                            <th>Berat</th>
                                                            <th>Kadar</th>
                                                            <th>Harga Lama</th>
                                                            <th>Kondisi</th>
                                                            <th>Ongkos</th>
                                                            <th>Pot</th>
                                                            <th>Harga Beli</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>


                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="col-md-3">

                                                <div>
                                                    <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#pilihbarang">
                                                        <i class="ace-icon glyphicon glyphicon-plus"> Pilih Barang</i>
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="form-group row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <span id="hasil"></span>
                                                        <label for="inputPassword" class="col-sm-3 col-form-label">Subtotal</label>
                                                        <div class="col-sm-8">
                                                            <span id="hasil"></span>
                                                            <input type="text" class="form-control" readonly id="hasil" name="hasil">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <label for="inputPassword" class="col-sm-3 col-form-label">GrandTotal</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" readonly id="inputPassword" value="100.000">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword" class="col-sm-2 col-form-label">Terbilang</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputPassword" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <button type="button" class="btn btn-primary ">Simpan</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="modal fade" id="tampilFaktur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Faktur</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="col-md-12 center">
                                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">
                                                                    <label class="pos-rel">

                                                                        <span class="lbl"></span>
                                                                    </label>
                                                                </th>
                                                                <th>No</th>
                                                                <th>Faktur</th>
                                                                <th>Tanggal</th>
                                                                <th>Pelanggan</th>
                                                                <th>Grand Total</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php $i = 1;
                                                            foreach ($faktur as $f) : ?>
                                                                <tr>
                                                                    <td class="center">
                                                                        <label class="pos-rel check">
                                                                            <input type="checkbox" class="check" value="<?= $f->fc_noinv ?>" />
                                                                            <span class="lbl"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td><?= $i++ ?></td>
                                                                    <td><?= $f->fc_noinv ?></td>
                                                                    <td><?= $f->fd_tglinv ?></td>
                                                                    <td><?= $f->fc_kdpel ?></td>
                                                                    <td><?= $f->fm_grandtotal ?></td>
                                                                    <td><?= $f->fc_sts ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" data-dismiss="modal" class="btn btn-primary action-select">Pilih</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="caripelanggan" tabindex="-1">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cari Pelanggan</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="col-md-12">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="center">
                                                                    Ceklist
                                                                </th>
                                                                <th>
                                                                    Nama Pelanggan
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
                                                            foreach ($pelanggan as $p) : ?>
                                                                <tr>
                                                                    <td class="center">
                                                                        <label class="pos-rel check">
                                                                            <input type="checkbox" class="check-pelanggan" value="<?= $p->fc_kdpel ?>" />
                                                                            <span class="lbl"></span>
                                                                        </label>
                                                                    </td>
                                                                    <td><?= $p->fv_nmpelanggan ?> </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" style="margin-top: 5px;">
                                                <button type="button" data-dismiss="modal" class="btn btn-primary action-pelanggan">Pilih</button>
                                                <!-- <button type="button" class="btn btn-primary action-select">Pilih</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- PAGE CONTENT ENDS -->
                        </div>

                        <div class="modal fade" id="tambahpelanggan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <form method="post" action="<?= base_url('C_pembelian/save_datapelanggan') ?>" enctype="multipart/form-data">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="fc_kdpel" class="form-control" id="kode" placeholder="Kode">
                                                                <?= form_error('fc_kdpel', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4 col-form-label">Nama</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="fv_nmpelanggan" class="form-control" id="" placeholder="Nama">
                                                                <?= form_error('fv_nmpelanggan', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4 col-form-label">Alamat</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="f_alamat" class="form-control" id="" placeholder="Alamat">
                                                                <?= form_error('f_alamat', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4 col-form-label">No Hp</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="fc_telp" class="form-control" id="" placeholder="No Hp">
                                                                <?= form_error('fc_telp', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4 col-form-label">No KTP</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="fc_noktp" class="form-control" id="" placeholder="No KTP">
                                                                <?= form_error('fc_noktp', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" name="f_keterangan" class="form-control" id="" placeholder="Keterangan">
                                                                <?= form_error('f_keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<div class="modal fade" id="pilihbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Barang</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form>
                            <div class="col-md-12">
                                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                <div class="center">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="check">
                                                        <div class="center">
                                                            <input type="checkbox" id="check-all">
                                                        </div>
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
                                                            <input type="checkbox" class="check-barang" name="id[]" value="<?php echo $s->fn_id ?>">
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
                                </div>

                                <button type="button" data-dismiss="modal" class="btn btn-primary action-barang">Simpan</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->


<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<script>
    $(".check").on("click", function() {
        if ($(".check:checked").length < 2) {
            $('.action-select').prop('disabled', false);
        } else {
            $('.action-select').prop('disabled', true);
        }
    });


    $('.action-select').click(function(e) {
        e.preventDefault();
        var arr = [];
        var checkedValue = $(".check:checked").val();
        console.log('checked', checkedValue);
        $('#tampilPembelian').modal('show');
        $.ajax({
            url: "<?php echo base_url('C_pembelian/tampil_faktur/') ?>" + checkedValue,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                $('[name="fc_noinv_view"]').val(result.fc_noinv);
                $('[name="fd_tglinv_view"]').val(result.fd_tglinv);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Data Eror');
            }
        })
    });


    $('.action-barang').click(function(e) {
        e.preventDefault();
        var arr = [];
        var checkedValue = $(".check-barang:checked").val();
        console.log('checked', checkedValue);
        $('#tampilPembelian').modal('show');
        $.ajax({
            url: "<?php echo base_url('C_pembelian/tampil_barang/') ?>" + checkedValue,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                $('[name="fc_kdstock_view"]').val(result.fc_kdstock);
                $('[name="fv_nmbarang_view"]').val(result.fv_nmbarang);
                $('[name="ff_berat_view"]').val(result.ff_berat);
                $('[name="fc_kadar_view"]').val(result.fc_kadar);
                $('[name="fm_hargajual_view"]').val(result.fm_hargajual);
                $('[name="fm_ongkos_view"]').val(result.fm_ongkos);
                $('[name="fv_nmbarang_view"]').val(result.fv_nmbarang);
                $('[name="fm_hargabeli_view"]').val(result.fm_hargabeli)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Data Eror');
            }
        })
    });

    $(function() {

        var set_number = function() {
            var table = $().length + 1;

            $('#no').val(table);
        }

        set_number();

        $('#add_data').click(function(e) {
            e.preventDefault();
            $('#tampilPembelian').modal('show');
            var no = $('#no').val();
            var fc_kdstock = $('#fc_kdstock').val();
            var fv_nmbarang = $('#fv_nmbarang').val();
            var ff_berat = $('#ff_berat').val();
            var fc_kadar = $('#fc_kadar').val();
            var fm_hargajual = $('#fm_hargajual').val();
            var fm_ongkos = $('#fm_ongkos').val();
            var fm_hargabeli = $('#fm_hargabeli').val();
            var fm_total = parseInt($('#fm_hargajual').val()) + parseInt($('#fm_ongkos').val())


            $('#data-table tbody:last-child').append(

                '<tr>' +
                '<td>' + no + '</td>' +
                '<td>' + fc_kdstock + '</td>' +
                '<td>' + fv_nmbarang + '</td>' +
                '<td>' + ff_berat + '</td>' +
                '<td>' + fc_kadar + '</td>' +
                '<td>' + fm_hargajual + '</td>' +
                '<td>' + '<input type="text" name=""  class="form-control" >' + '</td>' +
                '<td>' + fm_ongkos + '</td>' +
                '<td>' + '<input type="text" name=""  class="form-control" >' + '</td>' +
                '<td id="fm_total">' + fm_total + '</td>' +
                '</tr>'
            );
        });
    })

    $('.action-pelanggan').click(function(e) {
        e.preventDefault();
        var arr = [];
        var checkedValue = $(".check-pelanggan:checked").val();
        console.log('checked', checkedValue);
        $('#tampilPembelian').modal('show');
        $.ajax({
            url: "<?php echo base_url('C_pembelian/tampil_pelanggan/') ?>" + checkedValue,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                $('[name="fc_kdpel_view"]').val(result.fc_kdpel);
                $('[name="fv_nmpelanggan_view"]').val(result.fv_nmpelanggan);
                $('[name="f_alamat_view"]').val(result.f_alamat);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Data Eror');
            }
        })
    });


    var table = document.getElementById("data-table"),
        sumHsl = 0;
    for (var t = 1; t < table.rows.length; t++) {
        sumHsl = sumHsl + parseInt(table.rows[t].cells[5].innerHTML);

    }
    document.getElementById("hasil").innerHTML = sumHsl;
    console.log(sumHsl);

    function sum() {
        var txtFirstNumberValue = document.getElementsById('fm_hargajual').value;
        var txtSecondNumberValue = document.getElementsById('fm_ongkos').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('fm_total').value = result;
        }
    }

    $('#save')
</script>

<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/js.php') ?>