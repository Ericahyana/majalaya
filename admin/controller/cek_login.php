<?php
	include "../../class/akun.php";
	$akun = new akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->username     = $_POST['username'];
	$akun->password 	= md5($_POST['password']);
	
	//menampung hasil dari method create
	$error = $akun->cek_login();

	
	?>