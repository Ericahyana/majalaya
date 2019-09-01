<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
	include "../class/akun.php";
	$akun = new akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= " Telah Logout";
	$akun->tgl_dibuat  = date('Y-m-d H:i:s');

	$akun->create_histori();
session_destroy();
header("location:../index.php");
?>