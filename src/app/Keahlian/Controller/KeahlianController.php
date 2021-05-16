<?php

namespace App\Keahlian\Controller;

use App\Keahlian\Model\Keahlian;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KeahlianController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Keahlian();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKeahlian = uniqid('khl');
        $namaKeahlian = $request->request->get('namaKeahlian');

        $create = $this->model->create($idKeahlian, $namaKeahlian);

        return new JsonResponse($create);
    }

    public function update(Request $request)
    {
        $idKeahlian = $request->attributes->get('id');
        $namaKeahlian = $request->request->get('namaKeahlian');

        $update = $this->model->update($idKeahlian, $namaKeahlian);

        return new JsonResponse($update);
    }

    public function detail(Request $request)
    {
        $idKeahlian = $request->attributes->get('id');

        $data = $this->model->selectOne($idKeahlian);

        return new JsonResponse($data);
    }

    public function delete(Request $request)
    {
        $idKeahlian = $request->attributes->get('id');

        $delete = $this->model->delete($idKeahlian);

        return new JsonResponse($delete);
    }
}
