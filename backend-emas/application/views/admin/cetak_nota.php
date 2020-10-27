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
                    <div class="col-xs-12 col-sm-2">
                        <h2>
                            
                        </h2>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <h2 style="font-family: times new roman; font-size: 35px; font-style: bold;">
                            - M O D A S A N -
                        </h2>
                        <h5 style="font-family: times new roman; font-size: 15px; font-style: bold; margin-left: 20%;">
                            Butik and Gold
                        </h5>
                        <p><i class="fa fa-home"></p>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                    </div>
                    <div class="col-sm-6">
                        <div class="">
                            <form>
                                <div class="row">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama</label>

                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat</label>

                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">No. Telp</label>

                                    <div class="col-sm-9">
                                        <input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" />
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
                                            <th>Kadar</th>
                                            <th>Berat</th>
                                            <th>Ongkos</th>
                                            <th>Jumlah</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <td>Cincin</td>
                                            <td>10%</td>
                                            <td>1 gram</td>
                                            <td>10.000</td>
                                            <td>10.000</td>

                                        </tr>
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