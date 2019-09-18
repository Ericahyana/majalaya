<div class="prg">
  <br>
  <br>
  <div class="row">
    <div class="col-md-3">
      
    </div>
    <div class="col-md-6">
      <div class="row">            
          <form action="" method="get">
      <div class="col-lg-12">
        <div class="input-group">
          <input type="hidden" name="page" value="progress">
            <input type="text" class="form-control" name="no_resi" placeholder="Masukan Nomor Resi">
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"> <i class="glyphicon glyphicon-search"></i> Cari</button>
            </span>

          
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
    </form>
    </div><!-- /.row -->
    </div>
    <div class="col-md-3">
      
    </div>
  </div>
  <?php if(!isset($_GET['no_resi'])){?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<?php }else{?>
  <br>
  <br>
  <div class="panel panel-primary" >
  <div class="panel-heading" style="background-color: #3b90ad;">
    <h3 class="panel-title">Hasil Pencarian</h3>
  </div>
  <div class="panel-body">
    <div class="col-lg-1">
      <?php $detail=$pengajuan->getDetailResi($_GET['no_resi']);?>
    </div>
      <div class="col-lg-10">
       <div class="bs-example">
          <ul class="nav nav-wizard">
            <li class="<?php if($detail['progress']=="Belum"){echo "active";}?>"><a  >Langkah 1 - Belum Di proses</a></li>
            <li class="<?php if($detail['progress']=="Proses"){echo "active";}?>"><a  >Langkah 2 - Di Proses</a></li>
            <li class="<?php if($detail['progress']=="Selesai"){echo "active";}?>"><a  >Langkah 3 - Sudah Selesai</a></li>
          </ul>
          <hr>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade  " id="step1">
              <p></p>
            </div>
            <div class="tab-pane fade active in" id="step2">
              <div class="col-md-3">
                <p>No Resi</p>
                <p>Nama Pengaju</p>
                <p>Alamat</p>
                <p>Tanggal Masuk</p>
                <p>Tanggal Selesai</p>
                <p>Status</p>
              </div><div class="col-md-3">
                <p>: <?= $detail['no_resi']?></p>
                <p>: <?= $detail['nama_pemohon']?></p>
                <p>: <?= $detail['alamat']?></p>
                <p>: <?= $detail['tanggal_masuk']?></p>
                <p>: <?= $detail['tanggal_ambil']?></p>
                <p>: <?= $detail['status']?></p>
              </div>
            </div>
            <div class="tab-pane fade  " id="step3">
              <p></p>
            </div>
          </div>
        </div>

      </div> 
    <div class="col-lg-1">
    </div>
    
  </div>
</div>
<?php }?>
  <br>
  <br>
 </div>
 
  <script>
  $(document).ready(function() {
    $('#tabPengajuan').DataTable();
} );
  </script>