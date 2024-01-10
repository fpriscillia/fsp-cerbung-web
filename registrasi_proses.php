<?php  //registrasi_proses.php
// session_start();
require_once("class/users.php");
// if (!isset($_SESSION['iduser'])) {
//   // Mengarahkan pengguna kembali ke halaman index.php
//   header("Location: index.php");
//   exit();
// }

require_once("class/users.php");

if(isset($_POST['signup'])) {
	$data = array();
	$data['iduser']=$_POST['iduser'];
	$data['nama']=$_POST['nama'];
	$data['password']=$_POST['password'];
	$data['password2']=$_POST['password2'];
	if($data['password'] == $data['password2']) {
		$users=new Users();
		$users->registrasi($data);
	} else {
		header("location: registrasi.php?error=pwd");
	}
}

header("location: registrasi.php");

?>