<style type="text/css">
.Judul{
	font-size: 20px;
	text-align: center;
}
.SubJudul{
	font-size: 20px;
	text-align: center;
}
.Alamat{
	text-align: center;
	font-size: 15px;
}
.center {
	margin: auto;
	width: 80%;
	/*border: 3px solid green;*/
	padding: 10px;
}
body {
	background: rgb(204,204,204); 
}
page {
	background: white;
	display: block;
	margin: 0 auto;
	margin-bottom: 0.5cm;
	box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
	width: 21cm;
	height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
	width: 29.7cm;
	height: 21cm;  
}
page[size="A3"] {
	width: 29.7cm;
	height: 42cm;
}
page[size="A3"][layout="landscape"] {
	width: 42cm;
	height: 29.7cm;  
}
page[size="A5"] {
	width: 14.8cm;
	height: 21cm;
}
page[size="A5"][layout="landscape"] {
	width: 21cm;
	height: 14.8cm;  
}
@media print {
	body, page {
		margin: 1;
		box-shadow: 0;
	}
}
</style>

<?php 
$NIK = $_GET['NIK'];

include_once '../../class/pengajuan.php';
$pengajuan = new pengajuan;
$data = $pengajuan->getDetail($NIK);
$tanggal_ambil = str_replace("-","/",$data['tanggal_ambil']);
$tanggal_masuk = str_replace("-","/",$data['tanggal_masuk']);
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
</style>

<page size="A4" layout="landscape" >
	<div class="center">
		<table width="80%">
			<tr>
				<td rowspan="3"><img src="../../image/bandung.png" alt="bandung" width="200" height="100"></td>
				<td class="Judul">PEMERINTAH KABUPATEN BANDUNG</td>
			</tr>
			<tr>
				<td class="Judul"><b>KECAMATAN MAJALAYA</b></td>
			</tr>
			<tr>
				<td class="Alamat">Jl. Raya Majalaya - Rancaekek 40382 Tlp. (022) 595 0001 fax 595 0001</td>
			</tr>

		</table>
		<hr>
		<table width="80%">
			<tr>
				<td></td>
				<td class="SubJudul"><u><b>TANDA BUKTI PENERIMAAN BERKAS</b></u></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td><b>JENIS PERMOHONAN</b></td>
				<td>: <?php echo $data['nama_jenis'] ?></td>
			</tr>
			<tr>
				<td><b>NIK / KK</b></td>
				<td>: <?php echo $data['NIK'] ?></td>
			</tr>
			<tr>
				<td><b>Nama</b></td>
				<td>: <?php echo $data['nama_pemohon'] ?></td>
			</tr>
			<tr>
				<td><b>Alamat</b></td>
				<td>: <?php echo $data['alamat'] ?></td>
			</tr>
			<tr>
				<td><b>Masuk Berkas</b></td>
				<td>: <?php echo $tanggal_masuk ?></td>
			</tr>
			<tr>
				<td><b>Pengambilan berkas</b></td>
				<td>: <?php echo $tanggal_ambil ?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td rowspan="4" width="70%"></td>
				<td class="Judul">Majalaya,<?php echo date('d F Y') ?></td>
			</tr>
			<tr>
				<td class="Judul">Petugas</td>
			</tr>
			<tr height=50px></tr>
			<tr>
				<td class="Alamat">(..................................................)</td>
			</tr>

		</table>
	</div>
</page>
<script type="text/javascript">

	$(document).ready(function () {
		window.print();
	});

</script>
