<?php

namespace App\PenelitianKegiatan\Model;

use Core\GlobalFunc;

class PenelitianKegiatan extends GlobalFunc
{
    private $table = 'penelitianKegiatan';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function selectAll()
    {
        $sql = "SELECT \"penelitianKegiatan\".*, \"provinsi\".*, \"kabupaten\".*, \"kecamatan\".*, \"kelurahan\".*, \"jenisPenelitian\".* FROM \"".$this->table."\" 
                LEFT JOIN \"provinsi\" ON \"penelitianKegiatan\".\"provinsiKegiatan\" = \"provinsi\".\"idProvinsi\"
                LEFT JOIN \"kabupaten\" ON \"penelitianKegiatan\".\"kabupatenKegiatan\" = \"kabupaten\".\"idKabupaten\"
                LEFT JOIN \"kecamatan\" ON \"penelitianKegiatan\".\"kecamatanKegiatan\" = \"kecamatan\".\"idKecamatan\"
                LEFT JOIN \"kelurahan\" ON \"penelitianKegiatan\".\"kelurahanKegiatan\" = \"kelurahan\".\"idKelurahan\"
                LEFT JOIN \"jenisPenelitian\" ON \"penelitianKegiatan\".\"idJenispenelitian\" = \"jenisPenelitian\".\"idJenispenelitian\"";
        $query = pg_query($this->conn, $sql);
        $datas = [];
        while ($item = pg_fetch_assoc($query)) {
            array_push($datas, $item);
        }

        $sqlGroupopk = "SELECT \"groupOpk\".*, \"penelitianKegiatan\".\"idPenelitiankegiatan\", \"opk\".* FROM \"groupOpk\" INNER JOIN \"penelitianKegiatan\" ON \"groupOpk\".\"idPenelitian\" = \"penelitianKegiatan\".\"idPenelitiankegiatan\" LEFT JOIN \"opk\" ON \"groupOpk\".\"idOpk\" = \"opk\".\"idOpk\"";
        
        $dataOpk = [];
        $query = pg_query($this->conn, $sqlGroupopk);
        while ($item = pg_fetch_assoc($query)) {
            array_push($dataOpk, $item);
        }
        
        $datahasil = [];
        
        foreach($datas as $key => $value){
            array_push($datahasil, $value);
            $datahasil[$key]['groupOpk'] = [];

            foreach($dataOpk as $keyOpk => $valueOpk){
                if ($datas[$key]['idPenelitiankegiatan'] == $dataOpk[$keyOpk]['idPenelitian']){
                array_push($datahasil[$key]['groupOpk'], array(
                    "idGroupopk" => $valueOpk['idGroupopk'],
                    "idOpk" => $valueOpk['idOpk'],
                    "namaOpk" => $valueOpk['namaOpk'],
                    "definisiOpk" => $valueOpk['definisiOpk'],
                    "dateCreate" => $valueOpk['dateCreate']
                ));
                }
            }

            $datahasil[$key]['provinsi'] = array(
                "idProvinsi" => $value['idProvinsi'],
                "namaProvinsi" => $value['namaProvinsi'],
                "dateCreate" => $value['dateCreate']
            );

            $datahasil[$key]['kabupaten'] = array(
                "idKabupaten" => $value['idKabupaten'],
                "namaKabupaten" => $value['namaKabupaten'],
                "dateCreate" => $value['dateCreate']
            );

            $datahasil[$key]['kecamatan'] = array(
                "idKecamatan" => $value['idKecamatan'],
                "namaKecamatan" => $value['namaKecamatan'],
                "dateCreate" => $value['dateCreate']
            );

            $datahasil[$key]['kelurahan'] = array(
                "idKelurahan" => $value['idKelurahan'],
                "namaKelurahan" => $value['namaKelurahan'],
                "dateCreate" => $value['dateCreate']
            );

            $datahasil[$key]['jenisPenelitian'] = array(
                "idJenispenelitian" => $value['idJenispenelitian'],
                "namaJenispenelitian" => $value['namaJenispenelitian'],
                "dateCreate" => $value['dateCreate']
            );
        }
        return $datahasil;
    }

    public function selectOne($id)
    {
        $sql = "SELECT \"penelitianKegiatan\".*, \"provinsi\".nama AS namaProvinsi, \"Kelurahan\".nama AS namaKabupaten, \"kecamatan\".nama AS namaKecamatan, \"kelurahan\".nama AS namaKelurahan, \"jenisPenelitian\".\"namaJenispenelitian\" FROM \"".$this->table."\" 
                LEFT JOIN \"provinsi\" ON \"penelitianKegiatan\".\"provinsiKegiatan\" = \"provinsi\".\"idProvinsi\"
                LEFT JOIN \"kabupaten\" ON \"penelitianKegiatan\".\"kabupatenKegiatan\" = \"kabupaten\".\"idKabupaten\"
                LEFT JOIN \"kecamatan\" ON \"penelitianKegiatan\".\"kecamatanKegiatan\" = \"kecamatan\".\"idKecamatan\"
                LEFT JOIN \"kelurahan\" ON \"penelitianKegiatan\".\"kelurahanKegiatan\" = \"kelurahan\".\"idKelurahan\"
                LEFT JOIN \"jenisPenelitian\" ON \"penelitianKegiatan\".\"idJenispenelitian\" = \"jenisPenelitian\".\"idJenispenelitian\"
                WHERE \"idPenelitiankegiatan\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $data = pg_fetch_assoc($query);

        return $data;
    }

