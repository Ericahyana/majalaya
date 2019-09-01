<?php 
if (!isset($_SESSION)) {
	session_start();
}
include "../../../class/pengajuan.php";
$pengajuan = new pengajuan();

$NIK = $_GET['NIK'];
$pengajuan->NIK = $NIK;
$error = $pengajuan->updateStatus();
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