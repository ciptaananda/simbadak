<?php

namespace App\DomainWbtb\Controller;

use App\DomainWbtb\Model\DomainWbtb;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DomainWbtbController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new DomainWbtb();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idDomainwbtb = uniqid('dwb');
        $deskripsiWbtb = $request->request->get('deskripsiWbtb');

        $create = $this->model->create($idDomainwbtb, $deskripsiWbtb);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idDomainwbtb = $request->attributes->get('id');

        $data = $this->model->selectOne($idDomainwbtb);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idDomainwbtb = $request->attributes->get('id');
        $deskripsiWbtb = $request->request->get('deskripsiWbtb');

        $update = $this->model->update($idDomainwbtb, $deskripsiWbtb);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idDomainwbtb = $request->attributes->get('id');

        $delete = $this->model->delete($idDomainwbtb);

        return new JsonResponse($delete);
    }
}
