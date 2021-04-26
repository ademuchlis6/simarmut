<?php
$mode        = $this->uri->segment(3);

if ($mode == "edt" || $mode == "act_edt") {
    $act        = "act_edt";
    $idp        = $datpil->id;
    $no_agenda    = $datpil->no_agenda;
    $indek_berkas = $datpil->indek_berkas;
    $kegiatan    = $datpil->kegiatan;
    $kode        = $datpil->kode;
    $dari        = $datpil->dari;
    $no_surat    = $datpil->no_surat;
    $tgl_surat    = $datpil->tgl_surat;
    $uraian        = $datpil->isi_ringkas;
    $ket        = $datpil->keterangan;
    // $tgl_selesai	= $datpil->tgl_selesai;
    // $jenis		= $datpil->jenis.'|'.$jenisB;
?>
    <script>
        $(document).ready(function() {
            $("#jenis").val('<?php echo $jenis; ?>')
            $("#tgl_selesaix").val('<?php echo $tgl_selesai; ?>')
            $("#tgl_selesai").val('<?php echo $tgl_selesai; ?>')
            $("#tgl_selesaix").val($("#tgl_selesai").val());
            $("#tgl_surat, #jenis").change(function() {
                let jenis = $("#jenis").val();
                let tgl_surat = $("#tgl_surat").val();
                if (!tgl_surat) {
                    alert('harap pilih tanggal surat');
                    $("#jenis").val('');
                    return false;
                } else {
                    let arr = jenis.split('|');
                    let jenisWaktu = arr[1];
                    var hariKedepan = new Date(Date.parse(tgl_surat) + (jenisWaktu * 24 * 60 * 60 *
                        1000)).toISOString().substring(0, 10);
                    $("#tgl_selesai").val(hariKedepan);
                    $("#tgl_selesaix").val(hariKedepan);
                }

            });
        });
    </script>

<?php

} else {
    $act        = "act_add";
    $idp        = "";
    $no_agenda    = $nomer_terakhir;
    $indek_berkas = "";
    $kegiatan    = "";
    $kode        = "";
    $dari        = "";
    $no_surat    = "";
    $tgl_surat    = "";
    $uraian        = "";
    $ket        = "";
    //$tgl_selesai	="";
    // $jenis		= "";

?>

    <script>
        $(document).ready(function() {
            $("#tgl_selesaix").val($("#tgl_selesai").val());
            $("#tgl_surat,#jenis").change(function() {
                let jenis = $("#jenis").val();
                let tgl_surat = $("#tgl_surat").val();
                if (!tgl_surat) {
                    alert('harap pilih tanggal surat');
                    $("#jenis").val('');
                    return false;
                } else {
                    let arr = jenis.split('|');
                    let jenisWaktu = arr[1];
                    var hariKedepan = new Date(Date.parse(tgl_surat) + (jenisWaktu * 24 * 60 * 60 *
                        1000)).toISOString().substring(0, 10);
                    $("#tgl_selesai").val(hariKedepan);
                    $("#tgl_selesaix").val(hariKedepan);
                }

            });

        });
    </script>
<?php

}
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 style="margin-top: 5px">Surat Masuk</h3>
    </div>
</div>

