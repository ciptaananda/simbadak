<?php

namespace App\Pendidikan\Controller;

use App\Pendidikan\Model\Pendidikan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PendidikanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Pendidikan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idPendidikan = uniqid('pdd');
        $namaPendidikan = $request->request->get('namaPendidikan');

        $create = $this->model->create($idPendidikan, $namaPendidikan);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idPendidikan = $request->attributes->get('id');

        $data = $this->model->selectOne($idPendidikan);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idPendidikan = $request->attributes->get('id');
        $namaPendidikan = $request->request->get('namaPendidikan');

        $update = $this->model->update($idPendidikan, $namaPendidikan);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idPendidikan = $request->attributes->get('id');

        $delete = $this->model->delete($idPendidikan);

        return new JsonResponse($delete);
    }
}
