<?php

namespace App\DomainWbtb\Model;

use Core\GlobalFunc;

class DomainWbtb extends GlobalFunc
{
    private $table = 'domainWbtb';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idDomainwbtb\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idDomainwbtb, $deskripsiwbtb)
    {
        $deskripsiwbtb = $this->esc_str($this->conn, $deskripsiwbtb);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idDomainwbtb', '$deskripsiwbtb', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idDomainwbtb, $deskripsiwbtb)
    {
        $deskripsiwbtb = $this->esc_str($this->conn, $deskripsiwbtb);

        $sql = "UPDATE \"".$this->table."\" SET \"deskripsiWbtb\"='$deskripsiwbtb' WHERE \"idDomainwbtb\"='$idDomainwbtb'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idDomainwbtb)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idDomainwbtb\"='$idDomainwbtb'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
