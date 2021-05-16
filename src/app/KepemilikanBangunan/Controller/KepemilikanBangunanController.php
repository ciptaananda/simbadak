<?php

namespace App\KepemilikanBangunan\Controller;

use App\KepemilikanBangunan\Model\KepemilikanBangunan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KepemilikanBangunanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new KepemilikanBangunan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKepemilikanbangunan = uniqid('kpb');
        $namaKepemilikanbangunan = $request->request->get('namaKepemilikanbangunan');

        $create = $this->model->create($idKepemilikanbangunan, $namaKepemilikanbangunan);

        return new JsonResponse($create);
    }

    public function update(Request $request)
    {
        $idKepemilikanbangunan = $request->attributes->get('id');
        $namaKepemilikanbangunan = $request->request->get('namaKepemilikanbangunan');

        $update = $this->model->update($idKepemilikanbangunan, $namaKepemilikanbangunan);

        return new JsonResponse($update);
    }

    public function detail(Request $request)
    {
        $idKepemilikanbangunan = $request->attributes->get('id');

        $detail = $this->model->selectOne($idKepemilikanbangunan);

        return new JsonResponse($detail);
    }

    public function delete(Request $request)
    {
        $idKepemilikanbangunan = $request->attributes->get('id');

        $delete = $this->model->delete($idKepemilikanbangunan);

        return new JsonResponse($delete);
    }
}