<form action="<?php echo base_URL(); ?>index.php/admin/surat_masuk/<?php echo $act; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">

    <input type="hidden" name="idp" value="<?php echo $idp; ?>">


    <div class="row-fluid well" style="overflow: hidden">

        <div class="col-lg-6">
            <table class="table-form">
                <tr>
                    <td width="20%">No. Surat</td>
                    <td><b><input type="text" name="no_agenda" autofocus tabindex="1" required value="<?php echo $no_agenda; ?>" style="width: 100px" class="form-control"></b></td>
                </tr>
                <tr>
                    <td width="20%">Asal Surat</td>
                    <td><b><input type="text" name="dari" tabindex="2" required value="<?php echo $dari; ?>" id="dari" style="width: 400px" class="form-control"></b></td>
                </tr>
                <tr>
                    <td width="20%">Nomor Surat</td>
                    <td><b><input type="text" name="no_surat" tabindex="3" required value="<?php echo $no_surat; ?>" style="width: 300px" class="form-control"></td>
                </tr>
                <tr>
                    <td width="20%">Perihal</td>
                    <td><b><textarea name="kegiatan" tabindex="4" required style="width: 400px; height: 90px" class="form-control"><?php echo $kegiatan; ?></textarea></b></td>
                </tr>
                <tr>
                    <td width="20%">Isi Ringkas</td>
                    <td><b><textarea name="uraian" tabindex="4" required style="width: 400px; height: 90px" class="form-control"><?php echo $uraian; ?></textarea></b></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br><button type="submit" class="btn btn-primary" tabindex="10"><i class="icon icon-ok icon-white"></i> Simpan</button>
                        <a href="<?php echo base_URL(); ?>index.php/admin/surat_masuk" class="btn btn-success" tabindex="12"><i class="icon icon-arrow-left icon-white"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </div>

        <div class="col-lg-6">
            <table class="table-form">
                <tr>
                    <td width="20%">Kode Klasifikasi</td>
                    <td>
                        <b>
                            <!-- <input type="text" name="kode" tabindex="5" id="kode_surat" required
                                value="<?php echo $kode; ?>" style="width: 100px" class="form-control"> -->
                            <select name="kode" id="kode_surat" class="form-control" required>
                                <?php foreach ($klas as $list) {
                                ?>
                                    <option value='<?php echo $list['kode'] ?>'>
                                        <?php echo $list['kode'] ?>. <?php echo $list['nama'] ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </b>
                    </td>
                </tr>

                <tr>
                    <td width="20%">Indeks Berkas</td>
                    <td><b><input type="text" name="indek_berkas" tabindex="6" value="<?php echo $indek_berkas; ?>" style="width: 300px" class="form-control"></b></td>
                </tr>
                <tr>
                    <td width="20%">Tanggal Surat</td>
                    <td><b><input type="text" name="tgl_surat" tabindex="7" required value="<?php echo $tgl_surat; ?>" id="tgl_surat" style="width: 100px" class="form-control"></b></td>
                </tr>

                <!-- <tr>
                    <td width="20%">Jenis Surat</td>
                    <td>
                        <b>
                            <!-- <input type="text" name="jenis" tabindex="8" id="jenis" required
                                value="<?php echo $jenis; ?>" style="width: 100px" class="form-control"></b> -->
                <!-- <select name="jenis" class="form-control" id='jenis' required>
                    <option value=''>==Pilih jenis surat==</option>
                    <?php foreach ($jenisSurat as $list) {
                    ?>
                        <option value='<?php echo $list['id'] . '|' . $list['waktu'] ?>'>
                            <?php echo $list['id'] ?>. <?php echo $list['nama'] ?>. Waktu :
                            <?php echo $list['waktu'] ?> hari
                        </option>
                    <?php
                    }
                    ?>
                </select> -->
                </td>
                </tr>

                <!-- <tr>
                    <td width="20%">Tanggal selesai</td>
                    <td>
                        <b>
                            <input type="text" name="tgl_selesaix" id="tgl_selesaix" style="width: 200px" class="form-control" disabled>
                            <input type="hidden" value='' name="tgl_selesai" id="tgl_selesai" style="width: 200px" class="form-control">
                        </b>
                    </td>
                </tr> -->
                <tr>
                    <td width="20%">File Surat (Scan)</td>
                    <td><b><input type="file" name="file_surat" tabindex="10" class="form-control" style="width: 200px"></b></td>
                </tr>
                <tr>
                    <td width="20%">Pengolah</td>
                    <td>
                        <b>
                            <!-- <input type="text" name="ket" value="<?php echo $ket; ?>" tabindex="11" style="width: 400px"
                                class="form-control"> -->
                            <input type="text" name="ketx" value="<?php echo $this->session->userdata('admin_nama') ?>" tabindex="11" style="width: 400px" class="form-control" disabled>
                            <input type="hidden" name="ket" value="<?php echo $this->session->userdata('admin_nama') ?>" tabindex="11" style="width: 400px" class="form-control">
                        </b>
                    </td>
                </tr>
            </table>
        </div>

    </div>

</form>