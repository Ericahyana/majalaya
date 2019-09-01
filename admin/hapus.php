<?php 
session_start();
include_once '../class/database.php';
include_once '../class/kelengkapan.php';
date_default_timezone_set("Asia/Jakarta");
include "../class/akun.php";
$akun = new akun();

$kelengkapan = new kelengkapan;
$kode=$_GET['NIK'];
$kelengkapan->NIK=$kode;
$kelengkapan->delete_kelengkapan();
$kelengkapan->delete_pengajuan();

foreach ($kelengkapan->getDetailPengajuan($kode) as $key) {
	$target = "../image/upload/".$key['foto'];
	echo $target;
	if (file_exists($target)) {
		unlink($target); // Syntax Hapus Foto
	}
}

	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= "Telah Menghapus Pengajuan Nik : ". $kode;
	$akun->tgl_dibuat   = date('Y-m-d H:i:s');

	$akun->create_histori();
//echo $kode;
header("location:index.php?page=tabelBelumSelesai");

?>