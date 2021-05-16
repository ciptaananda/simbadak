<?php

namespace App\JenisPercetakan\Model;

use Core\GlobalFunc;

class JenisPercetakan extends GlobalFunc
{
    private $table = 'jenisPercetakan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idJenispercetakan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idJenisPercetakan, $namaJenispercetakan)
    {
        $namaJenispercetakan = $this->esc_str($this->conn, $namaJenispercetakan);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idJenisPercetakan', '$namaJenispercetakan', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idJenisPercetakan, $namaJenispercetakan)
    {
        $namaJenispercetakan = $this->esc_str($this->conn, $namaJenispercetakan);

        $sql = "UPDATE \"".$this->table."\" SET \"namaJenispercetakan\"='$namaJenispercetakan' WHERE \"idJenispercetakan\"='$idJenisPercetakan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idJenisPercetakan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idJenispercetakan\"='$idJenisPercetakan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
