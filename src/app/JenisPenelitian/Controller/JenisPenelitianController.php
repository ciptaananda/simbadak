<?php

namespace App\JenisPenelitian\Controller;

use App\JenisPenelitian\Model\JenisPenelitian;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JenisPenelitianController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new JenisPenelitian();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idJenispenelitian = uniqid('jpl');
        $namaJenispenelitian = $request->request->get('namaJenispenelitian');

        $create = $this->model->create($idJenispenelitian, $namaJenispenelitian);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idJenispenelitian = $request->attributes->get('id');

        $data = $this->model->selectOne($idJenispenelitian);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idJenispenelitian = $request->attributes->get('id');
        $namaJenispenelitian = $request->request->get('namaJenispenelitian');

        $update = $this->model->update($idJenispenelitian, $namaJenispenelitian);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idJenispenelitian = $request->attributes->get('id');

        $delete = $this->model->delete($idJenispenelitian);

        return new JsonResponse($delete);
    }
}
