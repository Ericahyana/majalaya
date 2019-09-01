<?php 
include_once "../../class/pengajuan.php";
include_once "../../class/kelengkapan.php";

$pengajuan = new pengajuan;
$kelengkapan = new kelengkapan;

$data = $pengajuan->getDetail($_POST['rowid']);
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Detail Pengajuan</h4>
</div>
<div class="modal-body">						
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td>NIK</td>
				<td><input type="text" class="form-control" name="NIK" value="<?php echo $data['NIK'] ?>" id="induk" readonly></td>
			</tr>
			<tr>
				<td>Nama Pemohon</td>
				<td><input type="text" class="form-control" name="nama_pemohon"  id="pemo" value="<?php echo $data['nama_pemohon'] ?>" readonly></td>
			</tr>
			<tr>
				<td>Nomor WhatsApp</td>
				<td><input type="text" class="form-control" name="nama_pemohon" value="<?php echo $data['no_wa'] ?>" id="pemo" readonly></td>
			</tr>
			<tr>
				<td>Jenis Permohonan</td>
				<td><input type="text" class="form-control" name="no_wa" value="<?php echo $data['nama_jenis'] ?>" id="pemo" readonly></td>
				
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textareat readonly type="text" class="form-control" name="alamat"  id="mat"><?php echo $data['alamat'] ?></textarea></td>
				</tr>
				<tr>
					<td>Tanggal Masuk</td>
					<td><input readonly type="date" class="form-control" name="tanggal_masuk" value="<?php echo $data['tanggal_masuk'] ?>" id="msk_tgl"></td>
				</tr>
				<tr>
					<td>Tanggal Ambil</td>
					<td><input readonly type="date" class="form-control" name="tanggal_ambil" value="<?php echo $data['tanggal_ambil'] ?>" id="amb_tgl"></td>
				</tr>									
				<tr>
					<td>Progress</td>
					<td>
						<?php echo $data['progress'] ?>
					</td>
				</tr>
				<?php foreach ($kelengkapan->getDetailPengajuan($_POST['rowid']) as $key): ?>
					<tr>
						<td><?php echo $key['keterangan'] ?></td>
						<td>
							<div class="row mx-auto text-center">
								<div id="demo-test-gallery2" class="demo-gallery mx-auto text-center">
									<a target="_blank" href="../image/upload/<?php echo $key['foto'] ?>" data-size="1600x1600" data-med="../image/upload/<?php echo $key['foto'] ?>" data-med-size="1024x1024" data-author="<?php echo $data['nama_pemohon'] ?>" class="demo-gallery__img--main">
										<img src="../image/upload/<?php echo $key['foto'] ?>" alt="" width="300" height="300" />
										<figure><?php echo $key['keterangan'] ?></figure>
									</a>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
			</div>							
		</form>								
	</div>
