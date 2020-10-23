<?php $this->load->view('partials/header.php') ?>
<?php
$koneksi =  mysqli_connect("localhost", "root", "", "tokoemas");
?>



<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">

</div>

<!-- /section:basics/sidebar.horizontal -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Laporan Penjualan
                </h1>
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="col-xs-6 col-sm-6">
                        <form>
                            <label >Transaksi</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <div class="input-group">
                                        <input class="form-control " />
                                    </div>
                                </div>
                            </div>
                            <label >Berat</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <div class="input-group">
                                        <input class="form-control " />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <form>
                            <label>Grand Total</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <div class="input-group">
                                        <input class="form-control " />

                                    </div>
                                </div>
                            </div>
                            <label >Sub Total</label>

                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <!-- #section:plugins/date-time.datepicker -->
                                    <div class="input-group">
                                        <input class="form-control " />

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.span -->
            <div class="row">
                <div class="col-xs-12" style="margin-top: 30px;">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
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
                                    if (isset($_GET['startdate'])) {
                                        $tgl = $_GET['startdate'];
                                        $tgl2 = $_GET['enddate'];
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tm_invoice WHERE fd_tglinv between '$tgl' AND '$tgl2'");
                                    }
                                    // } else if (isset($_GET['shift'])){
                                    //     $shift = $_GET['shift'];
                                    //     $sql = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE shift = '$shift' ");
                                    else {
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tm_invoice");
                                    }
                                    while ($lp = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $lp['fc_noinv'] ?></td>
                                            <td><?php echo $lp['fv_catatan'] ?></td>
                                            <td><?php echo $lp['fm_subtot'] ?></td>
                                            <td><?php echo $lp['fm_grandtotal'] ?></td>

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
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>


</div>


<?php $this->load->view('partials/js.php') ?>