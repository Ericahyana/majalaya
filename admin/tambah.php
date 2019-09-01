<?php 
	include '../class/database.php';
		$nik=$_POST['NIK'];
		$nama=$_POST['nama_pemohon'];
		$permohonan=$_POST['jenis_permohonan'];
		$alamat=$_POST['alamat'];
		$tgl_masuk=$_POST['tanggal_masuk'];
		$tgl_ambil=$_POST['tanggal_ambil'];
		$progress=$_POST['progress'];
		
		mysql_query("insert into pengajuan values('$nik','$nama','$permohonan','$alamat','$tgl_masuk','$tgl_ambil','$progress')");

		header("location:index.php?page=progress");

 ?>