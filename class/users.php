<?php  
require_once("parent.php");

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

class Users extends Parentclass {
	public function __construct() {
		parent::__construct();
	}
	private function generateSalt() {
		return substr(sha1(date("YmdHis")), 0, 10);
	}
	private function EncryptPassword($plainPwd, $salt) {
		return sha1(sha1($plainPwd).$salt);
	}
	private function getSalt($userid) {
		$sql="Select salt From users Where idusers=?";
		$stmt=$this->mysqli->prepare($sql);
		$stmt->bind_param("s", $userid);
		$stmt->execute(); 
		$res = $stmt->get_result();
		if($row=$res->fetch_assoc())
			return $row['salt'];
		else return "";
	}
	private function generateSession($row){
		$_SESSION['iduser'] = $row['iduser'];
		$_SESSION['nama'] = $row['nama'];
	}
	public function login($iduser, $pwd) {
		$salt = $this->getSalt($iduser);
		$encPwd = $this->EncryptPassword($pwd, $salt);
		$sql="Select * From users Where idusers=? And password=?";
		$stmt=$this->mysqli->prepare($sql);
		$stmt->bind_param("ss", $iduser, $encPwd);		
		$stmt->execute(); 
		$res = $stmt->get_result();
		if($res->num_rows > 0){
			$this->generateSession($res->fetch_assoc());
			return "sukses";
		} else "gagal";
	}
	public function registrasi($arrData) {
		$salt = $this->generateSalt();
		$encPwd = $this->EncryptPassword($arrData['password'], $salt);
		$sql="Insert into users Values (?,?,?,?)";
		$stmt=$this->mysqli->prepare($sql);
		$stmt->bind_param("ssss", $arrData['iduser'], $arrData['nama'], $encPwd, $salt);
		$stmt->execute();
	}

}
?>