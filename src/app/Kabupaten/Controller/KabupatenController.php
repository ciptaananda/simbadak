<?php

namespace App\Kabupaten\Controller;

use App\Kabupaten\Model\Kabupaten;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KabupatenController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Kabupaten();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKabupaten = $request->request->get('idKabupaten');
        $nama = $request->request->get('nama');
        $idProvinsi = $request->request->get('idProvinsi');

        $create = $this->model->create($idKabupaten, $nama, $idProvinsi);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idKabupaten = $request->attributes->get('id');

        $data = $this->model->selectOne($idKabupaten);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idKabupaten = $request->attributes->get('id');
        $nama = $request->request->get('nama');
        $idProvinsi = $request->request->get('idProvinsi');

        $update = $this->model->update($idKabupaten, $nama, $idProvinsi);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idKabupaten = $request->attributes->get('id');

        $delete = $this->model->delete($idKabupaten);

        return new JsonResponse($delete);
    }
}
