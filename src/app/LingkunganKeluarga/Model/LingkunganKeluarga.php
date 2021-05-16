<?php

namespace App\LingkunganKeluarga\Model;

use Core\GlobalFunc;

class LingkunganKeluarga extends GlobalFunc
{
    private $table = 'lingkunganKeluarga';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idLingkungankeluarga\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idLingkungankeluarga, $nipPegawai, $jenisAnggotakeluarga, $namaAnggotakeluaraga, $jeniskelaminAnggotakeluarga, $tempatlahirAnggotakeluarga, $tanggallahirAnggotakeluarga, $pendidikanAnggotakeluarga, $pekerjaanAnggotakeluarga)
    {
        $jenisAnggotakeluarga = $this->esc_str($this->conn, $jenisAnggotakeluarga);
        $namaAnggotakeluaraga = $this->esc_str($this->conn, $namaAnggotakeluaraga);
        $jeniskelaminAnggotakeluarga = $this->esc_str($this->conn, $jeniskelaminAnggotakeluarga);
        $tempatlahirAnggotakeluarga = $this->esc_str($this->conn, $tempatlahirAnggotakeluarga);
        $tanggallahirAnggotakeluarga = $this->esc_str($this->conn, $tanggallahirAnggotakeluarga);
        $pendidikanAnggotakeluarga = $this->esc_str($this->conn, $pendidikanAnggotakeluarga);
        $pekerjaanAnggotakeluarga = $this->esc_str($this->conn, $pekerjaanAnggotakeluarga);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idLingkungankeluarga', '$nipPegawai', '$jenisAnggotakeluarga', '$namaAnggotakeluaraga', '$jeniskelaminAnggotakeluarga', '$tempatlahirAnggotakeluarga', ";
        $sql.= $tanggallahirAnggotakeluarga == '' ? 'null' : "'".$tanggallahirAnggotakeluarga."'";
        $sql.= ", '$pendidikanAnggotakeluarga', '$pekerjaanAnggotakeluarga', '$dateCreate')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idLingkungankeluarga, $nipPegawai, $jenisAnggotakeluarga, $namaAnggotakeluarga, $jeniskelaminAnggotakeluarga, $tempatlahirAnggotakeluarga, $tanggallahirAnggotakeluarga, $pendidikanAnggotakeluarga, $pekerjaanAnggotakeluarga)
    {
        $jenisAnggotakeluarga = $this->esc_str($this->conn, $jenisAnggotakeluarga);
        $namaAnggotakeluaraga = $this->esc_str($this->conn, $namaAnggotakeluarga);
        $jeniskelaminAnggotakeluarga = $this->esc_str($this->conn, $jeniskelaminAnggotakeluarga);
        $tempatlahirAnggotakeluarga = $this->esc_str($this->conn, $tempatlahirAnggotakeluarga);
        $tanggallahirAnggotakeluarga = $this->esc_str($this->conn, $tanggallahirAnggotakeluarga);
        $pendidikanAnggotakeluarga = $this->esc_str($this->conn, $pendidikanAnggotakeluarga);
        $pekerjaanAnggotakeluarga = $this->esc_str($this->conn, $pekerjaanAnggotakeluarga);

        $sql = "UPDATE \"".$this->table."\" SET \"nipPegawai\"='$nipPegawai', \"jenisAnggotakeluarga\"='$jenisAnggotakeluarga', \"namaAnggotakeluarga\"='$namaAnggotakeluarga', \"jeniskelaminAnggotakeluarga\"='$jeniskelaminAnggotakeluarga', \"tempatlahirAnggotakeluarga\"='$tempatlahirAnggotakeluarga', \"tanggallahirAnggotakeluarga\"=";
        $sql.= $tanggallahirAnggotakeluarga == '' ? 'null' : $tanggallahirAnggotakeluarga;
        $sql.= ", \"pendidikanAnggotakeluarga\"='$pendidikanAnggotakeluarga', \"pekerjaanAnggotakeluarga\"='$pekerjaanAnggotakeluarga' WHERE \"idLingkungankeluarga\"='$idLingkungankeluarga'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idLingkungankeluarga)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idLingkungankeluarga\"='$idLingkungankeluarga'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function selectMany($nipPegawai)
    {
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"nipPegawai\"='$nipPegawai'";
        $query = pg_query($this->conn, $sql);
        $datas = [];
        while ($item = pg_fetch_assoc($query)) {
            array_push($datas, $item);
        }

        return $datas;
    }
}
