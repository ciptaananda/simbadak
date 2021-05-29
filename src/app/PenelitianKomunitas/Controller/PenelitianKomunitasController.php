<?php

namespace App\PenelitianKomunitas\Controller;

use App\PenelitianKomunitas\Model\PenelitianKomunitas;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PenelitianKomunitasController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new PenelitianKomunitas();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKomunitas = uniqid('penKom');

        $namaKomunitas = $request->request->get('namaKomunitas');
        $pimpinanKomunitas = $request->request->get('pimpinanKomunitas');
        $logoKomunitas = $request->request->get('logoKomunitas');
        $tahunKomunitas = $request->request->get('tahunKomunitas');
        $sotkKomunitas = $request->request->get('sotkKomunitas');
        $norekbankKomunitas = $request->request->get('norekbankKomunitas');
        $anbankKomunitas = $request->request->get('anbankKomunitas');
        $bankKomunitas = $request->request->get('bankKomunitas');
        $npwpKomunitas = $request->request->get('npwpKomunitas');
        $akteKomunitas = $request->request->get('akteKomunitas');
        $kontakKomunitas = $request->request->get('kontakKomunitas');
        $alamatKomunitas = $request->request->get('alamatKomunitas');
        $bangunanKomunitas = $request->request->get('bangunanKomunitas');
        $deskripsiopkKomunitas = $request->request->get('deskripsiopkKomunitas');
        $deskripsialatKomunitas = $request->request->get('deskripsialatKomunitas');
        $provinsiKomunitas = $request->request->get('provinsiKomunitas');
        $kabupatenKomunitas = $request->request->get('kabupatenKomunitas');
        $kecamatanKomunitas = $request->request->get('kecamatanKomunitas');
        $kelurahanKomunitas = $request->request->get('kelurahanKomunitas');
        $idJenispenelitian = $request->request->get('idJenispenelitian');
        $nikEksternal = $request->request->get('nikEksternal');
        $status = $request->request->get('status');
        $opk = explode(',', $request->request->get('opk'));
        

        $penelitian_komunitas_arr = array(
            "idKomunitas" => $idKomunitas,
            "namaKomunitas" => $namaKomunitas,
            "pimpinanKomunitas" => $pimpinanKomunitas,
            "logoKomunitas" => $logoKomunitas,
            "tahunKomunitas" => $tahunKomunitas,
            "sotkKomunitas" => $sotkKomunitas,
            "norekbankKomunitas" => $norekbankKomunitas,
            "anbankKomunitas" => $anbankKomunitas,
            "bankKomunitas" => $bankKomunitas,
            "npwpKomunitas" => $npwpKomunitas,
            "akteKomunitas" => $akteKomunitas,
            "kontakKomunitas" => $kontakKomunitas,
            "alamatKomunitas" => $alamatKomunitas,
            "bangunanKomunitas" => $bangunanKomunitas,
            "deskripsiopkKomunitas" => $deskripsiopkKomunitas,
            "deskripsialatKomunitas" => $deskripsialatKomunitas,
            "provinsiKomunitas" => $provinsiKomunitas,
            "kabupatenKomunitas" => $kabupatenKomunitas,
            "kecamatanKomunitas" => $kecamatanKomunitas,
            "kelurahanKomunitas" => $kelurahanKomunitas,
            "idJenispenelitian" => $idJenispenelitian,
            "nikEkseternal" => $nikEksternal,
            "status" => $status,
            "opk" => $opk
        );

        dump($penelitian_komunitas_arr);
        die();

        $create = $this->model->create($penelitian_komunitas_arr);

        return new JsonResponse($create);
    }

    public function update(Request $request)
    {
        $idKomunitas = $request->attributes->get('id');

        $namaKomunitas = $request->request->get('namaKomunitas');
        $pimpinanKomunitas = $request->request->get('pimpinanKomunitas');
        $logoKomunitas = $request->request->get('logoKomunitas');
        $tahunKomunitas = $request->request->get('tahunKomunitas');
        $sotkKomunitas = $request->request->get('sotkKomunitas');
        $provinsiKomunitas = $request->request->get('provinsiKomunitas');
        $kabupatenKomunitas = $request->request->get('kabupatenKomunitas');
        $kecamatanKomunitas = $request->request->get('kecamatanKomunitas');
        $kelurahanKomunitas = $request->request->get('kelurahanKomunitas');
        $norekbankKomunitas = $request->request->get('norekbankKomunitas');
        $anbankKomunitas = $request->request->get('anbankKomunitas');
        $bankKomunitas = $request->request->get('bankKomunitas');
        $npwpKomunitas = $request->request->get('npwpKomunitas');
        $alamatKomunitas = $request->request->get('alamatKomunitas');
        $status = $request->request->get('status');

        $penelitian_kegiatan_arr = array(
            "namaKomunitas" => $namaKomunitas,
            "pimpinanKomunitas" => $pimpinanKomunitas,
            "logoKomunitas" => $logoKomunitas,
            "tahunKomunitas" => $tahunKomunitas,
            "sotkKomunitas" => $sotkKomunitas,
            "provinsiKomunitas" => $provinsiKomunitas,
            "kabupatenKomunitas" => $kabupatenKomunitas,
            "kecamatanKomunitas" => $kecamatanKomunitas,
            "kelurahanKomunitas" => $kelurahanKomunitas,
            "norekbankKomunitas" => $norekbankKomunitas,
            "anbankKomunitas" => $anbankKomunitas,
            "bankKomunitas" => $bankKomunitas,
            "npwpKomunitas" => $npwpKomunitas,
            "alamatKomunitas" => $alamatKomunitas,
            "status" => $status
        );
        $update = $this->model->update($idKomunitas, $penelitian_kegiatan_arr);

        return new JsonResponse($update);
    }

    public function readOne(Request $request)
    {
        $idKomunitas = $request->attributes->get('id');

        $data = $this->model->selectOne($idKomunitas);

        return new JsonResponse($data);
    }

    public function delete(Request $request)
    {
        $idKomunitas = $request->attributes->get('id');

        $delete = $this->model->delete($idKomunitas);

        return new JsonResponse($delete);
    }
}
