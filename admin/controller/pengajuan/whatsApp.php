<?php
if (!isset($_SESSION)) {
	session_start();
}

date_default_timezone_set("Asia/Jakarta");

include "../../../class/pengajuan.php";
$pengajuan = new pengajuan();

include "../../../class/akun.php";
$akun = new akun();




if (!isset($_GET['NIK'])) {
	foreach ($pengajuan->getDataSudahSelesai() as $key ) {
	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= "Telah Mengirim WA ke NIK : ". $_GET['NIK'];
	$akun->tgl_dibuat  = date('Y-m-d H:i:s');

	$akun->create_histori();

		$curl = curl_init();
		$token = "e9DfqP3N7f1KRJ8Q5eQFwEuqE1InIqst43NrrU0dNuy0bNYAHAPt1BsNtV6QhnTj";

		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
			)
		);

		$data = [
			'phone' =>$key['no_wa'],
			'message' => 'PEMBERITAHUAN, Pengajuan '.$key['nama_jenis']." atas nama ".$key['nama_pemohon']." sudah SELESAI dan dapat di ambil di Kantor Kecamatan dengan membawa bukti RESI. Terimakasih",
		];
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($curl);
		curl_close($curl);

		echo '<script language="javascript">alert("WA Terikirm Ke : '.$key['no_wa'].' !"); document.location="../../index.php?page=tabelSudahSelesai";</script>';
		// echo "<pre>";
		// print_r($result);
		$_SESSION['messageSuccess'] = "Info Telah Berhasil Dikirim";
	}

}else{

	$akun->id_user     	= $_SESSION['id_user'];
	$akun->action 		= "Telah Mengirim WA ke NIK : ". $_GET['NIK'];
	$akun->tgl_dibuat  = date('Y-m-d H:i:s');

	$akun->create_histori();
	$data2 = $pengajuan->getDetail($_GET['NIK']);

	$curl = curl_init();

	$token = "e9DfqP3N7f1KRJ8Q5eQFwEuqE1InIqst43NrrU0dNuy0bNYAHAPt1BsNtV6QhnTj";

	curl_setopt($curl, CURLOPT_HTTPHEADER,
		array(
			"Authorization: $token",
		)
	);

	$data = [
		'phone' => $data2['no_wa'],
		'message' => "PEMBERITAHUAN, Pengajuan ".$data2['nama_jenis']." atas nama ".$data2['nama_pemohon']." sudah SELESAI dan dapat di ambil di Kantor Kecamatan dengan membawa bukti RESI. Terimakasih",
	];

	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($curl, CURLOPT_URL, "https://wablas.com/api/send-message");
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	$result = curl_exec($curl);
	curl_close($curl);

	// echo "<pre>";
	// print_r($result);
echo '<script language="javascript">alert("WA Terikirm Ke : '.$data2['no_wa'].'!"); document.location="../../index.php?page=tabelSudahSelesai";</script>';

	die();
	$_SESSION['messageSuccess'] = "Info Telah Berhasil Dikirim kepada ".$data2['nama_pemohon'];

}

?>