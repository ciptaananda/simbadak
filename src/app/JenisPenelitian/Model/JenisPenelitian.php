<?php

namespace App\JenisPenelitian\Model;

use Core\GlobalFunc;

class JenisPenelitian extends GlobalFunc
{
    private $table = 'jenisPenelitian';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idJenispenelitian\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idJenisPenelitian, $namaJenispenelitian)
    {
        $namaJenispenelitian = $this->esc_str($this->conn, $namaJenispenelitian);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idJenisPenelitian', '$namaJenispenelitian', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idJenisPenelitian, $namaJenispenelitian)
    {
        $namaJenispenelitian = $this->esc_str($this->conn, $namaJenispenelitian);

        $sql = "UPDATE \"".$this->table."\" SET \"namaJenispenelitian\"='$namaJenispenelitian' WHERE \"idJenispenelitian\"='$idJenisPenelitian'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idJenisPenelitian)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idJenispenelitian\"='$idJenisPenelitian'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