    public function create($data)
    {
        $idPenelitiankegiatan = $this->esc_str($this->conn, $data['idPenelitianKegiatan']);
        $namaKegiatan = $this->esc_str($this->conn, $data['namaKegiatan']);
        $abstrakKegiatan = $this->esc_str($this->conn, $data['abstrakKegiatan']);
        $nomorsuratKegiatan = $this->esc_str($this->conn, $data['nomorsuratKegiatan']);
        $tanggalsuratKegiatan = $this->esc_str($this->conn, $data['tanggalsuratKegiatan']);
        $alamatKegiatan = $this->esc_str($this->conn, $data['alamatKegiatan']);
        $provinsiKegiatan = $this->esc_str($this->conn, $data['provinsiKegiatan']);
        $kabupatenKegiatan = $this->esc_str($this->conn, $data['kabupatenKegiatan']);
        $kecamatanKegiatan = $this->esc_str($this->conn, $data['kecamatanKegiatan']);
        $kelurahanKegiatan = $this->esc_str($this->conn, $data['kelurahanKegiatan']);
        $jenislaporanKegiatan = $this->esc_str($this->conn, $data['jenislaporanKegiatan']);
        $jenisvideoPelaporan = $this->esc_str($this->conn, $data['jenisvideoPelaporan']);
        $jenisfotoPelaporan = $this->esc_str($this->conn, $data['jenisfotoPelaporan']);
        $idJenispenelitian = $this->esc_str($this->conn, $data['idJenispenelitian']);
        $nikEksternal = $this->esc_str($this->conn, $data['nikEksternal']);
        $status = $this->esc_str($this->conn, $data['status']);
        $opk = $data['opk'];
        $dateCreate = date('Y-m-d');


        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$idPenelitiankegiatan', '$namaKegiatan', '$abstrakKegiatan', '$nomorsuratKegiatan', '$tanggalsuratKegiatan', '$alamatKegiatan', '$provinsiKegiatan', '$kabupatenKegiatan', '$kecamatanKegiatan', '$kelurahanKegiatan', '$jenislaporanKegiatan', '$jenisvideoPelaporan', '$jenisfotoPelaporan', '$dateCreate', '$idJenispenelitian', '$nikEksternal', '$status')";
        
        for ($i = 0; $i < sizeof($opk); $i++){
            $idGroupopk = uniqid("go");
            $idOpk = $opk[$i];
            
            $sqlGroupOpk = "INSERT INTO \"groupOpk\" VALUES ('$idGroupopk', '$idOpk', '$idPenelitiankegiatan', '$dateCreate')";

            $queryGroupopk = pg_query($sqlGroupOpk);
        }

        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function update($idPenelitiankegiatan, $data)
    {
        $namaKegiatan = $this->esc_str($this->conn, $data['namaKegiatan']);
        $abstrakKegiatan = $this->esc_str($this->conn, $data['abstrakKegiatan']);
        $nomorsuratKegiatan = $this->esc_str($this->conn, $data['nomorsuratKegiatan']);
        $tanggalsuratKegiatan = $this->esc_str($this->conn, $data['tanggalsuratKegiatan']);
        $alamatKegiatan = $this->esc_str($this->conn, $data['alamatKegiatan']);
        $provinsiKegiatan = $this->esc_str($this->conn, $data['provinsiKegiatan']);
        $kabupatenKegiatan = $this->esc_str($this->conn, $data['kabupatenKegiatan']);
        $kecamatanKegiatan = $this->esc_str($this->conn, $data['kecamatanKegiatan']);
        $kelurahanKegiatan = $this->esc_str($this->conn, $data['kelurahanKegiatan']);
        $jenislaporanKegiatan = $this->esc_str($this->conn, $data['jenislaporanKegiatan']);
        $jenisvideoPelaporan = $this->esc_str($this->conn, $data['jenisvideoPelaporan']);
        $jenisfotoPelaporan = $this->esc_str($this->conn, $data['jenisfotoPelaporan']);
        $idJenispenelitian = $this->esc_str($this->conn, $data['idJenispenelitian']);
        $nikEksternal = $this->esc_str($this->conn, $data['nikEksternal']);
        $status = $this->esc_str($this->conn, $data['status']);
        $dateCreate = date('Y-m-d');

        $sql = "UPDATE \"".$this->table."\" SET \"namaKegiatan\"='$namaKegiatan', \"abstrakKegiatan\"='$abstrakKegiatan', \"nomorsuratKegiatan\"='$nomorsuratKegiatan', \"tanggalsuratKegiatan\"='$tanggalsuratKegiatan', \"alamatKegiatan\"='$alamatKegiatan', \"provinsiKegiatan\"='$provinsiKegiatan', \"kabupatenKegiatan\" = '$kabupatenKegiatan', \"kecamatanKegiatan\" = '$kecamatanKegiatan', \"kelurahanKegiatan\" = '$kelurahanKegiatan', \"jenislaporanKegiatan\" = '$jenislaporanKegiatan', \"jenisvideoPelaporan\" = '$jenisvideoPelaporan', \"jenisfotoPelaporan\" = '$jenisfotoPelaporan', \"dateCreate\" = '$dateCreate', \"idJenispenelitian\" = '$idJenispenelitian', \"nikEksternal\" = '$nikEksternal', \"status\" = '$status' WHERE \"idPenelitiankegiatan\" = '$idPenelitiankegiatan'";
        
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

    public function delete($idPenelitianKegiatan)
    {
        $sql = "DELETE FROM \"".$this->table."\" WHERE \"idPenelitiankegiatan\"='$idPenelitianKegiatan'";
        $query = pg_query($sql);

        return pg_affected_rows($query);
    }

}
