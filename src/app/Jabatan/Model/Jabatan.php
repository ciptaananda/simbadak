<?php

namespace App\Jabatan\Model;

use Core\GlobalFunc;

class Jabatan extends GlobalFunc
{
    private $table = 'jabatan';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idJabatan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idJabatan, $namaJabatan)
    {
        $namaJabatan = $this->esc_str($this->conn, $namaJabatan);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idJabatan', '$namaJabatan', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idJabatan, $namaJabatan)
    {
        $namaJabatan = $this->esc_str($this->conn, $namaJabatan);

        $sql = "UPDATE \"".$this->table."\" SET \"namaJabatan\"='$namaJabatan' WHERE \"idJabatan\"='$idJabatan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idJabatan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idJabatan\"='$idJabatan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
