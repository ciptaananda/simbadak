<?php

use Symfony\Component\Routing;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Core\GlobalFunc;

$routes = new Routing\RouteCollection();
$app = new GlobalFunc;

// ############################  !!DO NOT EDIT!! ############################ 
$routes->add('assets', new Routing\Route('/assets/{path}.{_format}', [
    '_controller' => 'Core\GlobalFunc::assets'
], [
    'path' => '[^.]+'
]));
// ############################  ------------ ############################ 


// ROUTE APPLICATION START BELOW!!! 
// --------------------------------

// CRUD bank
$routes->add('bank', new Route('/bank', [
    '_controller' => 'App\Bank\Controller\BankController::index',
]));
$routes->add('bankCreate', new Route('/bank/create', [
    '_controller' => 'App\Bank\Controller\BankController::create',
]));
$routes->add('bankDetail', new Route('/bank/detail/{id}', [
    '_controller' => 'App\Bank\Controller\BankController::detail',
]));
$routes->add('bankUpdate', new Route('/bank/{id}/update', [
    '_controller' => 'App\Bank\Controller\BankController::update',
]));
$routes->add('bankDelete', new Route('/bank/{id}/delete', [
    '_controller' => 'App\Bank\Controller\BankController::delete',
]));

// CRUD instansi
$routes->add('instansi', new Route('/instansi', [
    '_controller' => 'App\Instansi\Controller\InstansiController::index',
]));
$routes->add('instansiCreate', new Route('/instansi/create', [
    '_controller' => 'App\Instansi\Controller\InstansiController::create',
]));
$routes->add('instansiDetail', new Route('/instansi/detail/{id}', [
    '_controller' => 'App\Instansi\Controller\InstansiController::detail',
]));
$routes->add('instansiUpdate', new Route('/instansi/{id}/update', [
    '_controller' => 'App\Instansi\Controller\InstansiController::update',
]));
$routes->add('instansiDelete', new Route('/instansi/{id}/delete', [
    '_controller' => 'App\Instansi\Controller\InstansiController::delete',
]));

// CRUD hirarki
$routes->add('hirarki', new Route('/hirarki', [
    '_controller' => 'App\Hirarki\Controller\HirarkiController::index',
]));
$routes->add('hirarkiCreate', new Route('/hirarki/create', [
    '_controller' => 'App\Hirarki\Controller\HirarkiController::create',
]));
$routes->add('hirarkiDetail', new Route('/hirarki/detail/{id}', [
    '_controller' => 'App\Hirarki\Controller\HirarkiController::detail',
]));
$routes->add('hirarkiUpdate', new Route('/hirarki/{id}/update', [
    '_controller' => 'App\Hirarki\Controller\HirarkiController::update',
]));
$routes->add('hirarkiDelete', new Route('/hirarki/{id}/delete', [
    '_controller' => 'App\Hirarki\Controller\HirarkiController::delete',
]));

// CRUD jabatan
$routes->add('jabatan', new Route('/jabatan', [
    '_controller' => 'App\Jabatan\Controller\JabatanController::index',
]));
$routes->add('jabatanCreate', new Route('/jabatan/create', [
    '_controller' => 'App\Jabatan\Controller\JabatanController::create',
]));
$routes->add('jabatanDetail', new Route('/jabatan/detail/{id}', [
    '_controller' => 'App\Jabatan\Controller\JabatanController::detail',
]));
$routes->add('jabatanUpdate', new Route('/jabatan/{id}/update', [
    '_controller' => 'App\Jabatan\Controller\JabatanController::update',
]));
$routes->add('jabatanDelete', new Route('/jabatan/{id}/delete', [
    '_controller' => 'App\Jabatan\Controller\JabatanController::delete',
]));

