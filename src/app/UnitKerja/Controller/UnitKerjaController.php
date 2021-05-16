<?php

namespace App\UnitKerja\Controller;

use App\UnitKerja\Model\UnitKerja;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UnitKerjaController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new UnitKerja();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idUnitkerja = uniqid('ukj');
        $namaUnitkerja = $request->request->get('namaUnitkerja');

        $create = $this->model->create($idUnitkerja, $namaUnitkerja);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idUnitkerja = $request->attributes->get('id');

        $data = $this->model->selectOne($idUnitkerja);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idUnitkerja = $request->attributes->get('id');
        $namaUnitkerja = $request->request->get('namaUnitkerja');

        $update = $this->model->update($idUnitkerja, $namaUnitkerja);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idUnitkerja = $request->attributes->get('id');

        $delete = $this->model->delete($idUnitkerja);

        return new JsonResponse($delete);
    }
}
