<?php

namespace App\KondisiKaryabudaya\Controller;

use App\KondisiKaryabudaya\Model\KondisiKaryabudaya;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class KondisiKaryabudayaController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new KondisiKaryabudaya();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idKondisikaryabudaya = uniqid('kpb');
        $namaKondisikaryabudaya = $request->request->get('namaKondisikaryabudaya');

        $create = $this->model->create($idKondisikaryabudaya, $namaKondisikaryabudaya);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idKondisikaryabudaya = $request->attributes->get('id');

        $data = $this->model->selectOne($idKondisikaryabudaya);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idKondisikaryabudaya = $request->attributes->get('id');
        $namaKondisikaryabudaya = $request->request->get('namaKondisikaryabudaya');

        $update = $this->model->update($idKondisikaryabudaya, $namaKondisikaryabudaya);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idKondisikaryabudaya = $request->attributes->get('id');

        $delete = $this->model->delete($idKondisikaryabudaya);

        return new JsonResponse($delete);
    }
}