// CRUD jenisPenelitian
$routes->add('jenisPenelitian', new Route('/jenis-penelitian', [
    '_controller' => 'App\JenisPenelitian\Controller\JenisPenelitianController::index',
]));
$routes->add('jenisPenelitianCreate', new Route('/jenis-penelitian/create', [
    '_controller' => 'App\JenisPenelitian\Controller\JenisPenelitianController::create',
]));
$routes->add('jenisPenelitianDetail', new Route('/jenis-penelitian/detail/{id}', [
    '_controller' => 'App\JenisPenelitian\Controller\JenisPenelitianController::detail',
]));
$routes->add('jenisPenelitianUpdate', new Route('/jenis-penelitian/{id}/update', [
    '_controller' => 'App\JenisPenelitian\Controller\JenisPenelitianController::update',
]));
$routes->add('jenisPenelitianDelete', new Route('/jenis-penelitian/{id}/delete', [
    '_controller' => 'App\JenisPenelitian\Controller\JenisPenelitianController::delete',
]));

// CRUD jenisPercetakan
$routes->add('jenisPercetakan', new Route('/jenis-percetakan', [
    '_controller' => 'App\JenisPercetakan\Controller\JenisPercetakanController::index',
]));
$routes->add('jenisPercetakanCreate', new Route('/jenis-percetakan/create', [
    '_controller' => 'App\JenisPercetakan\Controller\JenisPercetakanController::create',
]));
$routes->add('jenisPercetakanDetail', new Route('/jenis-percetakan/detail/{id}', [
    '_controller' => 'App\JenisPercetakan\Controller\JenisPercetakanController::detail',
]));
$routes->add('jenisPercetakanUpdate', new Route('/jenis-percetakan/{id}/update', [
    '_controller' => 'App\JenisPercetakan\Controller\JenisPercetakanController::update',
]));
$routes->add('jenisPercetakanDelete', new Route('/jenis-percetakan/{id}/delete', [
    '_controller' => 'App\JenisPercetakan\Controller\JenisPercetakanController::delete',
]));

// CRUD keahlian
$routes->add('keahlian', new Route('/keahlian', [
    '_controller' => 'App\Keahlian\Controller\KeahlianController::index',
]));
$routes->add('keahlianCreate', new Route('/keahlian/create', [
    '_controller' => 'App\Keahlian\Controller\KeahlianController::create',
]));
$routes->add('keahlianDetail', new Route('/keahlian/detail/{id}', [
    '_controller' => 'App\Keahlian\Controller\KeahlianController::detail',
]));
$routes->add('keahlianUpdate', new Route('/keahlian/{id}/update', [
    '_controller' => 'App\Keahlian\Controller\KeahlianController::update',
]));
$routes->add('keahlianDelete', new Route('/keahlian/{id}/delete', [
    '_controller' => 'App\Keahlian\Controller\KeahlianController::delete',
]));

// CRUD kepemilikanBangunan
$routes->add('kepemilikanBangunan', new Route('/kepemilikan-bangunan', [
    '_controller' => 'App\KepemilikanBangunan\Controller\KepemilikanBangunanController::index',
]));
$routes->add('kepemilikanBangunanCreate', new Route('/kepemilikan-bangunan/create', [
    '_controller' => 'App\KepemilikanBangunan\Controller\KepemilikanBangunanController::create',
]));
$routes->add('kepemilikanBangunanDetail', new Route('/kepemilikan-bangunan/detail/{id}', [
    '_controller' => 'App\KepemilikanBangunan\Controller\KepemilikanBangunanController::detail',
]));
$routes->add('kepemilikanBangunanUpdate', new Route('/kepemilikan-bangunan/{id}/update', [
    '_controller' => 'App\KepemilikanBangunan\Controller\KepemilikanBangunanController::update',
]));
$routes->add('kepemilikanBangunanDelete', new Route('/kepemilikan-bangunan/{id}/delete', [
    '_controller' => 'App\KepemilikanBangunan\Controller\KepemilikanBangunanController::delete',
]));

