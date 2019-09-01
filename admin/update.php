<?php 
	include '../class/database.php';
		
	$nik=$_POST['NIK'];
	$nama=$_POST['nama_pemohon'];
	$permohonan=$_POST['jenis_permohonan'];
	$alamat=$_POST['alamat'];
	$tgl_masuk=$_POST['tanggal_masuk'];
	$tgl_ambil=$_POST['tanggal_ambil'];
	$progress=$_POST['progress'];
	
	

	mysql_query("update pengajuan set nama_pemohon='$nama', jenis_permohonan='$permohonan', alamat='$alamat', tanggal_masuk='$tgl_masuk', tanggal_ambil='$tgl_ambil', progress='$progress' where NIK='$nik'");

	header("location:index.php?page=progress");

?>