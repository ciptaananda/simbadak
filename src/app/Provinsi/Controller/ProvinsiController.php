<?php

namespace App\Provinsi\Controller;

use App\Provinsi\Model\Provinsi;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProvinsiController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Provinsi();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idProvinsi = $request->request->get('idProvinsi');
        $nama = $request->request->get('nama');

        $create = $this->model->create($idProvinsi, $nama);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idProvinsi = $request->attributes->get('id');

        $data = $this->model->selectOne($idProvinsi);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idProvinsi = $request->attributes->get('id');
        $nama = $request->request->get('nama');

        $update = $this->model->update($idProvinsi, $nama);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idProvinsi = $request->attributes->get('id');

        $delete = $this->model->delete($idProvinsi);

        return new JsonResponse($delete);
    }
}
