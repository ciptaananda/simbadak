<?php

namespace App\UnitKerja\Model;

use Core\GlobalFunc;

class UnitKerja extends GlobalFunc
{
    private $table = 'unitKerja';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idUnitkerja\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idUnitkerja, $namaUnitkerja)
    {
        $namaUnitkerja = $this->esc_str($this->conn, $namaUnitkerja);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idUnitkerja', '$namaUnitkerja', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idUnitkerja, $namaUnitkerja)
    {
        $namaUnitkerja = $this->esc_str($this->conn, $namaUnitkerja);

        $sql = "UPDATE \"".$this->table."\" SET \"namaUnitkerja\"='$namaUnitkerja' WHERE \"idUnitkerja\"='$idUnitkerja'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idUnitkerja)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idUnitkerja\"='$idUnitkerja'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
