<?php

namespace App\Bank\Controller;

use App\Bank\Model\Bank;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BankController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Bank();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idBank = uniqid('bnk');
        $namaBank = $request->request->get('namaBank');

        $create = $this->model->create($idBank, $namaBank);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idBank = $request->attributes->get('id');

        $detail = $this->model->selectOne($idBank);

        return new JsonResponse($detail);
    }

    public function update(Request $request)
    {
        $idBank = $request->attributes->get('id');
        $namaBank = $request->request->get('namaBank');

        $update = $this->model->update($idBank, $namaBank);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idBank = $request->attributes->get('id');

        $delete = $this->model->delete($idBank);

        return new JsonResponse($delete);
    }
}
