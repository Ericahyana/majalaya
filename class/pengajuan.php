<?php
include_once "database.php";

class pengajuan {
	public $NIK;
	public $nama_pemohon;
	public $no_wa;
	public $alamat;
	public $id_jenis;
	public $tanggal_masuk;
	public $tanggal_ambil;
	public $progress;
	public $status;

	public function getData() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function getDataJenis() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM jenis ";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function getDataBelumDiambil() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis where pengajuan.status ='Belum Diambil'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function getDataBelumSelesai() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis where pengajuan.progress ='Belum'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function getDataSudahDiambil() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis where pengajuan.status ='Diambil'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function getDataSudahSelesai() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis where pengajuan.progress ='Selesai' AND pengajuan.status = 'Belum Diambil'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}				

	public function getDetail($kode) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from pengajuan join jenis on jenis.id_jenis = pengajuan.id_jenis where pengajuan.NIK='$kode'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
	}

	public function getDetailJenis($id_jenis) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM jenis where id_jenis = '{$id_jenis}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
	}

	public function getDataPermohonan($id_jenis) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan where id_jenis = '{$id_jenis}'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function create() {
		$db = new Database();
		$dbConnect = $db->connect();
		
		$sql = "INSERT INTO pengajuan
		(
		NIK,
		nama_pemohon,
		no_wa,
		alamat,
		id_jenis,
		tanggal_masuk,
		tanggal_ambil,
		progress,
		status
		)
		VALUES
		(
		'{$this->NIK}',
		'{$this->nama_pemohon}',
		'{$this->no_wa}',
		'{$this->alamat}',
		'{$this->id_jenis}',
		'{$this->tanggal_masuk}',
		'{$this->tanggal_ambil}',
		'{$this->progress}',
		'{$this->status}'
	)";
	$data = $dbConnect->query($sql);
	$error = $dbConnect->error;
	$dbConnect = $db->close();
	return $error;
}
public function updateProgress() {
		$db = new Database();
				//membuka koneksi
		$dbConnect = $db->connect();
		
				//query menyimpan data 
		$sql = "UPDATE pengajuan
		set	
		progress='Selesai'
		where NIK='{$this->NIK}'
		";
				//eksekusi query di atas
		$data = $dbConnect->query($sql);
		
				//menampung error simpan data
		$error = $dbConnect->error;
		
				//menutup koneksi
		$dbConnect = $db->close();
		
				//mengembalikan nilai error
		return $error;
	}

public function updateStatus() {
		$db = new Database();
				//membuka koneksi
		$dbConnect = $db->connect();
		
				//query menyimpan data 
		$sql = "UPDATE pengajuan
		set	
		status='Diambil'
		where NIK='{$this->NIK}'
		";
				//eksekusi query di atas
		$data = $dbConnect->query($sql);
		
				//menampung error simpan data
		$error = $dbConnect->error;
		
				//menutup koneksi
		$dbConnect = $db->close();
		
				//mengembalikan nilai error
		return $error;
	}
}
?>