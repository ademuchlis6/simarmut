<?php 
$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
$tgl=date('j');
$array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bln = $array_bln[date('n')];
$thn = date('Y');
?>
<html>
<head>
	<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 60%}
	tr { border: solid 1px #000}
	td { padding: 7px 5px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Agenda Surat Masuk</title>
</head>

<body onload="window.print()">
	<tr><td colspan="3">
	<div style="margin-left: 5px; text-align: center; font-size: 16px"><img src="<?php echo base_url('upload/bog.png');?>" style="float: left;margin:0 8px 4px 0;"><h3 style ="text-align: center">P E M E R I N T A H  K A B U P A T E N B O G O R</h3></div>
	<h2 style="text-align: center; margin-left: 100px; font-size: 22px"><?php echo $q_instansi->nama; ?></h2>
	<h2 style="text-align: center; margin-left: 90px; font-size: 10px">Alamat : <?php echo $q_instansi->alamat; ?></h2>
	<br>
	<hr width="95%" align="center" >
	<hr width="95%" align="center" style="border:solid 2px">
	</td>
	</tr>
	
	
	</td></tr>
	<center><b style="font-size: 18px">AGENDA SURAT MASUK</b><br>
	Dari tanggal <b><?php echo tgl_jam_sql($tgl_start)."</b> sampai dengan tanggal <b>".tgl_jam_sql($tgl_end)."</b>"; ?>
	</center><br>
	
	<table rules="all">
		<thead>
			<tr>
				<th width="5%">No</td>
				<th width="5%">Kode Klas</td>
				<th width="23%">No Naskah Dinas</td>
				<th width="7%">Tanggal Penerimaan</td>
				<th width="28%">Uraian / Perihal</td>
				<th width="7%">Tanggal Penyampaian</td>
				<th width="10%">Pengolah</td>
				<th width="10%">Keterangan</td>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (!empty($data)) {
				$no = 0;
				foreach ($data as $d) {
					$no++;
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $d->kode; ?></td>
				<td><?php echo $d->dari."<br>".$d->no_surat."<br>".$d->tgl_surat; ?></td>
				<td align="center"><?php echo tgl_jam_sql($d->tgl_diterima); ?></td>
				<td><?php echo $d->isi_ringkas; ?></td>
				<td align="center"><?php echo tgl_jam_sql($d->tgl_diterima); ?></td>
				<td><?php echo $d->keterangan; ?></td>
				<td></td>
			</tr>
			<?php 
				}
			} else {
				echo "<tr><td style='text-align: center'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
<br>
<br>


<div>
	<div style="width:250px;float:right;text-align: center;line-height:1.5">
	<td>Cibinong, <?php echo $tgl . " " . $bln . " " . $thn . " ";?></td>
		<br> Kepala UPT
		<br>
		<br>
		<br>
		<br>
		<br><u><b><td><?php echo $q_instansi->kepsek;?></td><br></b></u>
		<td>NIP. <?php echo $q_instansi->nip_kepsek;?></td>
	</div>
	
</div>
</html>

