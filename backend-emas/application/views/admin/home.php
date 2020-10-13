<?php $this->load->view('partials/header.php') ?>
<?php $this->load->view('partials/navbar.php') ?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Selamat Datang....
                </h1>
                <h4 style="margin-left: 85%;">
                    <script type='text/javascript'>
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                        var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

                        var date = new Date();

                        var day = date.getDate();

                        var month = date.getMonth();

                        var thisDay = date.getDay(),

                            thisDay = myDays[thisDay];
                        var yy = date.getYear();


                        var year = (yy < 1000) ? yy + 1900 : yy;

                        document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    </script>
                </h4>
            </div>
            <!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                </div>
            </div>
        </div>

        <?php $this->load->view('partials/footer.php') ?>
        <?php $this->load->view('partials/js.php') ?>