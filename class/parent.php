<?php  
require_once("data.php");

class Parentclass {
	protected $mysqli;

	public function __construct() {
		$this->mysqli = new mysqli(SERVER, USERID, PASSWORD, DATABASE);
		if ($this->mysqli->connect_error) {
            die("Koneksi database gagal: " . $this->mysqli->connect_error);
        }
	}
	function __destruct() {
		$this->mysqli->close();
	}
}

?>