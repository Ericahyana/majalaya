<?php 
include_once '../class/database.php';
include_once '../class/kelengkapan.php';

$kelengkapan = new kelengkapan;
$kode=$_GET['NIK'];

mysql_query("DELETE from pengajuan where NIK='$kode'");
mysql_query("DELETE from kelengkapan where NIK='$kode'");

foreach ($kelengkapan->getDetailPengajuan($kode) as $key) {
	$target = "../image/upload/".$key['foto'];
	echo $target;
	if (file_exists($target)) {
		unlink($target); // Syntax Hapus Foto
	}
}

header("location:index.php?page=progress");

?>