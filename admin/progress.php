

<div class="profil">
	<div class="row">
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kartu Keluarga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-KTP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="3">Surat Pindah Dalam Kabupaten</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="4">Surat Pindah Antar Kabupaten</button>
		</div>
	</div>
	<div class="row"><br />
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bantuan Keagamaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kartu Kuning&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sewa Alat Berat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="8">&nbsp;&nbsp;&nbsp;&nbsp;Izin Mendirikan Bangunan&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
	</div>
	<div class="row"><br />
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SKCK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Izin Gangguan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tidak Mampu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
		<div class="col-sm-3">
			<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"  data-id="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ahli Waris&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
		</div>
	</div>
</div>

<!-- Ini teh Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content modal-info fetched-data">
			
		</div>
	</div>
</div>
<!-- END MODAL -->

<!-- AJAX -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#myModal').on('show.bs.modal', function (e) {
			var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
            	type : 'post',
            	url : 'form/modalPengajuan.php',
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
