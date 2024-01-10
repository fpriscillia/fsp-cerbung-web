<?php
session_start();
if(!isset($_SESSION['iduser'])){
	header("location: index.php");
} 

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
	<title>Halaman Buat Cerita Baru</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h3 class="lblBuatCerita">Buat Cerita Baru </h3>
<form method="POST" action="new_proses.php">
    <p><label class="lblJudul">Judul</label><input type="text" name="judul" class="txtJudul" required></p>
    <p><label class="lblPar">Paragraf 1 </label>
	<textarea name="paragraf" rows="10" cols="50"required class="txtParagraf"></textarea></p>
    <p><input type="submit" name="simpan" value="Simpan" class="btnSubmit">
    <?php
    	if (isset($_GET['simpan'])) {
        echo "<h4> Judul sudah ada, harap ganti judul lain </h4>"; }
    ?>
</form>
</body>
</html>