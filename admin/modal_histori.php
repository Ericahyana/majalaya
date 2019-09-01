<!-- Modal -->
    <div class="modal fade" id="ModalHis" role="dialog">
      <div class="modal-dialog">
 
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Histori Kegiatan Pegawai</h4>
          </div>
          <div class="modal-body">
            <p>
            	<ul  class="list-group"  style="overflow-y:scroll; height:400px;">
            		<?php foreach($akun->getDataHistori() as $his){
            			$del = $akun->getDetailUser($his['id_user']);

            			?>
            		<li class="list-group-item"><?= $del['nama']?> <br><?= $his['action']?>
            		<div style="text-align: right"><?= $his['tgl_dibuat']?></div></li>
            		<?php }?>
            	
            	</ul>

            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
 
      </div>
    </div>