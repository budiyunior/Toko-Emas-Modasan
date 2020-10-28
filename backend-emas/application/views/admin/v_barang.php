<?php $this->load->view('partials/header.php') ?>
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
				$id_level=$this->session->userdata('fc_userid');
				$main_menu=$this->db->join('mainmenu','mainmenu.idmenu=tab_akses_mainmenu.id_menu')
									->where('tab_akses_mainmenu.fc_userid',$id_level)
									->where('tab_akses_mainmenu.r','1')
									->order_by('mainmenu.idmenu','asc')
									->get('tab_akses_mainmenu')
									->result();
				foreach ($main_menu as $rs) {
				?>
				<?php
				$row = $this->db->where('mainmenu_idmenu',$rs->idmenu)->get('submenu')->num_rows();
					if($row>0){
						$sub_menu=$this->db->join('submenu','submenu.id_sub=tab_akses_submenu.id_sub_menu')
										   ->where('submenu.mainmenu_idmenu',$rs->idmenu)
										   ->where('tab_akses_submenu.fc_userid',$id_level)
										   ->where('tab_akses_submenu.r','1')
										   ->get('tab_akses_submenu')
										   ->result();
				?>

					<li class="hover">
						
							<i class="menu-icon <?=$rs->icon_class?>"></i>
							<span class="menu-text">
								<?=$rs->nama_menu?>
							</span>

							<b class="arrow fa fa-angle-down"></b>

						<b class="arrow"></b>

						<?php
						echo "<ul class='submenu'>";
						foreach ($sub_menu as $rsub){
						?>
							<li class="hover">
								<a href="<?=base_url().$rsub->link_sub?>">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$rsub->nama_sub?>
								</a>

								<b class="arrow"></b>
							</li>


						<?php
						}
							echo "</ul>";
						}else{ 
						?>
						</li>
						<li class="hover">
							<a href="<?=base_url().$rs->link_menu?>">
								<i class="menu-icon <?=$rs->icon_class?>"></i>
								<span class="menu-text"><?=$rs->nama_menu?> </span>
							</a>

							<b class="arrow"></b>
						</li>
						<?php
						}
						}
						?>
						<?php
							if ($id_level==1){?>
					
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
                    <form action="" method="">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <label>Kelompok</label>
                            <select class="form-control" required name="fc_kdkelompok">
                                <option value="">--Pilih--</option>
                                <?php $i = 1;
                                foreach ($kelompok2 as $k) : ?>
                                    <option value="<?= $k->fc_kdkelompok ?>"><?= $k->fv_nmkelompok ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Lokasi</label>
                            <select class="form-control " required name="fc_kdlokasi">
                                <option value="">--Pilih--</option>
                                <?php $i = 1;
                                foreach ($lokasi2 as $l) : ?>
                                    <option value="<?= $l->fc_kdlokasi ?>"><?= $l->fv_nmlokasi ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Sales</label>
                            <select class="form-control " required name="fc_salesid">
                                <option value="">Pilih </option>
                                <?php $i = 1;
                                foreach ($sales as $s) : ?>
                                    <option value="<?= $s->fc_salesid ?>"><?= $s->fv_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Status</label>
                            <select class="form-control" required name="fc_sts">
                                <option>--Pilih--</option>
                                <option value="1">Baru</option>
                                <option value="2">Bekas</option>
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
                                        <th scope="col">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo form_open('C_barang/delete'); ?>
                                    <?php $no = $this->uri->segment('3') + 1;
                                    foreach ($barang as $s) : ?>
                                        <tr>
                                            <td class="check">
                                                <input type="checkbox" class="check-item" name="id[]" value="<?= $s->fn_id ?>">
                                            </td>
                                            <th scope="col"><?= $no++ ?></th>
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
                                            <td scope="row"><?= $s->fn_stock ?></td>
                                        </tr>
                                    <?php endforeach; ?>
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
                                <button type="submit" class="btn btn-danger" onclick="return confirm(' Anda Yakin Menghapus Data Barang ?')"><i class="fa fa-trash"></i> Hapus</button>
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
                                                                <option value="<?= $k->fc_kdkelompok ?>"><?= $k->fv_nmkelompok ?></option>
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
                                                                <option value="<?= $l->fc_kdlokasi ?>"><?= $l->fv_nmlokasi ?></option>
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
                                                    <!-- <button class="btn btn-primary btn-sm" style="margin-top: 5px;" data-toggle="modal" data-target="#sales">
                                                        <i class="fa fa-search-plus"></i>
                                                    </button> -->
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
                                                            <option value="10">10</option>
                                                            <option value="50">50</option>
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
                                                            <option>Pilih </option>
                                                            <option value="1">Baru</option>
                                                            <option value="2">Bekas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-3 col-form-label">Stok</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="fn_stock" class="form-control" placeholder="Stok">
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
                            <div class="col-md-12">
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
                        <div class="row">
                            <div class="col-md-12">
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
        </div>

        <!-- sales -->

        <div class="modal fade" id="sales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title center" id="exampleModalLabel">Sales</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table ">
                                    <thead>
                                        <tr>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($sales as $s) : ?>
                                            <tr>
                                    </tbody>
                                    <td class="check center">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td>
                                        <input type='text' readonly class='txtedit' data-id='<?= $s->fc_salesid ?>' data-field='name' id='nametxt_"<?= $s->fc_salesid ?>"' value='<?= $s->fv_nama ?>'>
                                    </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="kode lokasi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="lokasi">
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
                                                <option value="10">10</option>
                                                <option value="50">50</option>
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

                <div class="modal fade" id="editkelompok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </div>

                <!-- sales -->

                <div class="modal fade" id="editsales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title center" id="exampleModalLabel">Sales</h5>
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
                                                foreach ($sales as $s) : ?>
                                                    <tr>
                                            </tbody>
                                            <td class="check center">
                                                <input type="checkbox" class="check-item">
                                            </td>
                                            <td>
                                                <input type='text' readonly class='txtedit' data-id='<?= $s->fc_salesid ?>' data-field='name' id='nametxt_"<?= $s->fc_salesid ?>"' value='<?= $s->fv_nama ?>'>
                                            </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="kode lokasi">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="lokasi">
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
                    url: "<?php echo base_url('C_barang/edit/') ?>" + checkedValue,
                    type: "GET",
                    dataType: "JSON",
                    success: function(result) {
                        $('[name="fn_id_edit"]').val(result.fn_id);
                        $('[name="fd_date_edit"]').val(result.fd_date);
                        $('[name="fc_barcode_edit"]').val(result.fc_barcode);
                        $('[name="fc_kdstock_edit"]').val(result.fc_kdstock);
                        $('[name="fv_nmbarang_edit"]').val(result.fv_nmbarang);
                        $('[name="fc_kdkelompok_edit"]').val(result.fc_kdkelompok);
                        $('[name="fc_kdlokasi_edit"]').val(result.fc_kdlokasi);
                        $('[name="fc_salesid_edit"]').val(result.fc_salesid);
                        $('[name="ff_berat_edit"]').val(result.ff_berat);
                        $('[name="fc_kadar_edit"]').val(result.fc_kadar);
                        $('[name="fm_ongkos_edit"]').val(result.fm_ongkos);
                        $('[name="fm_hargabeli_edit"]').val(result.fm_hargabeli);
                        $('[name="fm_hargajual_edit"]').val(result.fm_hargajual);
                        $('[name="f_foto_edit"]').val(result.f_foto);
                        $('[name="fc_sts_edit"]').val(result.fc_sts);
                        $('[name="fn_stock_edit"]').val(result.fn_stock);
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
