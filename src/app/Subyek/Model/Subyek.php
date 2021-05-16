<?php

namespace App\Subyek\Model;

use Core\GlobalFunc;

class Subyek extends GlobalFunc
{
    private $table = 'subyek';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idSubyek\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idSubyek, $namaSubyek, $definisiSubyek)
    {
        $namaSubyek = $this->esc_str($this->conn, $namaSubyek);
        $definisiSubyek = $this->esc_str($this->conn, $definisiSubyek);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idSubyek', '$namaSubyek', '$definisiSubyek', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idSubyek, $namaSubyek, $definisiSubyek)
    {
        $namaSubyek = $this->esc_str($this->conn, $namaSubyek);
        $definisiSubyek = $this->esc_str($this->conn, $definisiSubyek);

        $sql = "UPDATE \"".$this->table."\" SET \"namaSubyek\"='$namaSubyek', \"definisiSubyek\"='$definisiSubyek' WHERE \"idSubyek\"='$idSubyek'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idSubyek)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idSubyek\"='$idSubyek'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
