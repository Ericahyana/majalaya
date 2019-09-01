<?php
if (!isset($_SESSION)) {
	session_start();
}

include "../../../class/pengajuan.php";
$pengajuan = new pengajuan();

if (!isset($_GET['NIK'])) {
	foreach ($pengajuan->getDataSudahSelesai() as $key ) {
		

		$curl = curl_init();
		$token = "Z1LrTBzdgE6VOX0TWBgpHPaEWnw6pGLvCtvKIvLm6SPmiBS4F2HXtZeuB9PZzXI9";

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

		echo "<pre>";
		print_r($result);
		$_SESSION['messageSuccess'] = "Info Telah Berhasil Dikirim";
	}
}else{
	$data2 = $pengajuan->getDetail($_GET['NIK']);

	$curl = curl_init();

	$token = "Z1LrTBzdgE6VOX0TWBgpHPaEWnw6pGLvCtvKIvLm6SPmiBS4F2HXtZeuB9PZzXI9";

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

	echo "<pre>";
	print_r($result);

	die();
	$_SESSION['messageSuccess'] = "Info Telah Berhasil Dikirim kepada ".$data2['nama_pemohon'];
}

header("location: ../../index.php?page=tabelSudahSelesai");
?>