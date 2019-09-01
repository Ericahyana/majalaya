<div class="row" >
	<div class="col-md-12">
		<h4 style="font-family: Ad Hoc; text-align: center; background-color: #3b90ad; padding: 10px; color: white;">DAFTAR <?php echo $namaJenis['nama_jenis'] ?> </h4>
	</div>
</div>

<div class="prg">
	<table id="tabPengajuan">
		<thead>
			<tr>        
				<th>NIK</th>
				<th>Nama Pemohon</th>
				<th>Alamat</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Ambil</th>
				<th>Progress</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pengajuan->getDataPermohonan($_GET['jenis']) as $data) : ?>
				<tr>				
					<td><?php echo $data['NIK'] ?></td>
					<td><?php echo $data['nama_pemohon'] ?></td>
					<td><?php echo $data['alamat'] ?></td>
					<td><?php echo $data['tanggal_masuk'] ?></td>
					<td><?php echo $data['tanggal_ambil'] ?></td>
					<td><?php echo $data['progress'] ?></td>
					<td>
						<button class="btn btn-warning" data-toggle="modal" data-target="#myModal2" data-nomorinduk="<?= $data['NIK'] ?>" data-namapemohon="<?= $data['nama_pemohon'] ?>" data-jenispermohonan="<?= $data['jenis_permohonan'] ?>" data-tempat_tinggal="<?= $data['alamat'] ?>" data-tglmasuk="<?= $data['tanggal_masuk'] ?>" data-tglambil="<?= $data['tanggal_ambil'] ?>" data-status="<?= $data['progress'] ?>"><span class="glyphicon glyphicon-pencil"></span></button>					
						<a onclick="if(confirm('Anda Yakin?')){ location.href='hapus.php?NIK=<?php echo $data['NIK']; ?>' }" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>      
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

<!-- FORM TAMBAH -->
<div class="modal fade" id="myModal1" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Tambah Data Permohonan</h4>
			</div>
			<div class="modal-body">
				<form action="tambah.php" method="post">
					<div class="form-group">
						<div class="form-group">
							<label>Tanggal Masuk</label>
							<input name="tanggal_masuk" type="date" class="form-control" value="<?php echo date('m/d/Y'); ?>"  readonly="">
						</div>
						<div class="form-group">
							<label>Tanggal Ambil</label>
							<input name="tanggal_ambil" type="date" class="form-control" placeholder="">
						</div>
						<label>NIK</label>
						<input name="NIK" type="text" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>Nama Pemohon</label>
						<input name="nama_pemohon" type="text" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>Jenis Permohonan</label>
						<select name="jenis_permohonan" class="form-control">
							<option>Kartu Keluarga</option>
							<option>E-KTP</option>
							<option>Surat Pindah Dalam Kabupaten</option>
							<option>Surat Pindah Antar Kabupaten</option>
							<option>Bantuan Keagamaan</option>
							<option>Kartu Kuning</option>
							<option>Sewa Alat Berat</option>	
							<option>Izin Mendirikan Bangunan</option>
							<option>SKCK</option>
							<option>Izin Gangguan</option>
							<option>Tidak Mampu</option>
							<option>Ahli Waris</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input name="alamat" type="text" class="form-control" placeholder="">
					</div>
					<div class="form-group">
						<label>Progress</label>
						<select name="progress" class="form-control">
							<option>Belum</option>
							<option>Selesai</option>
						</select>
					</div>
				<div class="modal-footer" style="text-align:center;">
					<input type="submit" value="Simpan" class="btn btn-default">
					<input type="reset" value="Reset" class="btn btn-default">
				</div>
			</form>
		</div>

	</div>
</div>
</div>

<!-- END FORM TAMBAH -->

<!-- Form Edit  -->

<div class="modal fade details-modal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Ubah Detail Pengajuan</h4>
			</div>
			<div class="modal-body">						
				<form action="update.php" method="post">
					<table class="table">
						<tr>
							<td>NIK</td>
							<td><input type="text" class="form-control" name="NIK" value="javascript:;" id="induk"></td>
						</tr>
						<tr>
							<td>Nama Pemohon</td>
							<td><input type="text" class="form-control" name="nama_pemohon" value="javascript:;" id="pemo"></td>
						</tr>
						<tr>
							<td>Jenis Permohonan</td>
							<td>
								<select name="jenis_permohonan" class="form-control" value="javascript:;" id="jns_pemo">
									<option>Kartu Keluarga</option>
									<option>E-KTP</option>
									<option>Surat Pindah Dalam Kabupaten</option>
									<option>Surat Pindah Antar Kabupaten</option>
									<option>Bantuan Keagamaan</option>
									<option>Kartu Kuning</option>
									<option>Sewa Alat Berat</option>
									<option>Izin Mendirikan Bangunan</option>
									<option>SKCK</option>
									<option>Izin Gangguan</option>
									<option>Tidak Mampu</option>
									<option>Ahli Waris</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" class="form-control" name="alamat" value="javascript:;" id="mat"></td>
						</tr>
						<tr>
							<td>Tanggal Masuk</td>
							<td><input type="date" class="form-control" name="tanggal_masuk" value="javascript:;" id="msk_tgl"></td>
						</tr>
						<tr>
							<td>Tanggal Ambil</td>
							<td><input type="date" class="form-control" name="tanggal_ambil" value="javascript:;" id="amb_tgl"></td>
						</tr>									
						<tr>
							<td>Progress</td>
							<td>
								<select name="progress" class="form-control" value="javascript:;" id="gress">
									<option>Belum</option>
									<option>Selesai</option>
								</select>
							</td>
						</tr>
					</table>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>							
				</form>								
			</div>
		</div>
	</div>				
</div>	

<!-- //Form Edit  -->

<script>
	$(document).ready(function() {
		$('#tabPengajuan').DataTable();
	} );
</script>