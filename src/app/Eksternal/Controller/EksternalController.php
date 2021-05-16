<?php

namespace App\Eksternal\Controller;

use App\Eksternal\Model\Eksternal;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EksternalController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Eksternal();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idEksternal = uniqid('idk');
        $namaEksternal = $request->request->get('namaEksternal');
        $idPekerjaan = $request->request->get('idPekerjaan');
        $instansiEksternal = $request->request->get('instansiEksternal');
        $tempatlahirEksternal = $request->request->get('tempatlahirEksternal');
        $tanggallahirEksternal = $request->request->get('tanggallahirEksternal');
        $alamatEksternal = $request->request->get('alamatEksternal');
        $provinsiEksternal = $request->request->get('provinsiEksternal');
        $kabupatenEksternal = $request->request->get('kabupatenEksternal');
        $kecamatanEksternal = $request->request->get('kecamatanEksternal');
        $kelurahanEksternal = $request->request->get('kelurahanEksternal');
        $agamaEksternal = $request->request->get('agamaEksternal');
        $teleponEksternal = $request->request->get('teleponEksternal');
        $mobilEksternal = $request->request->get('mobilEksternal');
        $emailEksternal = $request->request->get('emailEksternal');
        $approvedEksternal = $request->request->get('approvedEksternal');

        $create = $this->model->create($idEksternal, $namaEksternal, $idPekerjaan, $instansiEksternal, $tempatlahirEksternal, $tanggallahirEksternal, $alamatEksternal, $provinsiEksternal, $kabupatenEksternal, $kecamatanEksternal, $kelurahanEksternal, $agamaEksternal, $teleponEksternal, $mobilEksternal, $emailEksternal, $approvedEksternal);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idEksternal = $request->attributes->get('id');

        $data = $this->model->selectOne($idEksternal);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idEksternal = $request->attributes->get('id');
        $namaEksternal = $request->request->get('namaEksternal');
        $idPekerjaan = $request->request->get('idPekerjaan');
        $instansiEksternal = $request->request->get('instansiEksternal');
        $tempatlahirEksternal = $request->request->get('tempatlahirEksternal');
        $tanggallahirEksternal = $request->request->get('tanggallahirEksternal');
        $alamatEksternal = $request->request->get('alamatEksternal');
        $provinsiEksternal = $request->request->get('provinsiEksternal');
        $kabupatenEksternal = $request->request->get('kabupatenEksternal');
        $kecamatanEksternal = $request->request->get('kecamatanEksternal');
        $kelurahanEksternal = $request->request->get('kelurahanEksternal');
        $agamaEksternal = $request->request->get('agamaEksternal');
        $teleponEksternal = $request->request->get('teleponEksternal');
        $mobilEksternal = $request->request->get('mobilEksternal');
        $emailEksternal = $request->request->get('emailEksternal');
        $approvedEksternal = $request->request->get('approvedEksternal');

        $update = $this->model->update($idEksternal, $namaEksternal, $idPekerjaan, $instansiEksternal, $tempatlahirEksternal, $tanggallahirEksternal, $alamatEksternal, $provinsiEksternal, $kabupatenEksternal, $kecamatanEksternal, $kelurahanEksternal, $agamaEksternal, $teleponEksternal, $mobilEksternal, $emailEksternal, $approvedEksternal);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idEksternal = $request->attributes->get('id');

        $delete = $this->model->delete($idEksternal);

        return new JsonResponse($delete);
    }
}
