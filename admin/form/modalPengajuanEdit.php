<?php 
include_once "../../class/pengajuan.php";
$pengajuan = new pengajuan;

include_once "../../class/kelengkapan.php";
$kelengkapan = new kelengkapan;

$data = $pengajuan->getDetail($_POST['rowid']);
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Ubah Detail Pengajuan</h4>
</div>
<div class="modal-body">						
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td>NIK</td>
				<td><input type="text" class="form-control" name="NIK" value="<?php echo $data['NIK'] ?>" id="induk"></td>
			</tr>
			<tr>
				<td>Nama Pemohon</td>
				<td><input type="text" class="form-control" name="nama_pemohon" value="<?php echo $data['nama_pemohon'] ?>" id="pemo"></td>
			</tr>
			<tr>
				<td>Nomor WhatsApp</td>
				<td><input type="text" class="form-control" name="nama_pemohon" value="<?php echo $data['no_wa'] ?>" id="pemo"></td>
			</tr>
			<tr>
				<td>Jenis Permohonan</td>
				<td><input type="text" class="form-control" name="no_wa" value="<?php echo $data['nama_jenis'] ?>" id="pemo" readonly></td>
				
				</tr>
				<tr>
					<td>Alamat</td>
					<td><textareat type="text" class="form-control" name="alamat"  id="mat"><?php echo $data['alamat'] ?></textarea></td>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>
					<td><input type="date" class="form-control" name="tanggal_masuk" value="<?php echo $data['tanggal_masuk'] ?>" id="msk_tgl"></td>
				</tr>
				<tr>
					<td>Tanggal Ambil</td>
					<td><input type="date" class="form-control" name="tanggal_ambil" value="<?php echo $data['tanggal_ambil'] ?>" id="amb_tgl"></td>
				</tr>									
				<tr>
					<td>Progress</td>
					<td>
						<?php echo $data['progress'] ?>
					</td>
				</tr>
				<?php foreach ($kelengkapan-> as $key => $value): ?>
					<tr>
						<td>
							<?php if (condition): ?>
								
							<?php endif ?>
							<input type="file" name="<?php echo $key ?>" id="<?php echo $key ?>">
						</td>
					</tr>
				<?php endforeach ?>
			</table>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
				<input type="submit" class="btn btn-primary" value="Simpan">
			</div>							
		</form>								
	</div>
