<?php 
include_once "../class/pengajuan.php";
$pengajuan = new pengajuan;
?>

<div class="row" >
	<div class="col-md-12">
		<h4 style="font-family: Ad Hoc; text-align: center; background-color: #3b90ad; padding: 10px; color: white;">DAFTAR Pengajuan Sudah Selesai </h4>
	</div>
</div>

<div class="prg">
	<table id="tabPengajuan">
		<thead>
			<tr>        
				<th>NIK</th>
				<th>Nama Pemohon</th>
				<th>No WhatsApp</th>
				<th>Alamat</th>
				<th>Jenis</th>
				<th>Tanggal Masuk</th>
				<th>Tanggal Ambil</th>
				<th><a href="" class="btn btn-success"><i class="fab fa-whatsapp"></i> WhatsApp All</a></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($pengajuan->getDataSudahSelesai() as $data) : ?>
				<tr>				
					<td><?php echo $data['NIK'] ?></td>
					<td><?php echo $data['nama_pemohon'] ?></td>
					<td><?php echo $data['no_wa'] ?></td>
					<td><?php echo $data['alamat'] ?></td>
					<td><?php echo $data['nama_jenis'] ?></td>
					<td><?php echo $data['tanggal_masuk'] ?></td>
					<td><?php echo $data['tanggal_ambil'] ?></td>
					<td>
						<a href="controller/pengajuan/whatsApp.php?NIK=<?php echo $data['NIK'] ?>" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
						<button class="btn btn-info" data-toggle="modal" data-target="#myModalDetail" data-id="<?php echo $data['NIK'] ?>"><i class="fas fa-eye"></i></span></button>	
						<a href="controller/pengajuan/updateDiambil.php?NIK=<?php echo $data['NIK'] ?>" class="btn btn-warning" onclick="javascript: return confirm('Anda yakin apakah berkas sudah di berikan?')"><i class="fas fa-check"></i></abutton>
						</td>
					</tr>      
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<!-- AJAX -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myModalDetail').on('show.bs.modal', function (e) {
				var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
            	type : 'post',
            	url : 'form/modalPengajuanDetail.php',
            	data :  'rowid='+ rowid,
            	success : function(data)
            	{
				  $('.fetched-data').html(data);//menampilkan data ke dalam modal
				}
			});
        });
		});
	</script>
	<!-- END AJAX -->

	<!-- Form Edit  -->

	<div class="modal fade details-modal" id="myModalDetail" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content fetched-data"></div>
		</div>				
	</div>	


	<script>
		$(document).ready(function() {
			$('#tabPengajuan').DataTable();
		} );
	</script>