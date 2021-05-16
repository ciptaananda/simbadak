<?php

namespace App\Instansi\Model;

use Core\GlobalFunc;

class Instansi extends GlobalFunc
{
    private $table = 'instansi';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idInstansi\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idInstansi, $namaInstansi, $alamatInstansi, $telponInstansi, $emailInstansi, $websiteInstansi, $sosmedInstansi, $hirarkiInstansi)
    {
        $namaInstansi = $this->esc_str($this->conn, $namaInstansi);
        $alamatInstansi = $this->esc_str($this->conn, $alamatInstansi);
        $telponInstansi = $this->esc_str($this->conn, $telponInstansi);
        $emailInstansi = $this->esc_str($this->conn, $emailInstansi);
        $websiteInstansi = $this->esc_str($this->conn, $websiteInstansi);
        $sosmedInstansi = $this->esc_str($this->conn, $sosmedInstansi);
        $hirarkiInstansi = $this->esc_str($this->conn, $hirarkiInstansi);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idInstansi', '$namaInstansi', '$alamatInstansi', '$telponInstansi', '$emailInstansi', '$websiteInstansi', '$sosmedInstansi', '$hirarkiInstansi', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idInstansi, $namaInstansi, $alamatInstansi, $telponInstansi, $emailInstansi, $websiteInstansi, $sosmedInstansi, $hirarkiInstansi)
    {
        $namaInstansi = $this->esc_str($this->conn, $namaInstansi);

        $sql = "UPDATE \"".$this->table."\" SET \"namaInstansi\"='$namaInstansi', \"alamatInstansi\"='$alamatInstansi', \"telponInstansi\"='$telponInstansi', \"emailInstansi\"='$emailInstansi', \"websiteInstansi\"='$websiteInstansi', \"sosmedInstansi\"='$sosmedInstansi', \"hirarkiInstansi\"='$hirarkiInstansi' WHERE \"idInstansi\"='$idInstansi'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idInstansi)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idInstansi\"='$idInstansi'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
