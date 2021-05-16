<?php

namespace App\SpesifikasiKeahlian\Model;

use Core\GlobalFunc;

class SpesifikasiKeahlian extends GlobalFunc
{
    private $table = 'spesifikasiKeahlian';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM \"".$this->table."\"";
        $query = pg_query($this->conn, $sql);
        $datas = [];
        while ($item = pg_fetch_assoc($query)) {
            array_push($datas, $item);
        }

        return $datas;
    }

    public function selectOne($id)
    {
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idSpesifikasikeahlian\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idSpesifikasikeahlian, $namaSpesifikasikeahlian)
    {
        $namaSpesifikasikeahlian = $this->esc_str($this->conn, $namaSpesifikasikeahlian);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idSpesifikasikeahlian', '$namaSpesifikasikeahlian', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idSpesifikasikeahlian, $namaSpesifikasikeahlian)
    {
        $namaSpesifikasikeahlian = $this->esc_str($this->conn, $namaSpesifikasikeahlian);

        $sql = "UPDATE \"".$this->table."\" SET \"namaSpesifikasikeahlian\"='$namaSpesifikasikeahlian' WHERE \"idSpesifikasikeahlian\"='$idSpesifikasikeahlian'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idSpesifikasikeahlian)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idSpesifikasikeahlian\"='$idSpesifikasikeahlian'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
