<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>. SIMARMUT .</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<style type="text/css">
		@font-face {
			font-family: 'Cabin';
			font-style: normal;
			font-weight: 400;
			src: local('Cabin Regular'), local('Cabin-Regular'), url(<?php echo base_url(); ?>aset/font/satu.woff) format('woff');
		}

		@font-face {
			font-family: 'Cabin';
			font-style: normal;
			font-weight: 700;
			src: local('Cabin Bold'), local('Cabin-Bold'), url(<?php echo base_url(); ?>aset/font/dua.woff) format('woff');
		}

		@font-face {
			font-family: 'Lobster';
			font-style: normal;
			font-weight: 400;
			src: local('Lobster'), url(<?php echo base_url(); ?>aset/font/tiga.woff) format('woff');
		}
	</style>
	<link rel="stylesheet" href="<?php echo base_url(); ?>aset/css/bootstrap.css" media="screen">

	<script src="<?php echo base_url(); ?>aset/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>aset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>aset/js/bootswatch.js"></script>
	<script src="<?php echo base_url(); ?>aset/js/jquery.chained.js"></script>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<span class="navbar-brand"><strong style="font-family: verdana; margin-left: 220px; text-align: center">SIMARMUT (SISTEM INFORMASI MANAJEMEN SURAT MENYURAT)</strong></span>
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

		</div>
	</div>

	<?php
	$q_instansi	= $this->db->query("SELECT * FROM tr_instansi LIMIT 1")->row();
	?>
	<div class="container">
		<br><br>
		<div class="container-fluid" style="margin-top: 30px">

			<div class="row-fluid">
				<div style="width:570px; margin: 0 auto">
					<div class="well well-sm" style=" width:590px; margin: 0 auto">
						<!-- <img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 80px; height: 80px"> -->
						<div style="margin-left: 2px; text-align: center"><img src="<?php echo base_url('upload/logo2.png'); ?>" style="float: left;margin:0 0px 4px 0;"></div>
						<div style="margin-right: 2px; text-align: center"><img src="<?php echo base_url('upload/logo1.png'); ?>" style="float: right;margin:0 0px 8px 0;"></div>
						<div style="text-align: center;font-size: 12px">P E M E R I N T A H K A B U P A T E N B O G O R</div>
						<!-- <h4 style="margin: 5px 0 0.4em 0; font-size: 18px; color: #000; font-weight: bold"><?php echo $q_instansi->nama; ?></h4> -->
						<div style="text-align: center;margin-left: 50px;font-weight: bold;font-size: 15px">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</div>
						<div style="margin-left: 2px; text-align: center"><img src="<?php echo base_url('upload/logo3.png'); ?>" style="float: center;width: 350px;"></div>
						<div style="color: #000; font-size: 10px;text-align: center"><?php echo $q_instansi->alamat; ?></div>
						<div style="text-align: center;  font-size: 9px">Email: uptlabdpupr@gmail.com</div>

						<div class="well" style="width: 570px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
							<form action="<?php echo base_URL(); ?>index.php/admin/do_login" method="post">
								<center>
									<legend>Login Admin</legend>
								</center>
								<!-- <center>Login Admin</b></center> -->
								<?php echo $this->session->flashdata("k"); ?>
								<table align="center" style="margin-bottom: 0" class="table-form" width="90%">
									<tr>
										<td width="40%">Username</td>
										<td><input type="text" autofocus name="u" required style="width: 200px" autofocus class="form-control"></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="p" required style="width: 200px" class="form-control"></td>
									</tr>
									<tr>
										<td>Tahun</td>
										<td><select name="ta" class="form-control" required style="width: 200px">
												<option value="">--</option>
												<?php
												for ($i = 2017; $i <= (date('Y')); $i++) {
													if (date('Y') == $i) {
														echo "<option value='$i' selected>$i</option>";
													} else {
														echo "<option value='$i'>$i</option>";
													}
												}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td></td>
										<td><br><input style="width: 100px" type="submit" class="btn btn-success" value="Login"></td>
									</tr>
								</table>
							</form>
						</div>
						<!--/span-->
					</div>
					<!--/row-->

				</div>
				<!--/.fluid-container-->
				<center style="margin-top: -15px;">Versi 2.0 (Feb 2021) &copy;N.A</a>
					<br>
				</center>

				<script type="text/javascript">
					$(document).ready(function() {
						$(" #alert").fadeOut(6000);
					});
				</script>
				<div class="navbar navbar-inverse navbar-fixed-bottom">
				</div>
			</div>
		</div>
	</div>
</body>

</html>