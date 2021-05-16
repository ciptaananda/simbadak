<?php

namespace App\Pekerjaan\Controller;

use App\Pekerjaan\Model\Pekerjaan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PekerjaanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Pekerjaan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idPekerjaan = uniqid('pkj');
        $namaPekerjaan = $request->request->get('namaPekerjaan');

        $create = $this->model->create($idPekerjaan, $namaPekerjaan);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idPekerjaan = $request->attributes->get('id');

        $data = $this->model->selectOne($idPekerjaan);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idPekerjaan = $request->attributes->get('id');
        $namaPekerjaan = $request->request->get('namaPekerjaan');

        $update = $this->model->update($idPekerjaan, $namaPekerjaan);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idPekerjaan = $request->attributes->get('id');

        $delete = $this->model->delete($idPekerjaan);

        return new JsonResponse($delete);
    }
}
