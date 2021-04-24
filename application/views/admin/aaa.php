<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <head>
        <title>. SIMARMUT .</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <style type="text/css">
            @font-face {
                font-family: 'Cabin';
                font-style: normal;
                font-weight: 400;
                src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo base_url();
                                                                            ?>aset/font/satu.woff) format('woff');
            }

            @font-face {
                font-family: 'Cabin';
                font-style: normal;
                font-weight: 700;
                src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo base_url();
                                                                    ?>aset/font/dua.woff) format('woff');
            }

            @font-face {
                font-family: 'Lobster';
                font-style: normal;
                font-weight: 400;
                src: local('Lobster'), url(<?php echo base_url();
                                            ?>aset/font/tiga.woff) format('woff');
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap.css" media="screen">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
      <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>aset/js/jquery/jquery-ui.css" />

        <script src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>aset/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>aset/js/bootswatch.js"></script>
        <script src="<?php echo base_url(); ?>aset/js/jquery/jquery-ui.js"></script>
        <script type="text/javascript">
            // <![CDATA[
            $(document).ready(function() {
                $(function() {
                    // $("#kode_surat").autocomplete({
                    //     source: function(request, response) {
                    //         $.ajax({
                    //             url: "<?php echo site_url('index.php/admin/get_klasifikasi'); ?>",
                    //             data: {
                    //                 kode: $("#kode_surat").val()
                    //             },
                    //             dataType: "json",
                    //             type: "POST",
                    //             success: function(data) {
                    //                 response(data);
                    //             }
                    //         });
                    //     },
                    // });
                });

                // $(function() {
                //     $("#jenis").autocomplete({
                //         source: function(request, response) {
                //             $.ajax({
                //                 url: "<?php echo site_url('index.php/admin/get_jenis'); ?>",
                //                 data: {
                //                     kode: $("#kode_surat").val()
                //                 },
                //                 dataType: "json",
                //                 type: "POST",
                //                 success: function(data) {
                //                     response(data);
                //                 }
                //             });
                //         },
                //     });
                // });

                $(function() {
                    $("#dari").autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: "<?php echo site_url('index.php/admin/get_instansi_lain'); ?>",
                                data: {
                                    kode: $("#dari").val()
                                },
                                dataType: "json",
                                type: "POST",
                                success: function(data) {
                                    response(data);
                                }
                            });
                        },
                    });
                });


                $(function() {
                    $("#tgl_surat").datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd'
                    });
                });

                // $(function() {
                //     $("#tgl_surat, #jenis").keyup(function() {
                //         var tgl_surat = $("#tgl_surat").val();
                //         var jenis = $("#jenis").val();
                //         var hariKedepan = new Date(Date.parse(tgl_surat) + (jenis * 24 * 60 * 60 *
                //             1000)).toISOString().substring(0, 10);

                //         $("#tgl_selesai").val(hariKedepan);

                //     });
                // });





            });
            // ]]>
        </script>
    </head>

<body style="">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <span class="navbar-brand"><strong style="font-family: verdana;">SIMARMUT</strong></span>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>



            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>index.php/admin"><i class="icon-home icon-white"> </i>
                            Beranda</a></li>


                    <?php
                    if ($this->session->userdata('admin_level') == "Super Admin") {
                    ?>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-th-list icon-white"> </i> Referensi <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/klas_surat">Klasifikasi
                                        Surat</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/jenis_surat">Jenis
                                        Surat</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-wrench icon-white"> </i> Pengaturan <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/pengguna">Instansi
                                        Pengguna</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/manage_admin">Manajemen
                                        Admin</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>


                    <?php
                    if ($this->session->userdata('admin_level') != "Super Admin") {
                    ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-th-list icon-white"> </i> Referensi <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/klas_surat">Klasifikasi
                                        Surat</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/jenis_surat">Jenis
                                        Surat</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-random icon-white"> </i> Catat Surat <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/surat_masuk">Surat
                                        Masuk</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/surat_keluar">Surat
                                        Keluar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-file icon-white"> </i> Buku Agenda <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/agenda_surat_masuk">
                                        Surat Masuk</a></li>
                                <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/agenda_surat_keluar">
                                        Surat Keluar</a></li>
                            </ul>
                        </li>
                    <?php } ?>



                    <?php
                    if ($this->session->userdata('admin_id') == 6) {
                    ?>
                        <li><a href="<?php echo base_url(); ?>index.php/lacak"><i class="icon-file icon-white"> </i>
                                Lacak Surat</a></li>
                    <?php
                    }
                    ?>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes"><i class="icon-user icon-white"></i><?php echo $this->session->userdata('admin_level') . ' | ' . $this->session->userdata('admin_nama'); ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="themes">
                            <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/passwod">Rubah
                                    Password</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a></li>
                            <li><a tabindex="-1" href="<?php echo base_url('upload/MANUAL_BOOK_ASOKA.docx'); ?>">Help</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <?php
    $q_instansi    = $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
    echo $this->session->userdata('admin_level');
    ?>
    <div class="container">

        <div class="page-header" id="banner">
            <div class="row">
                <div class="" style="padding: 15px 15px 0 15px;">
                    <div class="well well-sm">
                        <!-- <img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>"
                            class="thumbnail span3"
                            style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
                        <h2 style="margin: 15px 10px 10px 0; color: #000;"><?php echo $q_instansi->nama; ?></h2>
                        <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat :
                                <?php echo $q_instansi->alamat; ?></b></div> -->
                        <div style="text-align: center;font-size: 18px">P E M E R I N T A H K A B U P A T E N B O G O R</div>
                        <div style="margin-left: 2px; text-align: center"><img src="<?php echo base_url('upload/logo2.png'); ?>" style="float: left;margin:0 0px 4px 0;"></div>
                        <div style="margin-right: 2px; text-align: center"><img src="<?php echo base_url('upload/logo1.png'); ?>" style="float: right;margin:0 0px 8px 0;"></div>

                        <!-- <h4 style="margin: 5px 0 0.4em 0; font-size: 18px; color: #000; font-weight: bold"><?php echo $q_instansi->nama; ?></h4> -->
                        <div style="text-align: center;margin-left: 50px;font-weight: bold;font-size: 23px">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</div>
                        <div style="margin-left: 2px; text-align: center"><img src="<?php echo base_url('upload/logo3.png'); ?>" style="float: center;width: 540px;"></div>
                        <div style="color: #000; font-size: 15px;text-align: center"><?php echo $q_instansi->alamat; ?></div>
                        <div style="text-align: center;  font-size: 15px">Email: uptlabdpupr@gmail.com</div>


                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/' . $page); ?>

        <div class="span12 well well-sm">
            <h4 style="font-weight: bold">SIMARMUT (SISTEM INFORMASI MANAJEMEN SURAT MENYURAT)</h4>
            <h6>&copy; 2020. Waktu Eksekusi : {elapsed_time}, Penggunaan Memori : {memory_usage}</h6>
        </div>

    </div>


</body>

</html>