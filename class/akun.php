<?php
include_once "database.php";
include_once 'pengajuan.php';

$pengajuan = new pengajuan;

class akun {
	public $id;
	public $nama;
	public $username;
	public $password;
	public $hak_akses;

	public $id_user;
	public $action;
	public $tgl_dibuat;

public function cek_login(){

			$db = new Database();
			$dbConnect = $db->connect();
			$sql = "SELECT * from user where username = '{$this->username}' and password ='{$this->password}'";
			$sql = $dbConnect->query($sql);
			$data = $sql->fetch_assoc();

			$id_user = $data['id'];
			$username = $data['username'];
			$hak_akses = $data['hak_akses'];


			if($hak_akses=="admin")
			{
					session_start();
					$_SESSION['username'] 	= $username;
					$_SESSION['id_user'] 	= $id_user;
					$_SESSION['status'] 	= "login";
					$_SESSION['hak_akses']  = $hak_akses;
					$_SESSION['log']		="Login";
					
					echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="../../admin/index.php?page=kelola_user";</script>';

					foreach ($pengajuan->getDataBelumSelesai() as $key ) {
						$NIK = $key['NIK'];
						$tgl1 = $key['tanggal_masuk'];// pendefinisian tanggal awal
						$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1))); 
						//operasi penjumlahan tanggal sebanyak 6 hari
						if ($tgl2 <= date('Y-m-d')) {
							$pengajuan->NIK = $NIK;
							$error = $pengajuan->updateProgress();
						}
					}
			}
			else if($hak_akses=="camat")
			{
					session_start();
					$_SESSION['username'] 	= $username;
					$_SESSION['id_user'] 	= $id_user;
					$_SESSION['status'] 	= "login";
					$_SESSION['hak_akses']  = $hak_akses;
					$_SESSION['log']		="Login";
					
					echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="../../admin/index.php?page=laporan";</script>';
					foreach ($pengajuan->getDataBelumSelesai() as $key ) {
						$NIK = $key['NIK'];
						$tgl1 = $key['tanggal_masuk'];// pendefinisian tanggal awal
						$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1))); 
						//operasi penjumlahan tanggal sebanyak 6 hari
						if ($tgl2 <= date('Y-m-d')) {
							$pengajuan->NIK = $NIK;
							$error = $pengajuan->updateProgress();
						}
					}
			}
			else if($hak_akses=="pelayanan")
			{
					session_start();
					$_SESSION['username'] 	= $username;
					$_SESSION['id_user'] 	= $id_user;
					$_SESSION['status'] 	= "login";
					$_SESSION['hak_akses']  = $hak_akses;
					$_SESSION['log']		="Login";

					echo '<script language="javascript">alert("Anda berhasil Login!"); document.location="../../admin/controller/cek_histori.php?id_user='.$id_user.'&action='.$username.' telah login ";</script>';
					foreach ($pengajuan->getDataBelumSelesai() as $key ) {
						$NIK = $key['NIK'];
						$tgl1 = $key['tanggal_masuk'];// pendefinisian tanggal awal
						$tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1))); 
						//operasi penjumlahan tanggal sebanyak 6 hari
						if ($tgl2 <= date('Y-m-d')) {
							$pengajuan->NIK = $NIK;
							$error = $pengajuan->updateProgress();
						}
					}
			}
			else{
					session_start();
					$error = $dbConnect->error;

					echo '<script language="javascript">alert("Username / Password Salah !"); document.location="../../index.php";</script>';
				 }
			
		}

		public function getDataUser() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM user ";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}
		public function getDataHistori() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM histori  order by tgl_dibuat DESC";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
		}

		public function getDetailUser($id) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM user where id ='{$id}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_assoc();
	}
	public function create_histori() {
		$db = new Database();
		$dbConnect = $db->connect();
		
		$sql = "INSERT INTO histori
		(
		id_user,
		action,
		tgl_dibuat
		)
		VALUES
		(

		'{$this->id_user}',
		'{$this->action}',
		'{$this->tgl_dibuat}'
	)";
	$data = $dbConnect->query($sql);
	$error = $dbConnect->error;
	$dbConnect = $db->close();
	return $error;
	}

	public function create_akun() {
		$db = new Database();
		$dbConnect = $db->connect();
		
		$sql = "INSERT INTO user
		(
		id,
		nama,
		username,
		password,
		hak_akses
		)
		VALUES
		(

		'{$this->id}',
		'{$this->nama}',
		'{$this->username}',
		'{$this->password}',
		'{$this->hak_akses}'
	)";
	$data = $dbConnect->query($sql);
	$error = $dbConnect->error;
	$dbConnect = $db->close();
	return $error;
	}
	public function update_akun() {
		$db = new Database();
		$dbConnect = $db->connect();
		
		$sql = "UPDATE user
				SET
				nama			='{$this->nama}',
				username		='{$this->username}',
				password		='{$this->password}'
			WHERE
				id		='{$this->id}'
				";

	$data = $dbConnect->query($sql);
	$error = $dbConnect->error;
	$dbConnect = $db->close();
	return $error;
	}

	public function delete_akun() {
		$db = new Database();
		$dbConnect = $db->connect();

		$sql = "DELETE FROM user WHERE id ='{$this->id}'";

	$data = $dbConnect->query($sql);
	$error = $dbConnect->error;
	$dbConnect = $db->close();
	return $error;
	}

}
?>