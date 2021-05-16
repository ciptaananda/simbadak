<?php

namespace App\Pekerjaan\Model;

use Core\GlobalFunc;

class Pekerjaan extends GlobalFunc
{
    private $table = 'pekerjaan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idPekerjaan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idPekerjaan, $namaPekerjaan)
    {
        $namaPekerjaan = $this->esc_str($this->conn, $namaPekerjaan);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idPekerjaan', '$namaPekerjaan', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idPekerjaan, $namaPekerjaan)
    {
        $namaPekerjaan = $this->esc_str($this->conn, $namaPekerjaan);

        $sql = "UPDATE \"".$this->table."\" SET \"namaPekerjaan\"='$namaPekerjaan' WHERE \"idPekerjaan\"='$idPekerjaan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idPekerjaan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idPekerjaan\"='$idPekerjaan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
