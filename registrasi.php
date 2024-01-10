<?php
// session_start();
require_once("class/users.php");
// if (!isset($_SESSION['iduser'])) {
//   header("Location: index.php");
//   exit();
// }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrasi</title>
</head>
<body>
<form method="post" action="registrasi_proses.php">
<h3>REGISTRATION USER</h3>
<p><label>ID User : </label> <input type="text" name="iduser"></p>
<p><label>Nama : </label> <input type="text" name="nama"></p>
<p><label>Password : </label> <input type="password" name="password"></p>
<p><label>Ulangi Password : </label> <input type="password" name="password2"></p>
<p><button type="submit" name="signup" value="signup">Sign Up</button></p>
<p>Sudah punya Akun? <a href="index.php">Silahkan Login</a> </p>
</form>
</body>
</html>