<?php $this->load->view('partials/header.php') ?>

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

                <img src="../Toko-Emas-Modasan/backend-emas/assets/assets/avatars/user.jpg" alt="Jason's Photo" />
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
                        <img class="nav-user-photo" src="../Toko-Emas-Modasan/backend-emas/assets/assets/avatars/user.jpg" alt="Jason's Photo" />
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
						<a class="dropdown-toggle">
							<i class="menu-icon <?=$rs->icon_class?>"></i>
							<span class="menu-text">
								<?=$rs->nama_menu?>
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

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
                        Pengaturan
                    </h2>
                </div>
                <div class="row">
                    <div class="col-xs-12" style="margin-top: 30px;">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <table id="simple-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <tr>
                                            <th class="center">
                                                <input type="checkbox" id="check-all" />
                                            </th>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = $this->uri->segment('3') + 1; ?>
                                        <?php foreach ($pengaturan as $u) : ?>
                                            <tr>
                                                <td class="check center">
                                                    <input type="checkbox" class="check-item" id="user" name="fc_userid[]" value="<?php echo $u->fc_userid ?>">
                                                </td>
                                                <td><?= $no++ ?></td>
                                                <td><?= $u->fv_username ?></td>
                                                <td><?= $u->fc_kdposisi ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class=" btn btn-primary" style="margin-left: 10px;">
                                <i class="fa fa-save">
                                    Tambah Operator Baru
                                </i>
                            </a>

                            <a href="#" data-toggle="modal" data-target="#exampleModal2" class="btn btn-success">
                                <i class="fa fa-edit">
                                    Edit
                                </i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fa fa-trash">
                                    Hapus
                                </i>
                            </a>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5>Tambah Data Operator</h5>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="">
                                        </div>
                                        <div class="form-group">
                                            <label>Ulangi Password</label>
                                            <input type="password" class="form-control" name="">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Jendela Barang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Tambah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Edit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Hapus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save">
                                                Simpan</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h5>Edit Data Operator</h5>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" id="pw1" class="form-control" name="">
                                        </div>
                                        <div class="form-group">
                                            <label>Ulangi Password</label>
                                            <input type="password" id="pw2" class="form-control" name="">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Jendela Barang
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Tambah
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Edit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Hapus
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"> Close</i></button>
                                        <button type="submit" class="btn btn-primary" value="cek"><i class="fa fa-save">Simpan</i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="margin-top: 20px;">
                        <h5>Data Toko</h5>
                        <form>
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" class="form-control" placeholder="Nama Toko...">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat...">
                            </div>
                            <div class="form-group">
                                <label>Telp</label>
                                <input type="text" class="form-control" placeholder="Telp...">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4" style="margin-top: 40px; margin-left: 20px;">
                        <img src="../../assets/assets/img/php.png" width="200" height="100">
                    </div>
                    </form>
                </div>
                <!-- /.page-header -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->


</div>

<script>
    $(".check-item").on("click", function() {
        if ($(".check-item:checked").length < 2) {
            $('.action-update').prop('disabled', false);
        } else {
            $('.action-update').prop('disabled', true);
        }
    });

    window.onload = function() {
        document.getElementById("pw1").onchange = validatePassword;
        document.getElementById("pw2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("pw2").value;
        var pass1 = document.getElementById("pw1").value;
        if (pass1 != pass2)
            document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
        else
            document.getElementById("pw2").setCustomValidity('');
    }
</script>


<?php $this->load->view('partials/footer.php') ?>
<?php $this->load->view('partials/js.php') ?>
