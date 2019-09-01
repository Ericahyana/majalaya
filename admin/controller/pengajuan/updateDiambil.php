<?php 
if (!isset($_SESSION)) {
	session_start();
}
date_default_timezone_set("Asia/Jakarta");
include "../../../class/pengajuan.php";
include "../../../class/akun.php";
$pengajuan = new pengajuan();
$akun = new akun();

$NIK = $_GET['NIK'];
$pengajuan->NIK = $NIK;
$error = $pengajuan->updateStatus();

$akun->id_user     	= $_SESSION['id_user'];
$akun->action 		= "Telah Mengubah Status NIK : ". $NIK ." Menjadi Sudah Diambil";
$akun->tgl_dibuat  = date('Y-m-d H:i:s');
$akun->create_histori();

	//pengecekan error atau berhasil, !$error = berhasil
if(!$error){
	$_SESSION['messageSuccess'] = "Data Pengajuan Berhasil Diperbaharui";

		//memanggil tampilkan untuk menampilkan pesan error dengan mengirimkan page dan nrp
	header("location: ../../index.php?page=tabelSudahDiambil");
} else {
		//membuat session untuk menampilkan pesan error bernama message
	$_SESSION['message'] = $error;
		//memanggil tampilan create kambali
	header("location: ../../index.php?page=tabelSudahSelesai");
}
 ?>