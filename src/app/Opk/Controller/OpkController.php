<?php

namespace App\Opk\Controller;

use App\Opk\Model\Opk;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OpkController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Opk();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idOpk = uniqid('opk');
        $namaOpk = $request->request->get('namaOpk');
        $definisiOpk = $request->request->get('definisiOpk');

        $create = $this->model->create($idOpk, $namaOpk, $definisiOpk);

        return new JsonResponse($create);
    }

    public function update(Request $request)
    {
        $idOpk = $request->attributes->get('id');
        $namaOpk = $request->request->get('namaOpk');
        $definisiOpk = $request->request->get('definisiOpk');

        $update = $this->model->update($idOpk, $namaOpk, $definisiOpk);

        return new JsonResponse($update);
    }

    public function detail(Request $request)
    {
        $idOpk = $request->attributes->get('id');

        $data = $this->model->selectOne($idOpk);

        return new JsonResponse($data);
    }

    public function delete(Request $request)
    {
        $idOpk = $request->attributes->get('id');

        $delete = $this->model->delete($idOpk);

        return new JsonResponse($delete);
    }
}
