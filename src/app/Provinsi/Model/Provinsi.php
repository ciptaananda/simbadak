<?php

namespace App\Provinsi\Model;

use Core\GlobalFunc;

class Provinsi extends GlobalFunc
{
    private $table = 'provinsi';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idProvinsi\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idProvinsi, $nama)
    {
        $nama = $this->esc_str($this->conn, $nama);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idProvinsi', '$nama', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idProvinsi, $nama)
    {
        $nama = $this->esc_str($this->conn, $nama);

        $sql = "UPDATE \"".$this->table."\" SET \"nama\"='$nama' WHERE \"idProvinsi\"='$idProvinsi'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idProvinsi)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idProvinsi\"='$idProvinsi'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