// CRUD kondisiKaryabudaya
$routes->add('kondisiKaryabudaya', new Route('/kondisi-karyabudaya', [
    '_controller' => 'App\KondisiKaryabudaya\Controller\KondisiKaryabudayaController::index',
]));
$routes->add('kondisiKaryabudayaCreate', new Route('/kondisi-karyabudaya/create', [
    '_controller' => 'App\KondisiKaryabudaya\Controller\KondisiKaryabudayaController::create',
]));
$routes->add('kondisiKaryabudayaDetail', new Route('/kondisi-karyabudaya/detail/{id}', [
    '_controller' => 'App\KondisiKaryabudaya\Controller\KondisiKaryabudayaController::detail',
]));
$routes->add('kondisiKaryabudayaUpdate', new Route('/kondisi-karyabudaya/{id}/update', [
    '_controller' => 'App\KondisiKaryabudaya\Controller\KondisiKaryabudayaController::update',
]));
$routes->add('kondisiKaryabudayaDelete', new Route('/kondisi-karyabudaya/{id}/delete', [
    '_controller' => 'App\KondisiKaryabudaya\Controller\KondisiKaryabudayaController::delete',
]));

// CRUD opk
$routes->add('opk', new Route('/opk', [
    '_controller' => 'App\Opk\Controller\OpkController::index',
]));
$routes->add('opkCreate', new Route('/opk/create', [
    '_controller' => 'App\Opk\Controller\OpkController::create',
]));
$routes->add('opkDetail', new Route('/opk/detail/{id}', [
    '_controller' => 'App\Opk\Controller\OpkController::detail',
]));
$routes->add('opkUpdate', new Route('/opk/{id}/update', [
    '_controller' => 'App\Opk\Controller\OpkController::update',
]));
$routes->add('opkDelete', new Route('/opk/{id}/delete', [
    '_controller' => 'App\Opk\Controller\OpkController::delete',
]));

// CRUD pekerjaan
$routes->add('pekerjaan', new Route('/pekerjaan', [
    '_controller' => 'App\Pekerjaan\Controller\PekerjaanController::index',
]));
$routes->add('pekerjaanCreate', new Route('/pekerjaan/create', [
    '_controller' => 'App\Pekerjaan\Controller\PekerjaanController::create',
]));
$routes->add('pekerjaanDetail', new Route('/pekerjaan/detail/{id}', [
    '_controller' => 'App\Pekerjaan\Controller\PekerjaanController::detail',
]));
$routes->add('pekerjaanUpdate', new Route('/pekerjaan/{id}/update', [
    '_controller' => 'App\Pekerjaan\Controller\PekerjaanController::update',
]));
$routes->add('pekerjaanDelete', new Route('/pekerjaan/{id}/delete', [
    '_controller' => 'App\Pekerjaan\Controller\PekerjaanController::delete',
]));

// CRUD pendidikan
$routes->add('pendidikan', new Route('/pendidikan', [
    '_controller' => 'App\Pendidikan\Controller\PendidikanController::index',
]));
$routes->add('pendidikanCreate', new Route('/pendidikan/create', [
    '_controller' => 'App\Pendidikan\Controller\PendidikanController::create',
]));
$routes->add('pendidikanDetail', new Route('/pendidikan/detail/{id}', [
    '_controller' => 'App\Pendidikan\Controller\PendidikanController::detail',
]));
$routes->add('pendidikanUpdate', new Route('/pendidikan/{id}/update', [
    '_controller' => 'App\Pendidikan\Controller\PendidikanController::update',
]));
$routes->add('pendidikanDelete', new Route('/pendidikan/{id}/delete', [
    '_controller' => 'App\Pendidikan\Controller\PendidikanController::delete',
]));

