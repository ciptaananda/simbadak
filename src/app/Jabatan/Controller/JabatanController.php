<?php

namespace App\Jabatan\Controller;

use App\Jabatan\Model\Jabatan;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JabatanController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Jabatan();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idJabatan = uniqid('jbt');
        $namaJabatan = $request->request->get('namaJabatan');

        $create = $this->model->create($idJabatan, $namaJabatan);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idJabatan = $request->attributes->get('id');

        $data = $this->model->selectOne($idJabatan);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idJabatan = $request->attributes->get('id');
        $namaJabatan = $request->request->get('namaJabatan');

        $update = $this->model->update($idJabatan, $namaJabatan);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idJabatan = $request->attributes->get('id');

        $delete = $this->model->delete($idJabatan);

        return new JsonResponse($delete);
    }
}
