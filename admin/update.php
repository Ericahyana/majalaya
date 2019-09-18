<?php 
session_start();
date_default_timezone_set("Asia/Jakarta");
include_once '../class/pengajuan.php';
include "../class/akun.php";

$akun = new akun();
$pengajuan = new pengajuan();

$kode=$_GET['NIK'];
$pengajuan->NIK=$kode;
$pengajuan->progress=$_GET['Progress'];

if($_GET['Progress']=="Proses"){

	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= "Telah Mengubah Status Nik : ". $kode ." Menjadi Sedang Diproses";
	$akun->tgl_dibuat   = date('Y-m-d H:i:s');

	$akun->create_histori();
	$pengajuan->updateProgress();
	header("location:index.php?page=tabelProses");
}else{

	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= "Telah Mengubah Status Nik : ". $kode ." Menjadi Sudah Selesai";
	$akun->tgl_dibuat   = date('Y-m-d H:i:s');

	$akun->create_histori();
	$pengajuan->updateProgress();
	header("location:index.php?page=tabelSudahSelesai");
}

?>