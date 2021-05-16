<?php

namespace App\Lingkungankeluarga\Controller;

use App\Lingkungankeluarga\Model\Lingkungankeluarga;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LingkungankeluargaController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Lingkungankeluarga();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idLingkungankeluarga = uniqid('lkg');
        $nipPegawai = $request->request->get('nipPegawai');
        $jenisAnggotakeluarga = $request->request->get('jenisAnggotakeluarga');
        $namaAnggotakeluaraga = $request->request->get('namaAnggotakeluaraga');
        $jeniskelaminAnggotakeluarga = $request->request->get('jeniskelaminAnggotakeluarga');
        $tempatlahirAnggotakeluarga = $request->request->get('tempatlahirAnggotakeluarga');
        $tanggallahirAnggotakeluarga = $request->request->get('tanggallahirAnggotakeluarga');
        $pendidikanAnggotakeluarga = $request->request->get('pendidikanAnggotakeluarga');
        $pekerjaanAnggotakeluarga = $request->request->get('pekerjaanAnggotakeluarga');

        $create = $this->model->create($idLingkungankeluarga, $nipPegawai, $jenisAnggotakeluarga, $namaAnggotakeluaraga, $jeniskelaminAnggotakeluarga, $tempatlahirAnggotakeluarga, $tanggallahirAnggotakeluarga, $pendidikanAnggotakeluarga, $pekerjaanAnggotakeluarga);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idLingkungankeluarga = $request->attributes->get('id');

        $data = $this->model->selectOne($idLingkungankeluarga);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idLingkungankeluarga = $request->attributes->get('id');
        $nipPegawai = $request->request->get('nipPegawai');
        $jenisAnggotakeluarga = $request->request->get('jenisAnggotakeluarga');
        $namaAnggotakeluaraga = $request->request->get('namaAnggotakeluaraga');
        $jeniskelaminAnggotakeluarga = $request->request->get('jeniskelaminAnggotakeluarga');
        $tempatlahirAnggotakeluarga = $request->request->get('tempatlahirAnggotakeluarga');
        $tanggallahirAnggotakeluarga = $request->request->get('tanggallahirAnggotakeluarga');
        $pendidikanAnggotakeluarga = $request->request->get('pendidikanAnggotakeluarga');
        $pekerjaanAnggotakeluarga = $request->request->get('pekerjaanAnggotakeluarga');

        $update = $this->model->update($idLingkungankeluarga, $nipPegawai, $jenisAnggotakeluarga, $namaAnggotakeluaraga, $jeniskelaminAnggotakeluarga, $tempatlahirAnggotakeluarga, $tanggallahirAnggotakeluarga, $pendidikanAnggotakeluarga, $pekerjaanAnggotakeluarga);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idLingkungankeluarga = $request->attributes->get('id');

        $delete = $this->model->delete($idLingkungankeluarga);

        return new JsonResponse($delete);
    }

    public function get(Request $request)
    {
        $nipPegawai = $request->attributes->get('nipPegawai');

        $datas = $this->model->selectMany($nipPegawai);

        return new JsonResponse($datas);
    }
}
