<?php
session_start();
	include "../../../class/akun.php";
	$akun = new akun();
	
	//mengisi atribut dengan hasil dari inputan
	$akun->id     		= $_POST['id'];
	$akun->nama    		= $_POST['nama'];
	$akun->username     = $_POST['username'];
	$akun->password 	= md5($_POST['password']);
	$akun->hak_akses 	= $_POST['hak_akses'];
	
	//menampung hasil dari method create
	$error = $akun->update_akun();

	if(!$error){
	$_SESSION['message'] = "Data Berhasil Tersimpan";

		//memanggil tampilkan untuk menampilkan pesan error dengan mengirimkan page dan nrp
		header("location: ../../index.php?page=kelola_user");
	} else {
			//membuat session untuk menampilkan pesan error bernama message
		$_SESSION['message'] = $error;
			//memanggil tampilan create kambali
		header("location: ../../index.php?page=kelola_user");
	}
	?>