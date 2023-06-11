<?php

class Functions {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insertData($nama, $nis, $nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6) {
        $sql = "INSERT INTO profil (nama, nis, pipas, pjok, inggris, indo, mtk, paibp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiiiiis", $nama, $nis, $nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
        $stmt->execute();
        $stmt->close();
    }

    public function Total($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6) {
        $total = $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5 + $nilai6;
        return $total;
    }

    public function Rata($total) {
        $rata = $total / 6;
        return $rata;
    }

    public function cariMax($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6) {
        $max = max($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
        return $max;
    }

    public function cariMin($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6) {
        $min = min($nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6);
        return $min;
    }

    public function cariGrade($rata) {
        if ($rata > 90) {
            return "A";
        } elseif ($rata > 80) {
            return "B";
        } elseif ($rata > 70) {
            return "C";
        } elseif ($rata > 60) {
            return "D";
        } else {
            return "E";
        }
    }
}

?>