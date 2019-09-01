<?php
if(isset($_GET['id'])){
	$det=$akun->getDetailUser($_GET['id']);
}


?>


<?php if(isset($_SESSION['message'])): ?>
				<!-- Jika terdapat error maka munculkan pesan pada session yang telah di buat -->
				<p>
					<div class="alert alert-danger" role="alert">
						<?= $_SESSION['message'] ?>
					</div>
				</p>
				<!-- Mengosongkan session message agar pesan tidak muncul kembali -->
				<?php unset($_SESSION['message']); ?>
			<?php endif; ?>

<br><div class="panel panel-primary">
	<div class="panel-heading" style="font-size:25px; text-align:center; background-color: #217693;">Kelola User</div>
	
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="../image/add_user.png" alt="kec">
					<div class="caption" style="color:grey; text-align:center;">
						<?php if(isset($_GET['id'])){?>
						<h4 style="color:#3b90ad;">Edit User</h4><br>
						<form action="controller/user/update.php" method="post">
						<table class="table">
							<tr>
								<td>Nama</td>
								<input type="hidden" class="form-control" name="id" value="<?= $det['id']?>">
								<td><input type="text" class="form-control" name="nama" value="<?= $det['nama']?>"></td>
							</tr>
							<tr>
								<td>User Name</td>
								<td><input type="text" class="form-control" name="username" value="<?= $det['username']?>" ></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" class="form-control" name="password" value="<?= $det['password']?>"></td>
							</tr>
							<tr>
								<td>Hak Akses</td>
								<td><select name="hak_akses">
									<option disabled="" >Pilih</option>
									<option <?php if($det['hak_akses']=="pelayanan"){echo"selected";} ?> value="pelayanan">Pelayanan</option>
									<option <?php if($det['hak_akses']=="camat"){echo"selected";} ?>  value="camat">Camat</option>
								</select></td>
							</tr>
						</table>
						<button name="submit" class="btn btn-info">Simpan</button>
						</form>
						<?php }else{?>

						<h4 style="color:#3b90ad;">Tambah User</h4><br>
						<form action="controller/user/create.php" method="post">
						<table class="table">
							<tr>
								<td>Nama</td>
								<td><input type="text" class="form-control" name="nama" ></td>
							</tr>
							<tr>
								<td>User Name</td>
								<td><input type="text" class="form-control" name="username" ></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" class="form-control" name="password" ></td>
							</tr>
							<tr>
								<td>Hak Akses</td>
								<td><select name="hak_akses">
									<option disabled="" selected="">Pilih</option>
									<option value="pelayanan">Pelayanan</option>
									<option value="camat">Camat</option>
								</select></td>
							</tr>
						</table>
						<button name="submit" class="btn btn-info">Simpan</button>
						</form>
						<?php }?>
					</div>
				</div>
			</div>
		
		
			<div class="col-md-9">
				<div class="thumbnail">
				<a href="index.php?page=kk">
					<!-- <img src="../image/users4.png" style="height: 100px" alt="kec"> -->
					<div class="caption" style="color:grey; text-align:center;">
						<h4 style="color:#3b90ad;">List User</h4><br></a>
						<p>List User Kecamatan Majalaya</p>
					</div>
				</div>
			</div>
		
		
			<div class="col-md-9">
				<div class="thumbnail">
					<div class="caption" style="color:grey; text-align:left;">
						<table id="tabPengajuan" width="800px">
						<thead>
							<tr>        
								<th>ID</th>
								<th>Nama User</th>
								<th>Username</th>
								<th>Hak Akses</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($akun->getDataUser() as $data) : 
								if($data['hak_akses']=='admin'){

								}else{


								?>
								<tr>				
									<td><?php echo $data['id'] ?></td>
									<td><?php echo $data['nama'] ?></td>
									<td><?php echo $data['username'] ?></td>
									<td><?php echo $data['hak_akses'] ?></td>
									<td>
										<a href="?page=kelola_user&id=<?php echo $data['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
														
										<a onclick="if(confirm('Anda Yakin?')){ location.href='controller/user/delete.php?id=<?= $data['id']?>' }" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
									</td>
								</tr>      
							<?php } endforeach; ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		 
		
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#tabPengajuan').DataTable();
	} );
</script>