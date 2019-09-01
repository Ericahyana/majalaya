<?php
include 'config.php';
include_once 'class/pengajuan.php';

$pengajuan = new pengajuan;

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysql_query("select * from user where username='$username' and password='$password'");
$cek = mysql_num_rows($login);

// Setting Progress Otomatis
if($cek > 0) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	foreach ($pengajuan->getDataBelumSelesai() as $key ) {
		$NIK = $key['NIK'];
		$tgl1 = $key['tanggal_masuk'];// pendefinisian tanggal awal
		$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
		if ($tgl2 <= date('Y-m-d')) {
			$pengajuan->NIK = $NIK;
			$error = $pengajuan->updateProgress();
		}
	}
// End Setting Progress Otomatis
echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="admin/index.php";</script>';
}else{
//	echo '<script language="javascript">alert("Maaf Anda Salah memasukkan Username atau Password!"); document.location="index.php";</script>';
}

?>