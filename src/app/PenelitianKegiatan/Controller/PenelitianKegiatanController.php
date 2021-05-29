<?php

namespace App\PenelitianKegiatan\Controller;

use App\PenelitianKegiatan\Model\PenelitianKegiatan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PenelitianKegiatanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new PenelitianKegiatan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idPenelitianKegiatan = uniqid('penKeg');

        $namaKegiatan = $request->request->get('namaKegiatan');
        $abstrakKegiatan = $request->request->get('abstrakKegiatan');
        $nomorsuratKegiatan = $request->request->get('nomorsuratKegiatan');
        $tanggalsuratKegiatan = $request->request->get('tanggalsuratKegiatan');
        $alamatKegiatan = $request->request->get('alamatKegiatan');
        $provinsiKegiatan = $request->request->get('provinsiKegiatan');
        $kabupatenKegiatan = $request->request->get('kabupatenKegiatan');
        $kecamatanKegiatan = $request->request->get('kecamatanKegiatan');
        $kelurahanKegiatan = $request->request->get('kelurahanKegiatan');
        $jenislaporanKegiatan = $request->request->get('jenislaporanKegiatan');
        $jenisvideoPelaporan = $request->request->get('jenisvideoPelaporan');
        $jenisfotoPelaporan = $request->request->get('jenisfotoPelaporan');
        $idJenispenelitian = $request->request->get('idJenisPenelitian');
        $nikEksternal = $request->request->get('nikEksternal');
        $status = $request->request->get('status');
        $opk = explode(',', $request->request->get('opk'));
        

        $penelitian_kegiatan_arr = array(
            "idPenelitianKegiatan" => $idPenelitianKegiatan,
            "namaKegiatan" => $namaKegiatan,
            "abstrakKegiatan" => $abstrakKegiatan,
            "nomorsuratKegiatan" => $nomorsuratKegiatan,
            "tanggalsuratKegiatan" => $tanggalsuratKegiatan,
            "alamatKegiatan" => $alamatKegiatan,
            "provinsiKegiatan" => $provinsiKegiatan,
            "kabupatenKegiatan" => $kabupatenKegiatan,
            "kecamatanKegiatan" => $kecamatanKegiatan,
            "kelurahanKegiatan" => $kelurahanKegiatan,
            "jenislaporanKegiatan" => $jenislaporanKegiatan,
            "jenisvideoPelaporan" => $jenisvideoPelaporan,
            "jenisfotoPelaporan" => $jenisfotoPelaporan,
            "idJenispenelitian" => $idJenispenelitian,
            "nikEksternal" => $nikEksternal,
            "status" => $status,
            "opk" => $opk
        );

        $create = $this->model->create($penelitian_kegiatan_arr);

        return new JsonResponse($create);
    }

    public function update(Request $request)
    {
        $idPenelitianKegiatan = $request->attributes->get('id');

        $namaKegiatan = $request->request->get('namaKegiatan');
        $abstrakKegiatan = $request->request->get('abstrakKegiatan');
        $nomorsuratKegiatan = $request->request->get('nomorsuratKegiatan');
        $tanggalsuratKegiatan = $request->request->get('tanggalsuratKegiatan');
        $alamatKegiatan = $request->request->get('alamatKegiatan');
        $provinsiKegiatan = $request->request->get('provinsiKegiatan');
        $kabupatenKegiatan = $request->request->get('kabupatenKegiatan');
        $kecamatanKegiatan = $request->request->get('kecamatanKegiatan');
        $kelurahanKegiatan = $request->request->get('kelurahanKegiatan');
        $jenislaporanKegiatan = $request->request->get('jenislaporanKegiatan');
        $jenisvideoPelaporan = $request->request->get('jenisvideoPelaporan');
        $jenisfotoPelaporan = $request->request->get('jenisfotoPelaporan');
        $idJenispenelitian = $request->request->get('idJenisPenelitian');
        $nikEksternal = $request->request->get('nikEksternal');
        $status = $request->request->get('status');

        $penelitian_kegiatan_arr = array(
            "namaKegiatan" => $namaKegiatan,
            "abstrakKegiatan" => $abstrakKegiatan,
            "nomorsuratKegiatan" => $nomorsuratKegiatan,
            "tanggalsuratKegiatan" => $tanggalsuratKegiatan,
            "alamatKegiatan" => $alamatKegiatan,
            "provinsiKegiatan" => $provinsiKegiatan,
            "kabupatenKegiatan" => $kabupatenKegiatan,
            "kecamatanKegiatan" => $kecamatanKegiatan,
            "kelurahanKegiatan" => $kelurahanKegiatan,
            "jenislaporanKegiatan" => $jenislaporanKegiatan,
            "jenisvideoPelaporan" => $jenisvideoPelaporan,
            "jenisfotoPelaporan" => $jenisfotoPelaporan,
            "idJenispenelitian" => $idJenispenelitian,
            "nikEksternal" => $nikEksternal,
            "status" => $status
        );
        $update = $this->model->update($idPenelitianKegiatan, $penelitian_kegiatan_arr);

        return new JsonResponse($update);
    }

    public function readOne(Request $request)
    {
        $idPenelitiankegiatan = $request->attributes->get('id');

        $data = $this->model->selectOne($idPenelitiankegiatan);

        return new JsonResponse($data);
    }

    public function delete(Request $request)
    {
        $idPenelitiankegiatan = $request->attributes->get('id');

        $delete = $this->model->delete($idPenelitiankegiatan);

        return new JsonResponse($delete);
    }
}
