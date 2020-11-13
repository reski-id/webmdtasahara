<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Siswa = Siswa::all();
        return response()->json($Siswa);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nis' => 'required|integer',
            'Nama' => 'required|string',
            'TempatLahir' => 'required|string',
            'TanggalLahir' => 'required|date',
            'Agama' => 'required|string',
            'Alamat' => 'required|string'
        ]);

        $Siswa = new Siswa;

        $Siswa->nis = $request->nis;
        $Siswa->Nama = $request->Nama;
        $Siswa->JenisKelamin = $request->JenisKelamin;
        $Siswa->TempatLahir = $request->TempatLahir;
        $Siswa->TanggalLahir = $request->TanggalLahir;
        $Siswa->Agama = $request->Agama;
        $Siswa->Alamat = $request->Alamat;

        $Siswa->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $Siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Siswa = Siswa::find($id);
        if(!$Siswa){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Siswa);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $Siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nis' => 'integer',
            'Nama' => 'string',
            'TempatLahir' => 'string',
            'TanggalLahir' => 'date',
            'Agama' => 'string',
            'Alamat' => 'string'
        ]);

        $Siswa = Siswa::find($id);
        if(!$Siswa){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Siswa->nis = $request->nis;
        $Siswa->Nama = $request->Nama;
        $Siswa->JenisKelamin = $request->JenisKelamin;
        $Siswa->TempatLahir = $request->TempatLahir;
        $Siswa->TanggalLahir = $request->TanggalLahir;
        $Siswa->Agama = $request->Agama;
        $Siswa->Alamat = $request->Alamat;

        $Siswa->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $Siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Siswa = Siswa::find($id);
        if(!$Siswa){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Siswa->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
