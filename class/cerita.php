<?php  
require_once("parent.php");

class Cerita extends Parentclass {
	public function __construct() {
		parent::__construct();
	}

	public function getKumpulanCerita($iduser, $offset)
	{
		$sql = "SELECT c.judul, u.nama, COUNT(p.idparagraf) AS 'Jumlah Paragraf'
            	FROM cerita c
            	INNER JOIN users u ON c.idusers_pembuat_awal = u.idusers
            	INNER JOIN paragraf p ON c.idcerita = p.idcerita
            	WHERE c.idusers_pembuat_awal != ?
           		GROUP BY c.judul, u.nama limit ?, 4";
    	$stmt = $this->mysqli->prepare($sql);
    	$stmt->bind_param('ii', $iduser, $offset);
    	$stmt->execute();
    	$res = $stmt->get_result();
    	return $res;
	}	

	public function getCeritaku($iduser, $offset)
	{
	    $sql = "SELECT c.judul, COUNT(p.idparagraf) AS 'Jumlah Paragraf'
	            FROM cerita c
	            INNER JOIN users u ON c.idusers_pembuat_awal = u.idusers
	            INNER JOIN paragraf p ON c.idcerita = p.idcerita
	            WHERE c.idusers_pembuat_awal = ?
	            GROUP BY c.judul LIMIT ?, 2";
	    $stmt = $this->mysqli->prepare($sql);
	    $stmt->bind_param('ii', $iduser, $offset);
	    $stmt->execute();
	    $res = $stmt->get_result();
	    return $res;
	}

	public function getTotalData($cariJudul)
    {
        $res = $this->getCerita($cariJudul);
        return $res->num_rows;
    }

	public function insertCerita($judul, $idpembuat_awal){
        $sql1 = "SELECT judul from cerita where judul= ?";
        $stmt = $this->mysqli->prepare($sql1);
        $stmt->bind_param('s', $judul);
        $stmt->execute();
        $res = $stmt->get_result();
        if($res->num_rows < 1){ //pengecekan judul sudah ada di db atau tidak
            $sql2 = "INSERT INTO cerita(judul, idusers_pembuat_awal) VALUES (?, ?)";
           	$stmt = $this->mysqli->prepare($sql2);
            $stmt->bind_param('ss', $judul, $idpembuat_awal);
            $stmt->execute();
            $idcerita = $stmt->insert_id;
            return $idcerita;
        }
        else{
            return null;   
        }
	}

	public function insertParagraf($iduser, $idcerita, $isi, $tglbuat) {
    	$sql = "INSERT into paragraf(idusers, idcerita, isi_paragraf, tanggal_buat) VALUES (?,?,?,?)";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param('siss', $iduser, $idcerita, $isi, $tglbuat);
		$stmt->execute();
		$idparagraf = $stmt->insert_id;
		return $idparagraf;
	}

	public function displayCerita($judul)
    {
        $sql = "SELECT c.judul, p.isi_paragraf FROM cerita c 
                INNER JOIN paragraf p ON c.idcerita = p.idcerita  WHERE c.judul=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param('s', $judul);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function getIdCerita($judul){
		$sql = "SELECT idcerita from cerita where judul=?";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param('s',$judul);
		$stmt->execute();
		$res= $stmt->get_result();
		$row = $res->fetch_assoc();
		$idcerita = $row['idcerita']; 
		return $idcerita;
	}

    public function insertParagrafBaru($iduser, $idcerita, $isi, $tglbuat) {
    	$sql = "INSERT into paragraf(idusers, idcerita, isi_paragraf, tanggal_buat) VALUES (?,?,?,?)";
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param('siss', $iduser, $idcerita, $isi, $tglbuat);
		$stmt->execute();
		$idparagraf = $stmt->insert_id;
		return $idparagraf;
	}
}
?>