<?php

namespace App\Hirarki\Model;

use Core\GlobalFunc;

class Hirarki extends GlobalFunc
{
    private $table = 'hirarki';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idHirarki\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idHirarki, $namaHirarki)
    {
        $namaHirarki = $this->esc_str($this->conn, $namaHirarki);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idHirarki', '$namaHirarki', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idHirarki, $namaHirarki)
    {
        $namaHirarki = $this->esc_str($this->conn, $namaHirarki);

        $sql = "UPDATE \"".$this->table."\" SET \"namaHirarki\"='$namaHirarki' WHERE \"idHirarki\"='$idHirarki'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idHirarki)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idHirarki\"='$idHirarki'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
