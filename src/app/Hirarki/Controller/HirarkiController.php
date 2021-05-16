<?php

namespace App\Hirarki\Controller;

use App\Hirarki\Model\Hirarki;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HirarkiController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Hirarki();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idHirarki = uniqid('hrk');
        $namaHirarki = $request->request->get('namaHirarki');

        $create = $this->model->create($idHirarki, $namaHirarki);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idHirarki = $request->attributes->get('id');

        $data = $this->model->selectOne($idHirarki);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idHirarki = $request->attributes->get('id');
        $namaHirarki = $request->request->get('namaHirarki');

        $update = $this->model->update($idHirarki, $namaHirarki);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idHirarki = $request->attributes->get('id');

        $delete = $this->model->delete($idHirarki);

        return new JsonResponse($delete);
    }
}
