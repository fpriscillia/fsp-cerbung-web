<?php
require_once("class/users.php");
$users = new Users();

if (!isset($_SESSION['iduser'])) {
  header("Location: index.php");
  exit();
}

require_once("class/cerita.php");

$judul = $_GET['judul']; 

$objCerita = new cerita();

$result = $objCerita->displayCerita($judul);

echo "<h2>$judul</h2>";

//memeriksa query menghasilkan setidaknya satu baris
if ($result->num_rows > 0) {
	//mengambil trs setiap baris data yg dikembalikan oleh query
    while ($row = $result->fetch_assoc()) {
        $paragraf = $row["isi_paragraf"];
        echo "<p>" . $paragraf . "</p>";
    }
}

echo "<br><br><br>";

echo "<form method='post'>";
echo "<p><label>Tambah Paragraf</label></p><textarea name='tambah_paragraf' rows='10' cols='50'></textarea></p>";
echo "<p><input type='submit' name='simpan' value='Simpan'></p>";
echo "</form>";
echo "<p><a href='home.php'> << Kembali ke Halaman Awal </a><p>";

if(isset($_POST['simpan'])) {
    $iduser = $_SESSION['iduser'];
    $idcerita = $objCerita->getIdCerita($judul);
    $isi = $_POST['tambah_paragraf'];
    $tglbuat = date("Y-m-d H:i:s");
    $idparagraf = $objCerita->insertParagrafBaru($iduser, $idcerita, $isi, $tglbuat);
    header("read.php");
}
?>