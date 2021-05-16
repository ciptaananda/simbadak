<?php

namespace App\Pendidikan\Model;

use Core\GlobalFunc;

class Pendidikan extends GlobalFunc
{
    private $table = 'pendidikan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idPendidikan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idPendidikan, $namaPendidikan)
    {
        $namaPendidikan = $this->esc_str($this->conn, $namaPendidikan);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idPendidikan', '$namaPendidikan', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idPendidikan, $namaPendidikan)
    {
        $namaPendidikan = $this->esc_str($this->conn, $namaPendidikan);

        $sql = "UPDATE \"".$this->table."\" SET \"namaPendidikan\"='$namaPendidikan' WHERE \"idPendidikan\"='$idPendidikan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idPendidikan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idPendidikan\"='$idPendidikan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
