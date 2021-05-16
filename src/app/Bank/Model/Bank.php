<?php

namespace App\Bank\Model;

use Core\GlobalFunc;

class Bank extends GlobalFunc
{
    private $table = 'bank';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idBank\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idBank, $namaBank)
    {
        $namaBank = $this->esc_str($this->conn, $namaBank);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idBank', '$namaBank', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idBank, $namaBank)
    {
        $namaBank = $this->esc_str($this->conn, $namaBank);

        $sql = "UPDATE ".$this->table." SET \"namaBank\"='$namaBank' WHERE \"idBank\"='$idBank'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idBank)
    {
        $sql = "DELETE FROM ".$this->table." WHERE \"idBank\"='$idBank'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
