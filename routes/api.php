<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    'klmpksubuh' => 'KlmpsubuhController',
    'absen' => 'AbsenController',
    'absensubuh' => 'AbsensubuhController',
    'acara' => 'AcaraController',
    'photo' => 'PhotoController',
    'guru' => 'GuruController',
    'klakademik' => 'KalenderAkademikController',
    'kas' => 'KasController',
    'kelas' => 'KelasController',
    'kriteriapenalquran' => 'KriteriaPenilaianquranController',
    'nilai' => 'NilaiController',
    'nquran' => 'NilaiquranController',
    'ortu' => 'OrtuController',
    'pelajaran' => 'PelajaranController',
    'pelanggaran' => 'PelanggaranController',
    'siswa' => 'SiswaController',
    'siswabaru' => 'SiswabaruController',
    'tunggakan' => 'TunggakansiswaController',
    'uangkeluar' => 'UangkeluarController',
    'uangmasuk' => 'UangmasukController',



]);
