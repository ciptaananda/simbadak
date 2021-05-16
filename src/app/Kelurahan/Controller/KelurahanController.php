<?php

namespace App\Kelurahan\Controller;

use App\Kelurahan\Model\Kelurahan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KelurahanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Kelurahan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKelurahan = $request->request->get('idKelurahan');
        $nama = $request->request->get('nama');
        $idKecamatan = $request->request->get('idKecamatan');

        $create = $this->model->create($idKelurahan, $nama, $idKecamatan);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idKelurahan = $request->attributes->get('id');

        $data = $this->model->selectOne($idKelurahan);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idKelurahan = $request->attributes->get('id');
        $nama = $request->request->get('nama');
        $idKecamatan = $request->request->get('idKecamatan');

        $update = $this->model->update($idKelurahan, $nama, $idKecamatan);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idKelurahan = $request->attributes->get('id');

        $delete = $this->model->delete($idKelurahan);

        return new JsonResponse($delete);
    }
}
