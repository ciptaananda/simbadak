<?php

namespace App\SpesifikasiKeahlian\Controller;

use App\SpesifikasiKeahlian\Model\SpesifikasiKeahlian;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SpesifikasiKeahlianController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new SpesifikasiKeahlian();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idSpesifikasikeahlian = uniqid('spk');
        $namaSpesifikasikeahlian = $request->request->get('namaSpesifikasikeahlian');

        $create = $this->model->create($idSpesifikasikeahlian, $namaSpesifikasikeahlian);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idSpesifikasikeahlian = $request->attributes->get('id');

        $data = $this->model->selectOne($idSpesifikasikeahlian);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idSpesifikasikeahlian = $request->attributes->get('id');
        $namaSpesifikasikeahlian = $request->request->get('namaSpesifikasikeahlian');

        $update = $this->model->update($idSpesifikasikeahlian, $namaSpesifikasikeahlian);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idSpesifikasikeahlian = $request->attributes->get('id');

        $delete = $this->model->delete($idSpesifikasikeahlian);

        return new JsonResponse($delete);
    }
}
