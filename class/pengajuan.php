<?php
include_once "database.php";

class pengajuan {
	public $NIK;
	public $no_resi;
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

	public function getJumlahSudahDiambil($id) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT COUNT(*) as jml FROM pengajuan WHERE id_jenis ='{$id}' AND status = 'Diambil'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
	}

	public function getJumlahBelumSelesai($id) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT COUNT(*) as jml FROM pengajuan WHERE id_jenis ='{$id}' AND progress = 'Belum'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
	}

	public function getJumlahSudahSelesai($id) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT COUNT(*) as jml FROM pengajuan WHERE id_jenis ='{$id}' AND progress = 'Selesai'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data->fetch_array();
	}


	public function getDataBelumDiambil() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis where pengajuan.status ='Belum Diambil'";
		$data = $dbConnect->query($sql);
		$dbConnect = $db->close();
		return $data;
	}

	public function getDataProses() {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * FROM pengajuan join jenis on pengajuan.id_jenis = jenis.id_jenis where pengajuan.progress ='Proses'";
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

	public function getDetailResi($kode) {
		$db = new database();
		$dbConnect = $db->connect();
		$sql = "SELECT * from pengajuan  where no_resi='$kode'";
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
		$no_resi =rand(100000,999999);
		$sql = "INSERT INTO pengajuan
		(
		NIK,
		no_resi,
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
		'{$no_resi}',
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
		progress='{$this->progress}'
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