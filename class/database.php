<?php
	

	
	class database {
		private $conn;
		
		public function connect() {
			$this->conn = new mysqli("localhost", "root", "", "majalaya");
			return $this->conn;
		}
		
		public function close() {
			return $this->conn->close();
		}
	}
	
?>