// CRUD spesifikasiKeahlian
$routes->add('spesifikasiKeahlian', new Route('/spesifikasi-keahlian', [
    '_controller' => 'App\SpesifikasiKeahlian\Controller\SpesifikasiKeahlianController::index',
]));
$routes->add('spesifikasiKeahlianCreate', new Route('/spesifikasi-keahlian/create', [
    '_controller' => 'App\SpesifikasiKeahlian\Controller\SpesifikasiKeahlianController::create',
]));
$routes->add('spesifikasiKeahlianDetail', new Route('/spesifikasi-keahlian/detail/{id}', [
    '_controller' => 'App\SpesifikasiKeahlian\Controller\SpesifikasiKeahlianController::detail',
]));
$routes->add('spesifikasiKeahlianUpdate', new Route('/spesifikasi-keahlian/{id}/update', [
    '_controller' => 'App\SpesifikasiKeahlian\Controller\SpesifikasiKeahlianController::update',
]));
$routes->add('spesifikasiKeahlianDelete', new Route('/spesifikasi-keahlian/{id}/delete', [
    '_controller' => 'App\SpesifikasiKeahlian\Controller\SpesifikasiKeahlianController::delete',
]));

// CRUD subyek
$routes->add('subyek', new Route('/subyek', [
    '_controller' => 'App\Subyek\Controller\SubyekController::index',
]));
$routes->add('subyekCreate', new Route('/subyek/create', [
    '_controller' => 'App\Subyek\Controller\SubyekController::create',
]));
$routes->add('subyekDetail', new Route('/subyek/detail/{id}', [
    '_controller' => 'App\Subyek\Controller\SubyekController::detail',
]));
$routes->add('subyekUpdate', new Route('/subyek/{id}/update', [
    '_controller' => 'App\Subyek\Controller\SubyekController::update',
]));
$routes->add('subyekDelete', new Route('/subyek/{id}/delete', [
    '_controller' => 'App\Subyek\Controller\SubyekController::delete',
]));

// CRUD domainWbtb
$routes->add('domainWbtb', new Route('/domain-wbtb', [
    '_controller' => 'App\DomainWbtb\Controller\DomainWbtbController::index',
]));
$routes->add('domainWbtbCreate', new Route('/domain-wbtb/create', [
    '_controller' => 'App\DomainWbtb\Controller\DomainWbtbController::create',
]));
$routes->add('domainWbtbDetail', new Route('/domain-wbtb/detail/{id}', [
    '_controller' => 'App\DomainWbtb\Controller\DomainWbtbController::detail',
]));
$routes->add('domainWbtbUpdate', new Route('/domain-wbtb/{id}/update', [
    '_controller' => 'App\DomainWbtb\Controller\DomainWbtbController::update',
]));
$routes->add('domainWbtbDelete', new Route('/domain-wbtb/{id}/delete', [
    '_controller' => 'App\DomainWbtb\Controller\DomainWbtbController::delete',
]));

// CRUD eksternal
$routes->add('eksternal', new Route('/eksternal', [
    '_controller' => 'App\Eksternal\Controller\EksternalController::index',
]));
$routes->add('eksternalCreate', new Route('/eksternal/create', [
    '_controller' => 'App\Eksternal\Controller\EksternalController::create',
]));
$routes->add('eksternalDetail', new Route('/eksternal/detail/{id}', [
    '_controller' => 'App\Eksternal\Controller\EksternalController::detail',
]));
$routes->add('eksternalUpdate', new Route('/eksternal/{id}/update', [
    '_controller' => 'App\Eksternal\Controller\EksternalController::update',
]));
$routes->add('eksternalDelete', new Route('/eksternal/{id}/delete', [
    '_controller' => 'App\Eksternal\Controller\EksternalController::delete',
]));

// CRUD provinsi
$routes->add('provinsi', new Route('/provinsi', [
    '_controller' => 'App\Provinsi\Controller\ProvinsiController::index',
]));
$routes->add('provinsiCreate', new Route('/provinsi/create', [
    '_controller' => 'App\Provinsi\Controller\ProvinsiController::create',
]));
$routes->add('provinsiDetail', new Route('/provinsi/detail/{id}', [
    '_controller' => 'App\Provinsi\Controller\ProvinsiController::detail',
]));
$routes->add('provinsiUpdate', new Route('/provinsi/{id}/update', [
    '_controller' => 'App\Provinsi\Controller\ProvinsiController::update',
]));
$routes->add('provinsiDelete', new Route('/provinsi/{id}/delete', [
    '_controller' => 'App\Provinsi\Controller\ProvinsiController::delete',
]));

