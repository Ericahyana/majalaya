<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
	include "../../class/akun.php";
	$akun = new akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->id_user     	= $_GET['id_user'];
	$akun->action 		= $_GET['action'];
	$akun->tgl_dibuat  = date('Y-m-d H:i:s');

	$akun->create_histori();

	if($_SESSION['log']=='Login'){
		header("location: ../../admin/index.php?page=progress");
	}
	

	?>