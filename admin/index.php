<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kecamatan Majalaya </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
	<link rel="icon" type="iamge/png" href="../image/bandung.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- PhotoSwipe -->
	<link rel="stylesheet" href="../PhotoSwipe-master/dist/photoswipe.css"> 
	<link rel="stylesheet" href="../PhotoSwipe-master/dist/default-skin/default-skin.css">

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../imageUpload/dist/js/bootstrap-imageupload.js" type="text/javascript"></script>
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<!-- PhotoSwipe -->
	<script src="../PhotoSwipe-master/dist/photoswipe.min.js"></script> 
	<script src="../PhotoSwipe-master/dist/photoswipe-ui-default.min.js"></script>
</head>
<body>

	<?php
	include '../config.php';
	
	session_start();
	
	if($_SESSION['status'] !="login") {
		header("location:../index.php");
	}
	?>

	<?php
	include "../class/pengajuan.php";
	include "../class/akun.php";
	$akun = new akun();	
	$pengajuan = new pengajuan();		
	?>

	<?php
	array_key_exists('page', $_GET) ? $page = $_GET['page'] : $page = '';
	?>

	<div class="header" id="header">
		<h1><img src="../image/bandung.png" alt="bandung" width="100" height="50">Kecamatan Majalaya</h1>
	</div>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">

			<?php if($_SESSION['hak_akses']=="pelayanan"){?>
				<li class="<?php if ($page=='progress'): ?>
				active
				<?php endif ?>"><a href="index.php?page=progress">Pengajuan</a></li>
				<li class="<?php if ($page=='tabelSudahDiambil'): ?>
				active
				<?php endif ?>"><a href="index.php?page=tabelSudahDiambil">Daftar Pengajuan Sudah di Ambil</a></li>
				<li class="<?php if ($page=='tabelSudahSelesai'): ?>
				active
				<?php endif ?>"><a href="index.php?page=tabelSudahSelesai">Daftar Pengajuan Sudah Selesai</a></li>
				<li class="<?php if ($page=='tabelBelumSelesai'): ?>
				active
				<?php endif ?>"><a href="index.php?page=tabelBelumSelesai">Daftar Pengajuan Belum Selesai</a></li>
			<?php }else if($_SESSION['hak_akses']=="camat"){?>
				<li class="<?php if ($page=='laporan'): ?>
				active
				<?php endif ?>"><a href="index.php?page=laporan">Laporan</a></li>
			<?php }else if($_SESSION['hak_akses']=="admin"){?>

				<li class="<?php if ($page=='kelola_user'): ?>
				active
				<?php endif ?>"><a href="index.php?page=kelola_user">Kelola User</a></li>
			<?php }?>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a  data-toggle="modal" data-target="#ModalHis"><span class="glyphicon glyphicon-paper"></span> Histori</a></li>
				<li><a href="logout.php"><?= $_SESSION['hak_akses']?> &nbsp; <span class="glyphicon glyphicon-off"></span> Logout</a></li>
			</ul>
		</div>
	</nav>
	
	
	
	<!-- Content -->
	<div class="container">
		<?php if ($page == "tabel" || $page == "progress"): ?>
			<?php else: ?>
				<div class="row" >
					<div class="col-md-12">
						<?php if ($page == "progress" || $page == "kk"): ?>
							<h4 style="font-family: Ad Hoc; text-align: center; background-color: #3b90ad; padding: 10px; color: white;">Sudah pernah mengajukan permohonan ? Silahkan pantau progress permohonan anda melalui <strong><a href="index.php?page=progress" style="color:lavender;">e-Progress</a></strong></h4>
						<?php endif ?>
						
					</div>
				</div>
			<?php endif ?>
			<?php if(isset($_SESSION['message'])): ?>
				<!-- Jika terdapat error maka munculkan pesan pada session yang telah di buat -->
				<p>
					<div class="alert alert-danger" role="alert">
						<?= $_SESSION['message'] ?>
					</div>
				</p>
				<!-- Mengosongkan session message agar pesan tidak muncul kembali -->
				<?php unset($_SESSION['message']); ?>
			<?php endif; ?>
			<?php if(isset($_SESSION['messageSuccess'])): ?>
				<!-- Jika terdapat error maka munculkan pesan pada session yang telah di buat -->
				<p>
					<div class="alert alert-success" role="alert">
						<?= $_SESSION['messageSuccess'] ?>
					</div>
				</p>
				<!-- Mengosongkan session message agar pesan tidak muncul kembali -->
				<?php unset($_SESSION['messageSuccess']); ?>
			<?php endif; ?>
			<?php



			if($page=="tabelBelumSelesai") {				
				include "tabelBelumSelesai.php";	
			};

			if($page=="tabelSudahSelesai") {				
				include "tabelSudahSelesai.php";	
			};

			if($page=="tabelSudahDiambil") {				
				include "tabelSudahDiambil.php";	
			};

			if($page=="ktp") {				
				include "layanan/ktp.php";	
			};		

			if($page=="spd") {				
				include "layanan/spd.php";	
			};

			if($page=="spa") {				
				include "layanan/spa.php";	
			};

			if($page=="bk") {				
				include "layanan/bk.php";	
			};

			if($page=="kuning") {				
				include "layanan/kuning.php";	
			};

			if($page=="skck") {				
				include "layanan/skck.php";	
			};

			if($page=="progress") {				
				include "progress.php";	
			};					

			if($page=="aw") {				
				include "layanan/aw.php";	
			};
			
			if($page=="sktm") {				
				include "layanan/sktm.php";	
			};	
			if($page=="tabel") {				
				include "tabel.php";	
			};	
			if($page=="kelola_user") {				
				include "kelola_user.php";	
			};
			if($page=="laporan") {				
				include "laporan.php";	
			};	

				include "modal_histori.php";	
			?>
		</div>	

		<!-- //Content -->

		<div class="footer">
			<p>@ 2019 Kec Majalaya</p>
		</div>

		<!-- JavaScript-View -->
		<script type="text/javascript" src="../js/setting.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#myModal2').on('show.bs.modal', function(event) {
					var div = $(event.relatedTarget);
					var nomor = div.data('nomorinduk');
					var name = div.data('namapemohon');
					var jenis = div.data('jenispermohonan');
					var tmpt = div.data('tempat_tinggal');
					var masuk = div.data('tglmasuk');
					var ambil = div.data('tglambil');
					var sts = div.data('status');
					var halamanIni = $(this);

					console.log(nomor);
					halamanIni.find('#induk').attr('value',""+nomor);
					halamanIni.find('#pemo').attr('value',""+name);
					halamanIni.find('#jns_pemo').attr('value',""+jenis);
					halamanIni.find('#mat').attr('value',""+tmpt);
					halamanIni.find('#msk_tgl').attr('value',""+masuk);
					halamanIni.find('#amb_tgl').attr('value',""+ambil);
					halamanIni.find('#gress').attr('value',""+sts);
				});
				var $imageupload = $('.imageupload');
				$imageupload.imageupload();


			})
		</script>
		<!-- //JavaScript-View -->
	</body>

	</html>