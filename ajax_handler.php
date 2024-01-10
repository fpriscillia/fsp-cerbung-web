<?php
require_once("class/cerita.php");
$objCerita = new cerita();

require_once("class/users.php");
if (!isset($_SESSION['iduser'])) {
  header("Location: index.php");
  exit();
}

$iduser = $_SESSION['iduser'];

// get the method and offset parameters from AJAX request
$method = isset($_POST['method']) ? $_POST['method'] : '';
$offset = isset($_POST['offset']) ? $_POST['offset'] : 0;

// check the method and call the corresponding function from the class cerita
if ($method == 'getKumpulanCerita') {
    $result = $objCerita->getKumpulanCerita($iduser, $offset);
    // loop through the result and echo the HTML output for each card
    while ($row = $result->fetch_assoc()) {
        $judul = $row['judul'];
        $pembuat_awal = $row['nama'];
        $jmlhParagraf = $row['Jumlah Paragraf'];
        echo "<div class='card'>";
        echo "<h3>" . $judul . "</h3>";
        echo "<p>Pemilik Cerita: " . $pembuat_awal . "</p>";
        echo "<p>Jumlah Paragraf: " . $jmlhParagraf . "</p>";
        echo "<p><a href='read.php?judul=" . $judul . "'>Baca Lebih Lanjut</a></p>";
        echo "</div>";
    }
} 
elseif ($method == 'getCeritaku') {
    $result = $objCerita->getCeritaku($iduser, $offset);
    while ($row = $result->fetch_assoc()) {
                $judul = $row['judul'];
                $jmlhParagraf = $row['Jumlah Paragraf'];
                echo "<div class='card'>";
                echo "<h3>" . $judul . "</h3>";
                echo "<p>Jumlah Paragraf: " . $jmlhParagraf . "</p>";
                echo "<p><a href='read.php?judul=" . $judul . "'>Baca Lebih Lanjut</a></p>";
                echo "</div>";
    }
}

?>
