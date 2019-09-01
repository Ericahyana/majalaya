<?php
include_once "database.php";

class kelengkapan {
	public $id_dokumen;
	public $NIK;
	public $keterangan;
	public $foto;

	public function getData() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM kelengkapan";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}	

	public function getDetailPengajuan($NIK) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM kelengkapan where NIK = '$NIK'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}		

	public function getDetail($id_dokumen) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from kelengkapan where id_dokumen='$id_dokumen'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function create() {
		$db = new Database();
		$dbConnect = $db->connect();
		
		$sql = "INSERT INTO kelengkapan
		(
		NIK,
		keterangan,
		foto
		)
		VALUES
		(
		'{$this->NIK}',
		'{$this->keterangan}',
		'{$this->foto}'
	)";
	$data = $dbConnect->query($sql);
	$error = $dbConnect->error;
	$dbConnect = $db->close();
	return $error;
}

}
?>