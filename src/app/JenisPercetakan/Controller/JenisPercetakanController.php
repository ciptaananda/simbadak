<?php

namespace App\JenisPercetakan\Controller;

use App\JenisPercetakan\Model\JenisPercetakan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JenisPercetakanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new JenisPercetakan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idJenispercetakan = uniqid('jpt');
        $namaJenispercetakan = $request->request->get('namaJenispercetakan');

        $create = $this->model->create($idJenispercetakan, $namaJenispercetakan);

        return new JsonResponse($create);
    }

    public function update(Request $request)
    {
        $idJenispercetakan = $request->attributes->get('id');
        $namaJenispercetakan = $request->request->get('namaJenispercetakan');

        $update = $this->model->update($idJenispercetakan, $namaJenispercetakan);

        return new JsonResponse($update);
    }

    public function detail(Request $request)
    {
        $idJenispercetakan = $request->attributes->get('id');

        $data = $this->model->selectOne($idJenispercetakan);

        return new JsonResponse($data);
    }

    public function delete(Request $request)
    {
        $idJenispercetakan = $request->attributes->get('id');

        $delete = $this->model->delete($idJenispercetakan);

        return new JsonResponse($delete);
    }
}