// CRUD kabupaten
$routes->add('kabupaten', new Route('/kabupaten', [
    '_controller' => 'App\Kabupaten\Controller\KabupatenController::index',
]));
$routes->add('kabupatenCreate', new Route('/kabupaten/create', [
    '_controller' => 'App\Kabupaten\Controller\KabupatenController::create',
]));
$routes->add('kabupatenDetail', new Route('/kabupaten/detail/{id}', [
    '_controller' => 'App\Kabupaten\Controller\KabupatenController::detail',
]));
$routes->add('kabupatenUpdate', new Route('/kabupaten/{id}/update', [
    '_controller' => 'App\Kabupaten\Controller\KabupatenController::update',
]));
$routes->add('kabupatenDelete', new Route('/kabupaten/{id}/delete', [
    '_controller' => 'App\Kabupaten\Controller\KabupatenController::delete',
]));

// CRUD kecamatan
$routes->add('kecamatan', new Route('/kecamatan', [
    '_controller' => 'App\Kecamatan\Controller\KecamatanController::index',
]));
$routes->add('kecamatanCreate', new Route('/kecamatan/create', [
    '_controller' => 'App\Kecamatan\Controller\KecamatanController::create',
]));
$routes->add('kecamatanDetail', new Route('/kecamatan/detail/{id}', [
    '_controller' => 'App\Kecamatan\Controller\KecamatanController::detail',
]));
$routes->add('kecamatanUpdate', new Route('/kecamatan/{id}/update', [
    '_controller' => 'App\Kecamatan\Controller\KecamatanController::update',
]));
$routes->add('kecamatanDelete', new Route('/kecamatan/{id}/delete', [
    '_controller' => 'App\Kecamatan\Controller\KecamatanController::delete',
]));

// CRUD kelurahan
$routes->add('kelurahan', new Route('/kelurahan', [
    '_controller' => 'App\Kelurahan\Controller\KelurahanController::index',
]));
$routes->add('kelurahanCreate', new Route('/kelurahan/create', [
    '_controller' => 'App\Kelurahan\Controller\KelurahanController::create',
]));
$routes->add('kelurahanDetail', new Route('/kelurahan/detail/{id}', [
    '_controller' => 'App\Kelurahan\Controller\KelurahanController::detail',
]));
$routes->add('kelurahanUpdate', new Route('/kelurahan/{id}/update', [
    '_controller' => 'App\Kelurahan\Controller\KelurahanController::update',
]));
$routes->add('kelurahanDelete', new Route('/kelurahan/{id}/delete', [
    '_controller' => 'App\Kelurahan\Controller\KelurahanController::delete',
]));

// CRUD unitKerja
$routes->add('unitKerja', new Route('/unitkerja', [
    '_controller' => 'App\UnitKerja\Controller\UnitKerjaController::index',
]));
$routes->add('unitKerjaCreate', new Route('/unitkerja/create', [
    '_controller' => 'App\UnitKerja\Controller\UnitKerjaController::create',
]));
$routes->add('unitKerjaDetail', new Route('/unitkerja/detail/{id}', [
    '_controller' => 'App\UnitKerja\Controller\UnitKerjaController::detail',
]));
$routes->add('unitKerjaUpdate', new Route('/unitkerja/{id}/update', [
    '_controller' => 'App\UnitKerja\Controller\UnitKerjaController::update',
]));
$routes->add('unitKerjaDelete', new Route('/unitkerja/{id}/delete', [
    '_controller' => 'App\UnitKerja\Controller\UnitKerjaController::delete',
]));

