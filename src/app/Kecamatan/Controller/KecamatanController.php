<?php

namespace App\Kecamatan\Controller;

use App\Kecamatan\Model\Kecamatan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KecamatanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Kecamatan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKecamatan = $request->request->get('idKecamatan');
        $nama = $request->request->get('nama');
        $idKabupaten = $request->request->get('idKabupaten');

        $create = $this->model->create($idKecamatan, $nama, $idKabupaten);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idKecamatan = $request->attributes->get('id');

        $data = $this->model->selectOne($idKecamatan);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idKecamatan = $request->attributes->get('id');
        $nama = $request->request->get('nama');
        $idKabupaten = $request->request->get('idKabupaten');

        $update = $this->model->update($idKecamatan, $nama, $idKabupaten);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idKecamatan = $request->attributes->get('id');

        $delete = $this->model->delete($idKecamatan);

        return new JsonResponse($delete);
    }
}
