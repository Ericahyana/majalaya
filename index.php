<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kecamatan Majalaya </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
	<link rel="icon" type="iamge/png" href="image/bandung.png">
	<!-- Stepper CSS -->
	<link href="css/steppers.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
</head>
<body>

	<?php
	array_key_exists('page', $_GET) ? $page = $_GET['page'] : $page = '';
	?>
	
	<?php
	include "class/pengajuan.php";
	$pengajuan = new pengajuan();
	?>	

	<div class="header" id="header">
		<h1><img src="image/bandung.png" alt="bandung" width="100" height="50">Kecamatan Majalaya</h1>
	</div>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li <?php if(!$page || $page==''); ?>><a href="index.php">Beranda</a></li>
				<li <?php if(!$page || $page=='profil'); ?>><a href="index.php?page=profil">Tentang Kecamatan</a></li>
				<li <?php if(!$page || $page=='kk'); ?>><a href="index.php?page=kk">Layanan</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><button type="button" class="btn" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Log-in</button></li>
			</ul>
		</div> 
	</nav>
	
	
	
	<!-- Content -->
	<div class="container">
		
		<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-sm">
				
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Log-in</h4>
					</div>
					<div class="modal-body">
						<form action="admin/controller/cek_login.php" method="post" >
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input id="username" type="text" class="form-control" name="username" placeholder="Username">
							</div>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input id="password" type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
						<div class="modal-footer" style="text-align:center;">
							<input type="submit" value="Masuk" class="btn btn-default">
						</div>
					</form>
				</div>
				
			</div>
		</div>
		
		<div class="row" >
			<div class="col-md-12">
				
				<h4 style="font-family: Ad Hoc; text-align: center; background-color: #3b90ad; padding: 10px; color: white;">Sudah pernah mengajukan permohonan ? Silahkan pantau progress permohonan anda melalui <strong><a href="index.php?page=progress" style="color:lavender;">e-Progress</a></strong></h4>
				
				
			</div>
		</div>
		<?php
		if($page=="") {				
			include "view/beranda.php";	
		};
		
		if($page=="profil") {				
			include "view/profil.php";	
		};	
		
		if($page=="kk") {				
			include "view/layanan/kk.php";	
		};
		
		if($page=="ktp") {				
			include "view/layanan/ktp.php";	
		};		
		
		if($page=="spd") {				
			include "view/layanan/spd.php";	
		};
		
		if($page=="spa") {				
			include "view/layanan/spa.php";	
		};
		
		if($page=="bk") {				
			include "view/layanan/bk.php";	
		};
		
		if($page=="kuning") {				
			include "view/layanan/kuning.php";	
		};					
		
		if($page=="skck") {				
			include "view/layanan/skck.php";	
		};
		
		if($page=="aw") {				
			include "view/layanan/aw.php";	
		};
		
		if($page=="sktm") {				
			include "view/layanan/sktm.php";	
		};				
		
		if($page=="progress") {				
			include "view/progress.php";	
		};
		?>
	</div>	
	
	<!-- //Content -->
	
	<div class="footer">
		<p>@ 2018 Kec Majalaya</p>
	</div>

</body>
</html>