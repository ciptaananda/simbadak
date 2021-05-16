<?php

namespace App\Kelurahan\Model;

use Core\GlobalFunc;

class Kelurahan extends GlobalFunc
{
    private $table = 'kelurahan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idKelurahan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idKelurahan, $nama, $idKecamatan)
    {
        $idKelurahan = $this->esc_str($this->conn, $idKelurahan);
        $nama = $this->esc_str($this->conn, $nama);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idKelurahan', '$nama', '$idKecamatan', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idKelurahan, $nama, $idKecamatan)
    {
        $nama = $this->esc_str($this->conn, $nama);

        $sql = "UPDATE \"".$this->table."\" SET \"nama\"='$nama', \"idKecamatan\"='$idKecamatan' WHERE \"idKelurahan\"='$idKelurahan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idKelurahan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idKelurahan\"='$idKelurahan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
