<?php

namespace App\Kecamatan\Model;

use Core\GlobalFunc;

class Kecamatan extends GlobalFunc
{
    private $table = 'kecamatan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idKecamatan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idKecamatan, $nama, $idKabupaten)
    {
        $idKecamatan = $this->esc_str($this->conn, $idKecamatan);
        $nama = $this->esc_str($this->conn, $nama);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idKecamatan', '$nama', '$idKabupaten', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idKecamatan, $nama, $idKabupaten)
    {
        $nama = $this->esc_str($this->conn, $nama);

        $sql = "UPDATE \"".$this->table."\" SET \"nama\"='$nama', \"idKabupaten\"='$idKabupaten' WHERE \"idKecamatan\"='$idKecamatan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idKecamatan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idKecamatan\"='$idKecamatan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
