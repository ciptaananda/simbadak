<?php

namespace App\Eksternal\Model;

use Core\GlobalFunc;

class Eksternal extends GlobalFunc
{
    private $table = 'eksternal';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idEksternal\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idEksternal, $namaEksternal, $idPekerjaan, $instansiEksternal, $tempatlahirEksternal, $tanggallahirEksternal, $alamatEksternal, $provinsiEksternal, $kabupatenEksternal, $kecamatanEksternal, $kelurahanEksternal, $agamaEksternal, $teleponEksternal, $mobilEksternal, $emailEksternal, $approvedEksternal)
    {
        $namaEksternal = $this->esc_str($this->conn, $namaEksternal);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idEksternal', '$namaEksternal', '$idPekerjaan', '$instansiEksternal', '$tempatlahirEksternal', ";

        $sql.= $tanggallahirEksternal == '' ? 'null' : "'".$tanggallahirEksternal."'";

        $sql.=", '$alamatEksternal', '$provinsiEksternal', '$kabupatenEksternal', '$kecamatanEksternal', '$kelurahanEksternal', '$agamaEksternal', '$teleponEksternal', '$mobilEksternal', '$emailEksternal', '$approvedEksternal', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idEksternal, $namaEksternal, $idPekerjaan, $instansiEksternal, $tempatlahirEksternal, $tanggallahirEksternal, $alamatEksternal, $provinsiEksternal, $kabupatenEksternal, $kecamatanEksternal, $kelurahanEksternal, $agamaEksternal, $teleponEksternal, $mobilEksternal, $emailEksternal, $approvedEksternal)
    {
        $namaEksternal = $this->esc_str($this->conn, $namaEksternal);

        $sql = "UPDATE \"".$this->table."\" SET \"namaEksternal\"='$namaEksternal', \"idPekerjaan\"='$idPekerjaan', \"instansiEksternal\"='$instansiEksternal', \"tempatlahirEksternal\"='$tempatlahirEksternal', \"tanggallahirEksternal\"=";

        $sql.= $tanggallahirEksternal == '' ? 'null' : "'".$tanggallahirEksternal."'";
        
        $sql.= ", \"alamatEksternal\"='$alamatEksternal', \"provinsiEksternal\"='$provinsiEksternal', \"kabupatenEksternal\"='$kabupatenEksternal', \"kecamatanEksternal\"='$kecamatanEksternal', \"kelurahanEksternal\"='$kelurahanEksternal', \"agamaEksternal\"='$agamaEksternal', \"teleponEksternal\"='$teleponEksternal', \"mobilEksternal\"='$mobilEksternal', \"emailEksternal\"='$emailEksternal', \"approvedEksternal\"='$approvedEksternal' WHERE \"idEksternal\"='$idEksternal'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idEksternal)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idEksternal\"='$idEksternal'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
