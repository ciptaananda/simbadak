<?php

namespace App\Keahlian\Model;

use Core\GlobalFunc;

class Keahlian extends GlobalFunc
{
    private $table = 'keahlian';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idKeahlian\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idKeahlian, $namaKeahlian)
    {
        $namaKeahlian = $this->esc_str($this->conn, $namaKeahlian);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idKeahlian', '$namaKeahlian', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idKeahlian, $namaKeahlian)
    {
        $namaKeahlian = $this->esc_str($this->conn, $namaKeahlian);

        $sql = "UPDATE \"".$this->table."\" SET \"namaKeahlian\"='$namaKeahlian' WHERE \"idKeahlian\"='$idKeahlian'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idKeahlian)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idKeahlian\"='$idKeahlian'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
