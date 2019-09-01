<?php 
if(!isset($_SESSION)) 
{ 
	session_start(); 
}
if ($_POST['id_jenis'] == 1) {
	$ceklis = array(
		'Surat_Pengantar', 
		'Foto_Copy_Surat_Nikah',
		'Foto_Copy_KK Orang_Tua',
		'Surat_Pindah',
		'Foto_Copy_Akte_Kelahiran'
	);
}elseif ($_POST['id_jenis'] == 2) {
	$ceklis = array(
		'Surat_Pengantar',
		'Foto_Copy_KK',
		'Foto_Copy_Akte_Kelahiran'
	);
}elseif ($_POST['id_jenis'] == 3) {
	$ceklis = array(
		'Surat_Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['id_jenis'] == 4) {
	$ceklis = array(
		'Surat_Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['id_jenis'] == 5) {
	$ceklis = array(
		'Proposal', 
		'Persetujuan_DKM/KUA/Kades_(untuk_Masjid)',
		'Persetujuan_Ketua_Yayasan/Kepala_Sekolah_dan_Kades',
		'Persetujuan_Ketua_Organisasi_+_Kades'
	);
}elseif ($_POST['id_jenis'] == 6) {
	$ceklis = array(
		'Surat_Pengantar',
		'Foto_Copy_Ijazah',
		'KK',
		'KTP',
		'Pas_Photo_3x3_(2_buah)'
	);
}elseif ($_POST['id_jenis'] == 7) {
	$ceklis = array(
		'Surat_Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['id_jenis'] == 8) {
	$ceklis = array(
		'KTP',
		'Surat_Bukti_Kepemilikan_AJB/Sertifikat',
		'PBB',
		'Pengisian_formulir_permohonan_yang_sudah_ditandatangani',
		'Izin_Tetangga_dan_Rekomendasi_Desa'
	);
}elseif ($_POST['id_jenis'] == 9) {
	$ceklis = array(
		'KTP', 
		'KK',
		'Surat_Kelakuan_Baik'
	);
}elseif ($_POST['id_jenis'] == 10) {
	$ceklis = array(
		'Surat_permohonan_Ijin_Gangguan_bermaterai_Rp._6000,-',
		'Foto_Copy_IMB',
		'Foto_Copy_KTP',
		'Foto_Copy_Tanda_Lunas_PBB_2_tahun_terakhir',
		'Surat_Ijin_Tetangga_diketahui_RT,_RW,_Desa',
		'Surat_Keterangan_Domisili',
		'Foto_Copy_Sertifikat_tanah/AJB/sewa_kontrak',
		'Surat_persetujuan_penggunaan_lahan',
		'Foto_Copy_Akta_Pendirian_CV/PT',
		'Foto_Lokasi_Ruang_Usaha'
	);
}elseif ($_POST['id_jenis'] == 11) {
	$ceklis = array(
		'Surat_Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['id_jenis'] == 12) {
	$ceklis = array(
		'Foto_Copy_KTP_Seluruh_Ahli_Waris',
		'Foto_Copy_KTP_saksi_2_orang',
		'Foto_Copy_Surat_Nikah',
		'Surat_Keterangan_Kematian',
		'Berkas_Permohonan',
		'Foto_Copy_Akte_Kelahiran'
	);
}

date_default_timezone_set("Asia/Jakarta");
include "../../../class/pengajuan.php";
$pengajuan = new pengajuan();

include "../../../class/akun.php";
$akun = new akun();

include "../../../class/kelengkapan.php";
$kelengkapan = new kelengkapan();

$pengajuan->NIK = $_POST['NIK'];
$pengajuan->nama_pemohon = $_POST['nama_pemohon'];
$pengajuan->no_wa = $_POST['no_wa'];
$pengajuan->alamat = $_POST['alamat'];
$pengajuan->id_jenis = $_POST['id_jenis'];
$pengajuan->tanggal_ambil = $_POST['tanggal_ambil'];
$pengajuan->tanggal_masuk = date('Y-m-d');
$pengajuan->progress = "Belum";
$pengajuan->status = "Belum Diambil";

	$peng = $pengajuan->getDetailJenis($_POST['id_jenis']);

	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= "Telah menambahkan ". $peng['nama_jenis'];
	$akun->tgl_dibuat  = date('Y-m-d H:i:s');

	$akun->create_histori();

// Memasukan ke dalam detail kelengkapan
foreach ($ceklis as $key ) {
	$dat =str_replace("_"," ",$key);
	if (isset($_FILES[$key]) && !empty($_FILES[$key]['tmp_name'])) {
		
		echo "Nama key = ".$key;
		echo "<br>";
		echo "Nama dat = ".$dat;
		echo "<br>";
		$ekstensi_diperbolehkan = array('png','jpg');
		$nama = $_FILES[$key]['name'];
		echo "Nama = ".$nama;
		echo "<br>";
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran = $_FILES[$key]['size'];
		$file_tmp = $_FILES[$key]['tmp_name']; 
		$nama_baru = $_POST['NIK'].''.$key . '.' . $ekstensi;
		echo "Nama Baru = ".$nama_baru;
		echo "<br>";
		echo "<br>";
		echo "<br>";
		move_uploaded_file($file_tmp, '../../../image/upload/'.$nama_baru);
		$kelengkapan->foto = $nama_baru;
		$kelengkapan->NIK = $_POST['NIK'];
		$kelengkapan->keterangan = $dat;
		$error = $kelengkapan->create();
				//----------------------------------- 
	// 	if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	// 		if($ukuran < 10440700000){          
	// 			move_uploaded_file($file_tmp, '../../../image/upload/'.$nama_baru);
	// 			$kelengkapan->foto = $nama_baru;
	// 			$kelengkapan->NIK = $_POST['NIK'];
	// 			$kelengkapan->keterangan = $dat;
	// 		}else{
	// 			$error =  'UKURAN FILE TERLALU BESAR';
	// 			$status = "error";
	// 		}
	// 	}else{
	// 		$error = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
	// 		$status = "error";
	// 	}

	// }else{
	// 	$kelengkapan->NIK = $_POST['NIK'];
	// 	$kelengkapan->keterangan = $dat;
	// 	$kelengkapan->foto = "";
	// }
	//  $error = $kelengkapan->create();
	}
}

	//menampung hasil dari method create 
$error = $pengajuan->create();
	//pengecekan error atau berhasil, !$error = berhasil
if(!$error){
	$_SESSION['messageSuccess'] = "Data Pengajuan Berhasil Tersimpan";

		//memanggil tampilkan untuk menampilkan pesan error dengan mengirimkan page dan nrp
	header("location: ../../index.php?page=progress");
} else {
		//membuat session untuk menampilkan pesan error bernama message
	$_SESSION['message'] = $error;
		//memanggil tampilan create kambali
	header("location: ../../index.php?page=progress");
}
?>