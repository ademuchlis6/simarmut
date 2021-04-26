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
            padding: 5px 3px
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
            width: 70%
        }

        tr {
            border: solid 1px #000
        }

        td {
            padding: 5px 3px
        }

        h3 {
            margin-bottom: -15px
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
                <div style="margin-left: 2px; text-align: center"><img src="<?php echo base_url('upload/logo2.png'); ?>" style="float: left;margin:0 0px 4px 0;"></div>
                <div style="margin-right: 2px; text-align: center"><img src="<?php echo base_url('upload/logo1.png'); ?>" style="float: right;margin:0 0px 8px 0;"></div>
                <div style="text-align: center;font-size: 12px">P E M E R I N T A H K A B U P A T E N B O G O R</div>
                <!-- <h4 style="margin: 5px 0 0.4em 0; font-size: 18px; color: #000; font-weight: bold"><?php echo $q_instansi->nama; ?></h4> -->
                <div style="text-align: center;margin-left: 50px;font-weight: bold;font-size: 12px">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</div>
                <div style="margin-left: 2px; text-align: center"><img src="<?php echo base_url('upload/logo3.png'); ?>" style="float: center;width: 300px;"></div>
                <div style="color: #000; font-size: 9.5px;text-align: center"><?php echo $q_instansi->alamat; ?></div>
                <div style="text-align: center;  font-size: 9px">Email: uptlabdpupr@gmail.com</div>
            </td>
        </tr>

        <td colspan="3" align="center" style="padding: 10px 0"><b style="font-size: 13px;">LEMBAR DISPOSISI</b></td>
        <tr>
            <td style="font-size: 12px"><b>No Urut Surat</b></td>
            <td style="font-size: 12px" colspan="2">: <?php echo $datpil1->no_agenda; ?></td>
        </tr>
        <tr>
            <td style="height: 30px;font-size: 12px" valign="top" width="15%"><b>Index</b></td>
            <td style="font-size: 12px" valign="top" width="30%">: <?php echo $datpil1->indek_berkas; ?><br></td>
            <td valign="top" style="border-left: solid 1px;font-size: 12px "><b>Tanggal Penyelesaian : </b><br><br>
                <li style="font-size: 12px"><?php echo tgl_jam_sql($datpil1->tgl_diterima); ?></li>
            </td>
        <tr>
            <td style=" font-size: 12px;"><b>Dari</b>
            </td>
            <td colspan="2" style="font-size: 12px;">: <?php echo $datpil1->dari; ?></td>
        </tr>
        <tr>
            <td valign="top" style="font-size: 12px"><b>Perihal</b></td>
            <td valign="top" style="font-size:12px" colspan="2">: <?php echo $datpil1->kegiatan; ?></td>
        </tr>
        <tr>
            <td style="font-size:12px" valign="top"><b>Isi Ringkas</b></td>
            <td valign="top" style="height: 55px;font-size: 12px;" colspan="2">: <?php echo $datpil1->isi_ringkas; ?></td>
        </tr>
        <tr>
            <td style="font-size:12px" width="25%"><b>Tanggal Surat</b></td>
            <td style="font-size:12px" colspan="2">: <?php echo tgl_jam_sql($datpil1->tgl_surat); ?></td>
        </tr>
        <tr>
            <td style="font-size:12px"><b>No. Surat &nbsp;&nbsp; </b></td>
            <td style="font-size:12px" colspan="2">: <?php echo $datpil1->no_surat; ?> </b> </td>
        </tr>
        <tr>
            <td style="height: 330px;font-size:12px" valign="top" colspan="2"><b>Instruksi / Informasi : </b> <br>

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
            <td valign="top" width="100%" style="border-left: solid 1px;font-size:12px">
                <b>Diteruskan kepada : </b><br><br>
                <!-- <?php echo "<b>&nbsp&nbsp&nbsp&nbsp" . " Yth Kasubag TU" . "</b><br>"; ?> -->
                <?php
                if (!empty($datpil2)) {
                    foreach ($datpil2 as $dp) {
                        $a = $dp->level;
                        echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>" . " $a" . "</b> <br>";
                    }
                }

                ?>

                <ol>
                    <?php
                    if (!empty($datpil2)) {
                        foreach ($datpil2 as $dp) {
                            $a = $dp->kpd_yth_2;
                        }
                    }
                    if (!empty($datpil3)) {
                        foreach ($datpil3 as $d3) {
                            // echo "<b>&nbsp&nbsp&nbsp&nbsp" . " $a" . "</b><br><br>";
                            echo "<li><b><i>" . $d3->isi_disposisi_2 . "</i></b>.<br><br><br><br><br><br><br><br><br>
                                Tanggal Disposisi : " . tgl_jam_sql($d3->tgl_dis_2) . " </li>";
                        }
                    }
                    ?>
                </ol>

            </td>
        </tr>

    </table>
</body>

</html>