<?php

namespace App\Kabupaten\Model;

use Core\GlobalFunc;

class Kabupaten extends GlobalFunc
{
    private $table = 'kabupaten';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idKabupaten\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idKabupaten, $nama, $idProvinsi)
    {
        $idKabupaten = $this->esc_str($this->conn, $idKabupaten);
        $nama = $this->esc_str($this->conn, $nama);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idKabupaten', '$nama', '$idProvinsi', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idKabupaten, $nama, $idProvinsi)
    {
        $nama = $this->esc_str($this->conn, $nama);

        $sql = "UPDATE \"".$this->table."\" SET \"nama\"='$nama', \"idProvinsi\"='$idProvinsi' WHERE \"idKabupaten\"='$idKabupaten'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idKabupaten)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idKabupaten\"='$idKabupaten'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
