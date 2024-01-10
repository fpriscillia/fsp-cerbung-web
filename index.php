<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login User - Ceritaku</title>
</head>
<body>
<form method="post" action="login_proses.php">
	<h3>LOGIN USER</h3>
	<p><label>ID User  : </label> <input type="text" name="iduser"></p>
	<p><label>Password : </label> <input type="password" name="password"></p>
	<p><< ID User dan password dapat menggunakan NRP kami bertiga >></p>
	<p><button type="submit" name="login" value="login">Login</button></p>
	<?php
		if (isset($_GET['error']) && $_GET['error'] == 'gagal') {
	    echo "<h4> Login gagal, Silakan coba lagi. </h4>"; }
	?>
	<p>Belum punya Akun? <a href="registrasi.php">Registrasi dahulu</a> </p>
    <p> Website ini merupakan Tugas Week 14 - Full Stack Programming KP: B <br>Oleh:</p>
    <ul> 
        <li>160721004 - Fenny Cahyawati</li>
        <li>160721022 - Fransisca Priscillia Tanuwijaya</li>
        <li>160721023 - Christin Gunawan</li>  
    <ul>
</form>
</body>
</html>