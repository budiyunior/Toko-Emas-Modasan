<?php $this->load->view('partials/header.php') ?>
<?php
$koneksi =  mysqli_connect("localhost", "root", "", "tokoemas");
?>


<!-- /section:basics/sidebar.horizontal -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <!-- /section:settings.box -->
            <div class="page-header">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-6 col-sm-5">
                        <br>
                        <br>
                        <a style="font-family: times new roman; font-size: 35px; font-style: bold;">
                            <img src="../../backend-emas/assets/img/logo_modasan.png" width="70" />
                            -M O D A S A N-
                        </a>
                    </div>
                    <div class=" col-xs-4 col-sm-6">
                        <div class="">
                            <form>
                                <div class="row">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama</label>

                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="" class=" col-sm-5" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat</label>

                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="" class="col-xs-7 col-sm-5" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No. Telp</label>

                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="" class=" col-sm-5" />
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
                                            <th>Jenis Barang</th>
                                            <th>Gambar</th>
                                            <th>Kadar</th>
                                            <th>Berat</th>
                                            <th>Ongkos</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cincin</td>
                                            <td><img src="" width="100"></td>
                                            <td>10%</td>
                                            <td>1 gram</td>
                                            <td>10.000</td>
                                            <td>10.000</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="col-xs-8">
                                <label for="form-field-1">Terbilang</label>
                                <input type="text" id="form-field-1" placeholder="" class="col-xs-11" />
                            </div>
                            <div class="col-xs-3">
                                <label for="">Total</label>
                                <input type="text" id="form-field-1" class="no-padding-right" placeholder="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12" style="margin-left: 15%;">
                        <input type="text" style="color: red;" readonly class="col-xs-5" value="Jual di potong 5% - tukar tambah 4%">
                    </div>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-7">
                        <p>Perhiasan Rusak:...................</p>
                        <p>Perhiasan Tidak Sepasang:...............</p>
                        <h3 style="margin-top: 40px; font-family: Brush Script MT;">Terima Kasih Atas Kunjungan dan Kepercayaan Anda</h3>
                    </div>
                    <div class="col-xs-5">
                        <h5>Malang, </h5>
                        <br>
                        <br>
                        <br>
                        <p>......................................</p>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>


</div>
<script>
    window.print()
</script>


<?php $this->load->view('partials/js.php') ?>