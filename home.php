<?php
require_once("class/cerita.php");
$objCerita = new cerita();

require_once("class/users.php");
if (!isset($_SESSION['iduser'])) {
  header("Location: index.php");
  exit();
}
$iduser = $_SESSION['iduser'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="js/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var offsetCeritaku = 0;
            var offsetKumpCerita = 0;

            // untuk bagian load more ceritaku
            $("#btnCeritaku").on("click", function () {
                offsetCeritaku += 2; // menambah limitnya (2)
                loadMoreData("getCeritaku", offsetCeritaku, ".ceritaku");
            });

            // bagian kumpulan cerita
            $("#btnKumpCerita").on("click", function () {
                offsetKumpCerita += 4; // menambah limit (4)
                loadMoreData("getKumpulanCerita", offsetKumpCerita, ".kumpulancerita");
            });

            // untuk load more data
            function loadMoreData(method, offset, container) {
                $.ajax({
                    url: "ajax_handler.php", // update dgn ajax req
                    type: "POST",
                    data: {
                        method: method,
                        offset: offset,
                    },
                    success: function (data) {
                        if (data !== "") {
                            $(container).append(data);
                        } 
                    },
                });
            }
            // untuk combo box ssuai yang dipilih *phone only
            $('#cmbKategori').change(function () {
                // Semua card disembunyikan
                $('.kiri, .kanan').hide();

                // Menampilkan card sesuai dengan kategori yang dipilih
                var selectedKategori = $(this).val();
                if (selectedKategori === 'ceritaku') {
                    $('.kanan').show();
                }
                if( selectedKategori == 'kumpCerita') {
                    $('.kiri').show();
                }
            });

            if ($(window).width() <= 575 && $('#cmbKategori').val() === 'ceritaku') {
                $('.kiri').hide();
                $('#cmbKategori').show();
                $('.kanan').show();
            } 

             // hide cardnya dan tampilkan combo boxnya saat ukurannya 575px ke bawah
            $(window).resize(function () {
            if ($(window).width() <= 575 && $('#cmbKategori').val() === 'ceritaku') {
                $('.kiri').hide();
                $('#cmbKategori').show();
                $('.kanan').show();
            } 
            else if ($(window).width() <= 575 && $('#cmbKategori').val() === 'kumpCerita') {
                $('.kanan').hide();
                $('#cmbKategori').show();
                $('.kiri').show();
            } 
            else {
                $('.kiri, .kanan').show();
                $('#cmbKategori').hide();
            }
         });
    });
    </script>
</head>
<body>
<h1 id="webtitle">CERBUNG</h1>
<p id="subtitle">Cerita Bersambung</p>
<!-- <form method='POST' action="new.php">
    <p><button type='submit' name='buat' value='buat'>Buat Cerita Baru</button></p>/*
</form> -->
<div class="phone-only">
    <h3>Kategori:</h3>
    <select name="" id="cmbKategori">
        <option value="ceritaku">Ceritaku</option>
        <option value="kumpCerita">Kumpulan Cerita</option>
    </select>
</div>
<div class="container">
    <div class="kanan">
        <h2>Ceritaku</h2>
        <div class="ceritaku">
        <?php
            $result = $objCerita->getCeritaku($iduser, 0);
            while ($row = $result->fetch_assoc()) {
                $judul = $row['judul'];
                $jmlhParagraf = $row['Jumlah Paragraf'];
                echo "<div class='card'>";
                echo "<h3>" . $judul . "</h3>";
                echo "<p>Jumlah Paragraf: " . $jmlhParagraf . "</p>";
                echo "<p><a href='read.php?judul=" . $judul . "'>Baca Lebih Lanjut</a></p>";
                echo "</div>";
            }
        ?>
        </div>
        <button id="btnCeritaku">Tampilkan Cerita Selanjutnya</button>
    </div>
    <div class="kiri">
        <h2>Kumpulan Cerita</h2>
        <div class ="kumpulancerita">
        <?php
            $result = $objCerita->getKumpulanCerita($iduser,0);
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
        ?>
        </div>
        <button id="btnKumpCerita">Tampilkan Cerita Selanjutnya</button>
    </div>
</div>
<br><br>
<a href='index.php'>>> Kembali ke halaman awal</a>
</body>
</html>