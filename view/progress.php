<div class="prg">
<table id="tabPengajuan">
    <thead>
      <tr>        
        <th>Nama Pengaju</th>
        <th>Pengajuan</th>
        <th>Alamat</th>        
        <th>Dapat Diambil</th>
        <th>Progress</th>
      </tr>
    </thead>
    <tbody>
		<?php foreach($pengajuan->getData() as $data) : ?>
			<?php if($data['progress']=="Selesai") { 
          $peng = $pengajuan->getDetailJenis($data['id_jenis']);

        ?>
			<tr>
				<td><?php echo $data['nama_pemohon'] ?></td>
				<td><?php echo $peng['nama_jenis'] ?></td>
				<td><?php echo $data['alamat'] ?></td>				
				<td><?php echo $data['tanggal_ambil'] ?></td>
				<td><?php echo $data['progress'] ?></td>
			</tr>			
			<?php
				}
			?>
		<?php endforeach; ?>
    </tbody>
  </table>
 </div>
 
  <script>
  $(document).ready(function() {
    $('#tabPengajuan').DataTable();
} );
  </script>