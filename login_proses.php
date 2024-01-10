<?php 
session_start();
require_once("class/users.php");

if(isset($_POST['login'])) {
	$iduser=$_POST['iduser'];
	$password=$_POST['password'];
	$users=new Users();

	if($users->login($iduser, $password) == "sukses") {
		session_start();
        $_SESSION['iduser'] = $iduser;
		header("location: home.php");
	} 
	else {
		header("location: index.php?error=gagal"); 
	}
} 
else {
	header("location: index.php");
}
?>