// CRUD pegawai
$routes->add('pegawai', new Route('/pegawai', [
    '_controller' => 'App\Pegawai\Controller\PegawaiController::index',
]));
$routes->add('pegawaiCreate', new Route('/pegawai/create', [
    '_controller' => 'App\Pegawai\Controller\PegawaiController::create',
]));
$routes->add('pegawaiDetail', new Route('/pegawai/detail/{id}', [
    '_controller' => 'App\Pegawai\Controller\PegawaiController::detail',
]));
$routes->add('pegawaiUpdate', new Route('/pegawai/{id}/update', [
    '_controller' => 'App\Pegawai\Controller\PegawaiController::update',
]));
$routes->add('pegawaiDelete', new Route('/pegawai/{id}/delete', [
    '_controller' => 'App\Pegawai\Controller\PegawaiController::delete',
]));

// lingkunganKeluarga
$routes->add('lingkunganKeluarga', new Route('/lingkungan-keluarga', [
    '_controller' => 'App\LingkunganKeluarga\Controller\LingkunganKeluargaController::index',
]));
$routes->add('lingkunganKeluargaPegawai', new Route('/lingkungan-keluarga/get/{nipPegawai}', [
    '_controller' => 'App\LingkunganKeluarga\Controller\LingkunganKeluargaController::get',
]));
$routes->add('lingkunganKeluargaCreate', new Route('/lingkungan-keluarga/create', [
    '_controller' => 'App\LingkunganKeluarga\Controller\LingkunganKeluargaController::create',
]));
$routes->add('lingkunganKeluargaUpdate', new Route('/lingkungan-keluarga/{id}/update', [
    '_controller' => 'App\LingkunganKeluarga\Controller\LingkunganKeluargaController::update',
]));
$routes->add('lingkunganKeluargaDelete', new Route('/lingkungan-keluarga/{id}/delete', [
    '_controller' => 'App\LingkunganKeluarga\Controller\LingkunganKeluargaController::delete',
]));


//Crud penelitianKegiatan
$routes->add('penelitianKegiatan', new Route('/penelitian-kegiatan', [
    '_controller' => 'App\PenelitianKegiatan\Controller\PenelitianKegiatanController::index',
]));
$routes->add('penelitianKegiatanSelectOne', new Route('/penelitian-kegiatan/get/{id}', [
    '_controller' => 'App\PenelitianKegiatan\Controller\PenelitianKegiatanController::readOne',
]));
$routes->add('penelitianKegiatanCreate', new Route('/penelitian-kegiatan/create', [
    '_controller' => 'App\PenelitianKegiatan\Controller\PenelitianKegiatanController::create',
]));
$routes->add('penelitianKegiatanDelete', new Route('/penelitian-kegiatan/{id}/delete', [
    '_controller' => 'App\PenelitianKegiatan\Controller\PenelitianKegiatanController::delete',
]));
$routes->add('penelitianKegiatanUpdate', new Route('/penelitian-kegiatan/{id}/update', [
    '_controller' => 'App\PenelitianKegiatan\Controller\PenelitianKegiatanController::update',
]));

//Crud penelitianKomunitas
$routes->add('penelitianKomunitas', new Route('/penelitian-komunitas', [
    '_controller' => 'App\PenelitianKomunitas\Controller\PenelitianKomunitasController::index',
]));
$routes->add('penelitianKomunitasSelectOne', new Route('/penelitian-komunitas/get/{id}', [
    '_controller' => 'App\PenelitianKomunitas\Controller\PenelitianKomunitasController::readOne',
]));
$routes->add('penelitianKomunitasCreate', new Route('/penelitian-komunitas/create', [
    '_controller' => 'App\PenelitianKomunitas\Controller\PenelitianKomunitasController::create',
]));
$routes->add('penelitianKomunitasDelete', new Route('/penelitian-komunitas/{id}/delete', [
    '_controller' => 'App\PenelitianKomunitas\Controller\PenelitianKomunitasController::delete',
]));
$routes->add('penelitianKomunitasUpdate', new Route('/penelitian-komunitas/{id}/update', [
    '_controller' => 'App\PenelitianKomunitas\Controller\PenelitianKomunitasController::update',
]));


return $routes;