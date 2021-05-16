<?php

namespace App\Instansi\Controller;

use App\Instansi\Model\Instansi;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InstansiController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Instansi();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idInstansi = uniqid('ins');
        $namaInstansi = $request->request->get('namaInstansi');
        $alamatInstansi = $request->request->get('alamatInstansi');
        $telponInstansi = $request->request->get('telponInstansi');
        $emailInstansi = $request->request->get('emailInstansi');
        $websiteInstansi = $request->request->get('websiteInstansi');
        $sosmedInstansi = $request->request->get('sosmedInstansi');
        $hirarkiInstansi = $request->request->get('hirarkiInstansi');

        $create = $this->model->create($idInstansi, $namaInstansi, $alamatInstansi, $telponInstansi, $emailInstansi, $websiteInstansi, $sosmedInstansi, $hirarkiInstansi);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idInstansi = $request->attributes->get('id');

        $data = $this->model->selectOne($idInstansi);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idInstansi = $request->attributes->get('id');
        $namaInstansi = $request->request->get('namaInstansi');
        $alamatInstansi = $request->request->get('alamatInstansi');
        $telponInstansi = $request->request->get('telponInstansi');
        $emailInstansi = $request->request->get('emailInstansi');
        $websiteInstansi = $request->request->get('websiteInstansi');
        $sosmedInstansi = $request->request->get('sosmedInstansi');
        $hirarkiInstansi = $request->request->get('hirarkiInstansi');

        $update = $this->model->update($idInstansi, $namaInstansi, $alamatInstansi, $telponInstansi, $emailInstansi, $websiteInstansi, $sosmedInstansi, $hirarkiInstansi);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idInstansi = $request->attributes->get('id');

        $delete = $this->model->delete($idInstansi);

        return new JsonResponse($delete);
    }
}
