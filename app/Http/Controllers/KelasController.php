<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json($kelas);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;

        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->nama_kelas = $request->nama_kelas;

        $kelas->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        if(!$kelas){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($kelas);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        if(!$kelas){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->nama_kelas = $request->nama_kelas;

        $kelas->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kelas = Kelas::find($id);
        if(!$kelas){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kelas->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
