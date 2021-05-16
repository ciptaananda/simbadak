<?php

namespace App\Pegawai\Controller;

use App\Pegawai\Model\Pegawai;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PegawaiController extends GlobalFunc
{
    public $model;

    public function __construct()
    {
        $this->model = new Pegawai();
    }

    public function index(Request $request)
    {
        $datas = $this->model->selectAll();

        return new JsonResponse($datas); 
    }

    public function create(Request $request)
    {
        $idPegawai = uniqid('pga');
        $namaPegawai = $request->request->get('namaPegawai');
        $mobilPegawai = $request->request->get('mobilPegawai');
        $emailPegawai = $request->request->get('emailPegawai');
        $hirarkiPegawai = $request->request->get('hirarkiPegawai');
        $idInstansi = $request->request->get('idInstansi');
        $jabatanPegawai = $request->request->get('jabatanPegawai');
        $tempatlahirPegawai = $request->request->get('tempatlahirPegawai');
        $tanggallahirPegawai = $request->request->get('tanggallahirPegawai');
        $jeniskelaminPegawai = $request->request->get('jeniskelaminPegawai');
        $alamatkantorPegawai = $request->request->get('alamatkantorPegawai');
        $alamatPegawai = $request->request->get('alamatPegawai');
        $agamaPegawai = $request->request->get('agamaPegawai');
        $telponPegawai = $request->request->get('telponPegawai');
        $statuspernikahanPegawai = $request->request->get('statuspernikahanPegawai');
        $unitkerjaPegawai = $request->request->get('unitkerjaPegawai');
        $provinsiPegawai = $request->request->get('provinsiPegawai');
        $kabupatenPegawai = $request->request->get('kabupatenPegawai');
        $kecamatanPegawai = $request->request->get('kecamatanPegawai');
        $kelurahanPegawai = $request->request->get('kelurahanPegawai');

        $create = $this->model->create($idPegawai, $namaPegawai, $mobilPegawai, $emailPegawai, $hirarkiPegawai, $idInstansi, $jabatanPegawai, $tempatlahirPegawai, $tanggallahirPegawai, $jeniskelaminPegawai, $alamatPegawai, $alamatkantorPegawai, $agamaPegawai, $telponPegawai, $statuspernikahanPegawai, $unitkerjaPegawai, $provinsiPegawai, $kabupatenPegawai, $kecamatanPegawai, $kelurahanPegawai);

        return new JsonResponse($create);
    }

    public function detail(Request $request)
    {
        $idPegawai = $request->attributes->get('id');

        $data = $this->model->selectOne($idPegawai);

        return new JsonResponse($data);
    }

    public function update(Request $request)
    {
        $idPegawai = $request->attributes->get('id');
        $namaPegawai = $request->request->get('namaPegawai');
        $mobilPegawai = $request->request->get('mobilPegawai');
        $emailPegawai = $request->request->get('emailPegawai');
        $hirarkiPegawai = $request->request->get('hirarkiPegawai');
        $idInstansi = $request->request->get('idInstansi');
        $jabatanPegawai = $request->request->get('jabatanPegawai');
        $tempatlahirPegawai = $request->request->get('tempatlahirPegawai');
        $tanggallahirPegawai = $request->request->get('tanggallahirPegawai');
        $jeniskelaminPegawai = $request->request->get('jeniskelaminPegawai');
        $alamatkantorPegawai = $request->request->get('alamatkantorPegawai');
        $alamatPegawai = $request->request->get('alamatPegawai');
        $agamaPegawai = $request->request->get('agamaPegawai');
        $telponPegawai = $request->request->get('telponPegawai');
        $statuspernikahanPegawai = $request->request->get('statuspernikahanPegawai');
        $unitkerjaPegawai = $request->request->get('unitkerjaPegawai');
        $provinsiPegawai = $request->request->get('provinsiPegawai');
        $kabupatenPegawai = $request->request->get('kabupatenPegawai');
        $kecamatanPegawai = $request->request->get('kecamatanPegawai');
        $kelurahanPegawai = $request->request->get('kelurahanPegawai');

        $update = $this->model->update($idPegawai, $namaPegawai, $mobilPegawai, $emailPegawai, $hirarkiPegawai, $idInstansi, $jabatanPegawai, $tempatlahirPegawai, $tanggallahirPegawai, $jeniskelaminPegawai, $alamatPegawai, $alamatkantorPegawai, $agamaPegawai, $telponPegawai, $statuspernikahanPegawai, $unitkerjaPegawai, $provinsiPegawai, $kabupatenPegawai, $kecamatanPegawai, $kelurahanPegawai);

        return new JsonResponse($update);
    }

    public function delete(Request $request)
    {
        $idPegawai = $request->attributes->get('id');

        $delete = $this->model->delete($idPegawai);

        return new JsonResponse($delete);
    }
}
