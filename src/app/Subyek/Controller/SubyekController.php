<?php

namespace App\Subyek\Controller;

use App\Subyek\Model\Subyek;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SubyekController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Subyek();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idSubyek = uniqid('sby');
        $namaSubyek = $request->request->get('namaSubyek');
        $definisiSubyek = $request->request->get('definisiSubyek');

        $create = $this->model->create($idSubyek, $namaSubyek, $definisiSubyek);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idSubyek = $request->attributes->get('id');

        $data = $this->model->selectOne($idSubyek);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idSubyek = $request->attributes->get('id');
        $namaSubyek = $request->request->get('namaSubyek');
        $definisiSubyek = $request->request->get('definisiSubyek');

        $update = $this->model->update($idSubyek, $namaSubyek, $definisiSubyek);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idSubyek = $request->attributes->get('id');

        $delete = $this->model->delete($idSubyek);

        return new JsonResponse($delete);
    }
}
