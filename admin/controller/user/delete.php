<?php
session_start();
	include "../../../class/akun.php";
	$akun = new akun();
	
	//mengisi atribut dengan hasil ud inputan
	$akun->id     = $_GET['id'];
	
	//menampung hasil dari method create
	$error = $akun->delete_akun();

	if(!$error){
	$_SESSION['message'] = "Data Berhasil Terhapus";

		//memanggil tampilkan untuk menampilkan pesan error dengan mengirimkan page dan nrp
		header("location: ../../index.php?page=kelola_user");
	} else {
			//membuat session untuk menampilkan pesan error bernama message
		$_SESSION['message'] = $error;
			//memanggil tampilan create kambali
		header("location: ../../index.php?page=kelola_user");
	}
	?>