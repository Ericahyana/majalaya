
<?php 
include_once "../../class/pengajuan.php";
$pengajuan = new pengajuan;

$data = $pengajuan->getDetailJenis($_POST['rowid']);

$i=1;
if ($_POST['rowid'] == 1) {
	$ceklis = array(
		'Surat Pengantar', 
		'Foto Copy Surat Nikah',
		'Foto Copy KK Orang Tua',
		'Surat Pindah',
		'Foto Copy Akte Kelahiran'
	);
}elseif ($_POST['rowid'] == 2) {
	$ceklis = array(
		'Surat Pengantar',
		'Foto Copy KK',
		'Foto Copy Akte Kelahiran'
	);
}elseif ($_POST['rowid'] == 3) {
	$ceklis = array(
		'Surat Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['rowid'] == 4) {
	$ceklis = array(
		'Surat Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['rowid'] == 5) {
	$ceklis = array(
		'Proposal', 
		'Persetujuan DKM/KUA/Kades (untuk Masjid)',
		'Persetujuan Ketua Yayasan/Kepala Sekolah dan Kades',
		'Persetujuan Ketua Organisasi + Kades'
	);
}elseif ($_POST['rowid'] == 6) {
	$ceklis = array(
		'Surat Pengantar',
		'Foto Copy Ijazah',
		'KK',
		'KTP',
		'Pas Photo 3x3 (2 buah)'
	);
}elseif ($_POST['rowid'] == 7) {
	$ceklis = array(
		'Surat Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['rowid'] == 8) {
	$ceklis = array(
		'KTP',
		'Surat Bukti Kepemilikan AJB/Sertifikat',
		'PBB',
		'Pengisian formulir permohonan yang sudah ditandatangani',
		'Izin Tetangga dan Rekomendasi Desa'	
	);
}elseif ($_POST['rowid'] == 9) {
	$ceklis = array(
		'KTP', 
		'KK',
		'Surat Kelakuan Baik'
	);
}elseif ($_POST['rowid'] == 10) {
	$ceklis = array(
		'Surat permohonan Ijin Gangguan bermaterai Rp. 6000,-',
		'Foto Copy IMB',
		'Foto Copy KTP',
		'Foto Copy Tanda Lunas PBB 2 tahun terakhir',
		'Surat Ijin Tetangga diketahui RT, RW, Desa',
		'Surat Keterangan Domisili',
		'Foto Copy Sertifikat tanah/AJB/sewa kontrak',
		'Surat persetujuan penggunaan lahan',
		'Foto Copy Akta Pendirian CV/PT',
		'Foto Lokasi Ruang Usaha'
	);
}elseif ($_POST['rowid'] == 11) {
	$ceklis = array(
		'Surat Pengantar', 
		'KK',
		'KTP'
	);
}elseif ($_POST['rowid'] == 12) {
	$ceklis = array(
		'Foto Copy KTP Seluruh Ahli Waris',
		'Foto Copy KTP saksi 2 orang',
		'Foto Copy Surat Nikah',
		'Surat Keterangan Kematian',
		'Berkas Permohonan',
		'Foto Copy Akte Kelahiran'
	);
}
?>
<form action="controller/pengajuan/create.php" method="POST" enctype="multipart/form-data">

	<div class="modal-header">
		<h3>Form Pengajuan</h3>
	</div>
	<div class="modal-body">
		<div class="news-gr">
			<div class="fetched-data">
				<div class="form-group">
					<div class="form-group">
						<label>Tanggal Masuk</label>
						<input name="tanggal_masuk" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"  readonly="">
					</div>
					<div class="form-group">
						<label>Tanggal Ambil</label>
						<input name="tanggal_ambil" type="date" class="form-control" placeholder="" required="" readonly="" value="<?= date('Y-m-d', strtotime('+7 days', strtotime(date("Y-m-d")))); ?>">
					</div>
					<label>NIK</label>
					<input name="NIK" type="text" class="form-control" placeholder="" required="" size="16" maxlength="16" minlength="16" >
				</div>
				<div class="form-group">
					<label>Nama Pemohon</label>
					<input name="nama_pemohon" type="text" class="form-control" placeholder="" required="">
				</div>
				<div class="form-group">
					<label>Nomor WhatsApp</label>
					<input name="no_wa" type="text" class="form-control" placeholder="" required="">
				</div>
				<div class="form-group">
					<label>Jenis Permohonan</label>
					<input name="id_jenis" type="hidden" class="form-control " value="<?php echo $data['id_jenis'] ?>">
					<input name="" class="form-control" value="<?php echo $data['nama_jenis'] ?>" readonly="">

				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="alamat" type="text" class="form-control" required=""></textarea>
				</div>

				<div class="form-group">
					<label>Kelengkapan</label><br>
					<?php foreach ($ceklis as $key ): ?>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-control-label" for="input-username"><?php echo $key ?></label>
								<div class="card ">
									<div class="file-tab card-body ">
										<label class="btn btn-default btn-file">
											<span>Upload</span>
											<input type="file" class="form-control" name="<?php echo $key ?>" id="<?php echo $key ?>" required>
										</label>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<input type="submit" value="Simpan" class="btn btn-primary">
			<input type="reset" value="Reset" class="btn btn-warning">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
		</div>
	</div>
	
</form>