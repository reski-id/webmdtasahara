<?php

namespace App\Http\Controllers;

use App\Siswabaru;
use Illuminate\Http\Request;

class SiswabaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Siswabaru = Siswabaru::all();
        return response()->json($Siswabaru);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Siswabaru = new Siswabaru;

        $Siswabaru->idpendaftaran = $request->idpendaftaran;
        $Siswabaru->Nama = $request->Nama;
        $Siswabaru->JenisKelamin = $request->JenisKelamin;
        $Siswabaru->TempatLahir = $request->TempatLahir;
        $Siswabaru->TanggalLahir = $request->TanggalLahir;
        $Siswabaru->Agama = $request->Agama;
        $Siswabaru->namaOrtu = $request->namaOrtu;
        $Siswabaru->Alamat = $request->Alamat;
        $Siswabaru->nohpOrtu = $request->nohpOrtu;
        $Siswabaru->Proses = $request->Proses;

        $Siswabaru->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswabaru  $Siswabaru
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Siswabaru = Siswabaru::find($id);
        if(!$Siswabaru){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Siswabaru);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswabaru  $Siswabaru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Siswabaru = Siswabaru::find($id);
        if(!$Siswabaru){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Siswabaru->idpendaftaran = $request->idpendaftaran;
        $Siswabaru->Nama = $request->Nama;
        $Siswabaru->JenisKelamin = $request->JenisKelamin;
        $Siswabaru->TempatLahir = $request->TempatLahir;
        $Siswabaru->TanggalLahir = $request->TanggalLahir;
        $Siswabaru->Agama = $request->Agama;
        $Siswabaru->namaOrtu = $request->namaOrtu;
        $Siswabaru->Alamat = $request->Alamat;
        $Siswabaru->nohpOrtu = $request->nohpOrtu;
        $Siswabaru->Proses = $request->Proses;

        $Siswabaru->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswabaru  $Siswabaru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Siswabaru = Siswabaru::find($id);
        if(!$Siswabaru){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Siswabaru->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
