<?php

namespace App\Opk\Model;

use Core\GlobalFunc;

class Opk extends GlobalFunc
{
    private $table = 'opk';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idOpk\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idOpk, $namaOpk, $definisiOpk)
    {
        $namaOpk = $this->esc_str($this->conn, $namaOpk);
        $definisiOpk = $this->esc_str($this->conn, $definisiOpk);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idOpk', '$namaOpk', '$definisiOpk', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idOpk, $namaOpk, $definisiOpk)
    {
        $namaOpk = $this->esc_str($this->conn, $namaOpk);
        $definisiOpk = $this->esc_str($this->conn, $definisiOpk);

        $sql = "UPDATE \"".$this->table."\" SET \"namaOpk\"='$namaOpk', \"definisiOpk\"='$definisiOpk' WHERE \"idOpk\"='$idOpk'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idOpk)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idOpk\"='$idOpk'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
