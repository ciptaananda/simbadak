<?php

namespace App\KepemilikanBangunan\Model;

use Core\GlobalFunc;

class KepemilikanBangunan extends GlobalFunc
{
    private $table = 'kepemilikanBangunan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idKepemilikanbangunan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idKepemilikanbangunan, $namaKepemilikanbangunan)
    {
        $namaKepemilikanbangunan = $this->esc_str($this->conn, $namaKepemilikanbangunan);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idKepemilikanbangunan', '$namaKepemilikanbangunan', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idKepemilikanbangunan, $namaKepemilikanbangunan)
    {
        $namaKepemilikanbangunan = $this->esc_str($this->conn, $namaKepemilikanbangunan);

        $sql = "UPDATE \"".$this->table."\" SET \"namaKepemilikanbangunan\"='$namaKepemilikanbangunan' WHERE \"idKepemilikanbangunan\"='$idKepemilikanbangunan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idKepemilikanbangunan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idKepemilikanbangunan\"='$idKepemilikanbangunan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
