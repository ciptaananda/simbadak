<?php

namespace App\Pegawai\Model;

use Core\GlobalFunc;

class Pegawai extends GlobalFunc
{
    private $table = 'pegawai';
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
        $sql = "SELECT * FROM \"".$this->table."\" WHERE \"idPegawai\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($idPegawai, $namaPegawai, $mobilPegawai, $emailPegawai, $hirarkiPegawai, $idInstansi, $jabatanPegawai, $tempatlahirPegawai, $tanggallahirPegawai, $jeniskelaminPegawai, $alamatPegawai, $alamatkantorPegawai, $agamaPegawai, $telponPegawai, $statuspernikahanPegawai, $unitkerjaPegawai, $provinsiPegawai, $kabupatenPegawai, $kecamatanPegawai, $kelurahanPegawai)
    {
        $namaPegawai = $this->esc_str($this->conn, $namaPegawai);
        $mobilPegawai = $this->esc_str($this->conn, $mobilPegawai);
        $emailPegawai = $this->esc_str($this->conn, $emailPegawai);
        $hirarkiPegawai = $this->esc_str($this->conn, $hirarkiPegawai);
        $idInstansi = $this->esc_str($this->conn, $idInstansi);
        $jabatanPegawai = $this->esc_str($this->conn, $jabatanPegawai);
        $tempatlahirPegawai = $this->esc_str($this->conn, $tempatlahirPegawai);
        $tanggallahirPegawai = $this->esc_str($this->conn, $tanggallahirPegawai);
        $jeniskelaminPegawai = $this->esc_str($this->conn, $jeniskelaminPegawai);
        $alamatkantorPegawai = $this->esc_str($this->conn, $alamatkantorPegawai);
        $alamatPegawai = $this->esc_str($this->conn, $alamatPegawai);
        $agamaPegawai = $this->esc_str($this->conn, $agamaPegawai);
        $telponPegawai = $this->esc_str($this->conn, $telponPegawai);
        $statuspernikahanPegawai = $this->esc_str($this->conn, $statuspernikahanPegawai);
        $unitkerjaPegawai = $this->esc_str($this->conn, $unitkerjaPegawai);
        $provinsiPegawai = $this->esc_str($this->conn, $provinsiPegawai);
        $kabupatenPegawai = $this->esc_str($this->conn, $kabupatenPegawai);
        $kecamatanPegawai = $this->esc_str($this->conn, $kecamatanPegawai);
        $kelurahanPegawai = $this->esc_str($this->conn, $kelurahanPegawai);
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idPegawai', '$namaPegawai', '$mobilPegawai', '$emailPegawai', '$hirarkiPegawai', '$idInstansi', '$jabatanPegawai', '$tempatlahirPegawai', ";
        $sql.= $tanggallahirPegawai == '' ? 'null' : $tanggallahirPegawai;
        $sql.= ", '$alamatPegawai', '$alamatkantorPegawai', '$agamaPegawai', '$telponPegawai', '$statuspernikahanPegawai', '$unitkerjaPegawai', '$provinsiPegawai', '$kabupatenPegawai', '$kecamatanPegawai', '$kelurahanPegawai', '$dateCreate', '$jeniskelaminPegawai')";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idPegawai, $namaPegawai, $mobilPegawai, $emailPegawai, $hirarkiPegawai, $idInstansi, $jabatanPegawai, $tempatlahirPegawai, $tanggallahirPegawai, $jeniskelaminPegawai, $alamatPegawai, $alamatkantorPegawai, $agamaPegawai, $telponPegawai, $statuspernikahanPegawai, $unitkerjaPegawai, $provinsiPegawai, $kabupatenPegawai, $kecamatanPegawai, $kelurahanPegawai)
    {
        $namaPegawai = $this->esc_str($this->conn, $namaPegawai);
        $mobilPegawai = $this->esc_str($this->conn, $mobilPegawai);
        $emailPegawai = $this->esc_str($this->conn, $emailPegawai);
        $hirarkiPegawai = $this->esc_str($this->conn, $hirarkiPegawai);
        $idInstansi = $this->esc_str($this->conn, $idInstansi);
        $jabatanPegawai = $this->esc_str($this->conn, $jabatanPegawai);
        $tempatlahirPegawai = $this->esc_str($this->conn, $tempatlahirPegawai);
        $tanggallahirPegawai = $this->esc_str($this->conn, $tanggallahirPegawai);
        $jeniskelaminPegawai = $this->esc_str($this->conn, $jeniskelaminPegawai);
        $alamatkantorPegawai = $this->esc_str($this->conn, $alamatkantorPegawai);
        $alamatPegawai = $this->esc_str($this->conn, $alamatPegawai);
        $agamaPegawai = $this->esc_str($this->conn, $agamaPegawai);
        $telponPegawai = $this->esc_str($this->conn, $telponPegawai);
        $statuspernikahanPegawai = $this->esc_str($this->conn, $statuspernikahanPegawai);
        $unitkerjaPegawai = $this->esc_str($this->conn, $unitkerjaPegawai);
        $provinsiPegawai = $this->esc_str($this->conn, $provinsiPegawai);
        $kabupatenPegawai = $this->esc_str($this->conn, $kabupatenPegawai);
        $kecamatanPegawai = $this->esc_str($this->conn, $kecamatanPegawai);
        $kelurahanPegawai = $this->esc_str($this->conn, $kelurahanPegawai);

        $sql = "UPDATE \"".$this->table."\" SET \"namaPegawai\"='$namaPegawai', \"mobilPegawai\"='$mobilPegawai', \"hirarkiPegawai\"='$hirarkiPegawai', \"idInstansi\"='$idInstansi', \"jabatanPegawai\"='$jabatanPegawai', \"tempatlahirPegawai\"='$tempatlahirPegawai', \"tanggallahirPegawai\"=";
        $sql.= $tanggallahirPegawai == '' ? 'null' : $tanggallahirPegawai;
        $sql.= ", \"alamatPegawai\"='$alamatPegawai', \"alamatkantorPegawai\"='$alamatkantorPegawai', \"telponPegawai\"='$telponPegawai', \"statuspernikahanPegawai\"='$statuspernikahanPegawai', \"unitkerjaPegawai\"='$unitkerjaPegawai', \"provinsiPegawai\"='$provinsiPegawai', \"kabupatenPegawai\"='$kabupatenPegawai', \"kecamatanPegawai\"='$kecamatanPegawai', \"kelurahanPegawai\"='$kelurahanPegawai', \"jeniskelaminPegawai\"='$jeniskelaminPegawai' WHERE \"idPegawai\"='$idPegawai'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idPegawai)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idPegawai\"='$idPegawai'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }
}
