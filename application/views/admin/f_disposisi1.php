<?php
$q_instansi    = $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
?>

<html>

<head>
    <style type="text/css" media="print">
        table {
            border: solid 1px #000;
            border-collapse: collapse;
            width: 100%
        }

        tr {
            border: solid 1px #000
        }

        td {
            padding: 7px 5px
        }

        h3 {
            margin-bottom: -17px
        }

        h2 {
            margin-bottom: 0px
        }
    </style>
    <style type="text/css" media="screen">
        table {
            border: solid 1px #000;
            border-collapse: collapse;
            width: 60%
        }

        tr {
            border: solid 1px #000
        }

        td {
            font-size: 12px;
            padding: 7px 5px
        }

        h3 {
            margin-bottom: -17px
        }

        h2 {
            margin-bottom: 0px
        }
    </style>

</head>

<body onload="window.print()">
    <table>

        <tr>
            <td colspan="3">
                <div style="margin-left: 5px; text-align: center; font-size: 16px"><img src="<?php echo base_url('upload/logo2.png'); ?>" style="float: left;margin:0 8px 4px 0;">
                    <div style="margin-right: 5px; text-align: center; font-size: 16px"><img src="<?php echo base_url('upload/logo1.png'); ?>" style="float: right;margin:0 8px 4px 0;">
                        <div style="text-align: center,font-size: 16px">P E M E R I N T A H K A B U P A T E N B O G O R </div>
                        <div style="margin: 5px 0px 5px 0px; 
                                text-align: center; 
                                margin-left: 50px; 
                                font-weight: bold; 
                                font-size: 18px">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG<br>
                            UPT LABORATORIUM BAHAN KONSTRUKSI KELAS A<br>
                        </div>
                        <div style="margin: 5px 0px 5px 0px; 
                                text-align: center; 
                                margin-left: 50px; 
                                font-size: 18px">"Infrastruktur Keren Kabupaten Bogor Beken"</div>
                        <!-- <?php echo $q_instansi->nama; ?> -->
                        <h2 style="text-align: center;  font-size: 10px">
                            <?php echo $q_instansi->alamat; ?></h2>
                        <h2 style="text-align: center;  font-size: 10px">
                            Email: uptlabdpupr@gmail.com</h2>
            </td>
        </tr>

        <td colspan="3" align="center" style="padding: 15px 0"><b style="font-size: 21px;">LEMBAR DISPOSISI</b></td>
        <tr>
            <td><b>No Urut Surat</b></td>
            <td colspan="2">: <?php echo $datpil1->no_agenda; ?></td>
        </tr>
        <tr>
            <td style="height: 70px" valign="top" width="25%"><b>Index</b></td>
            <td valign="top" width="35%">: <?php echo $datpil1->indek_berkas; ?><br></td>
            <td valign="top" style="border-left: solid 1px "><b>Tanggal Penyelesaian : </b><br><br>
                <li><?php echo tgl_jam_sql($datpil1->tgl_diterima); ?></li>
            </td>
        <tr>
            <td><b>Dari</b></td>
            <td colspan="2">: <?php echo $datpil1->dari; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Perihal</b></td>
            <td valign="top" style="height: 35px" colspan="2">: <?php echo $datpil1->kegiatan; ?></td>
        </tr>
        <tr>
            <td valign="top"><b>Isi Ringkas</b></td>
            <td valign="top" style="height: 70px" colspan="2">: <?php echo $datpil1->isi_ringkas; ?></td>
        </tr>
        <tr>
            <td width="25%"><b>Tanggal Surat</b></td>
            <td colspan="2">: <?php echo tgl_jam_sql($datpil1->tgl_surat); ?></td>
        </tr>
        <tr>
            <td><b>No. Surat &nbsp;&nbsp; </b></td>
            <td colspan="2">: <?php echo $datpil1->no_surat; ?> </b> </td>
        </tr>
        <tr>
            <td style="height: 360px" valign="top" colspan="2"><b>Instruksi / Informasi : </b> <br>

                <ol>
                    <?php
                    if (!empty($datpil2)) {
                        foreach ($datpil2 as $dp) {
                            $a = $dp->kpd_yth;
                        }
                    }

                    //ini untuk menampilkan nama tujuan
                    // Kepada :".  $a. "
                    if (!empty($datpil3)) {
                        foreach ($datpil3 as $d3) {
                            echo "<li><b><i>" . $d3->isi_disposisi . "</i></b>.<br><br> 
                        <br><br><br><br><br><br><br><br><br>
                        Tanggal Disposisi : " . tgl_jam_sql($d3->batas_waktu) . " </li>";
                        }
                    }
                    ?>
                </ol>


                </b>
            </td>
            <td valign="top" width="50%" style="border-left: solid 1px">
                <b>Diteruskan kepada : </b>

                <!-- <?php
                        if (!empty($datpil2)) {
                            foreach ($datpil2 as $dp) {
                                echo "<li>" . $dp->kpd_yth . "</li>";
                            }
                        }

                        // digunakan untuk menampilkan nama pelaksana
                        //Kepada :" .  $a . "
                        ?> -->

                <ol>
                    <?php
                    if (!empty($datpil2)) {
                        foreach ($datpil2 as $dp) {
                            $a = $dp->kpd_yth_2;
                        }
                    }
                    if (!empty($datpil3)) {
                        foreach ($datpil3 as $d3) {
                            // echo "<b>" . "Yth Kasubag TU" . "</b>.<br><br>";
                            echo "<li><b><i>" . $d3->isi_disposisi_2 . "</i></b>.<br><br> 
                                <br><br><br><br><br><br><br>
                                Tanggal Disposisi : " . tgl_jam_sql($d3->tgl_dis_2) . " </li>";
                        }
                    }
                    ?>
                </ol>

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <br>
            </td>
        </tr>
    </table>
</body>

</html>