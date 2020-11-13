<?php

namespace App\Http\Controllers;

use App\Ortu;
use Illuminate\Http\Request;

class OrtuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Ortu = Ortu::all();
        return response()->json($Ortu);
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
            'Nama' => 'required|string',
            'JenisKelamin' => 'required',
            'TempatLahir' => 'required|string',
            'Pendidikan' => 'required',
            'Agama' => 'required|string',
            'Alamat' => 'required|string',
            'NoHp' => 'required|string',
        ]);

        $Ortu = new Ortu;

        $Ortu->Nama = $request->Nama;
        $Ortu->JenisKelamin = $request->JenisKelamin;
        $Ortu->TempatLahir = $request->TempatLahir;
        $Ortu->Pendidikan = $request->Pendidikan;
        $Ortu->TanggalLahir = $request->TanggalLahir;
        $Ortu->Agama = $request->Agama;
        $Ortu->Alamat = $request->Alamat;
        $Ortu->NoHp = $request->NoHp;

        $Ortu->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ortu  $Ortu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Ortu = Ortu::find($id);
        if(!$Ortu){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Ortu);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ortu  $Ortu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'Nama' => 'string',
            'TempatLahir' => 'string',
            'Agama' => 'string',
            'Alamat' => 'string',
            'NoHp' => 'string',
        ]);

        $Ortu = Ortu::find($id);
        if(!$Ortu){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Ortu->Nama = $request->Nama;
        $Ortu->JenisKelamin = $request->JenisKelamin;
        $Ortu->TempatLahir = $request->TempatLahir;
        $Ortu->Pendidikan = $request->Pendidikan;
        $Ortu->TanggalLahir = $request->TanggalLahir;
        $Ortu->Agama = $request->Agama;
        $Ortu->Alamat = $request->Alamat;
        $Ortu->NoHp = $request->NoHp;

        $Ortu->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ortu  $Ortu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Ortu = Ortu::find($id);
        if(!$Ortu){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Ortu->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
