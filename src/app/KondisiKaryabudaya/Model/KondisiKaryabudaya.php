<?php

namespace App\KondisiKaryabudaya\Model;

use Core\GlobalFunc;

class KondisiKaryabudaya extends GlobalFunc
{
    private $table = 'kondisiKaryabudaya';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idKondisikaryabudaya\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idKondisikaryabudaya, $namaKondisikaryabudaya)
    {
        $namaKondisikaryabudaya = $this->esc_str($this->conn, $namaKondisikaryabudaya);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idKondisikaryabudaya', '$namaKondisikaryabudaya', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idKondisikaryabudaya, $namaKondisikaryabudaya)
    {
        $namaKondisikaryabudaya = $this->esc_str($this->conn, $namaKondisikaryabudaya);

        $sql = "UPDATE \"".$this->table."\" SET \"namaKondisikaryabudaya\"='$namaKondisikaryabudaya' WHERE \"idKondisikaryabudaya\"='$idKondisikaryabudaya'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idKondisikaryabudaya)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idKondisikaryabudaya\"='$idKondisikaryabudaya'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
