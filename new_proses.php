<?php
session_start();
require_once("class/users.php");

// if (!isset($_SESSION['iduser'])) {
//   header("Location: index.php");
//   exit();
// }

require_once("class/cerita.php");
$objCerita = new cerita();

if(isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $idpembuat_awal = $_SESSION['iduser'];
    $idcerita = $objCerita->insertCerita($judul, $idpembuat_awal);
    if(!is_null($idcerita)){
        $isi = $_POST['paragraf'];
        $tglbuat = date("Y-m-d H:i:s");
        $idparagraf = $objCerita->insertParagraf($idpembuat_awal, $idcerita, $isi, $tglbuat);
        header("location:home.php");
    }
    else{
        header("location:new.php?error=gagal");
    }
}
?>