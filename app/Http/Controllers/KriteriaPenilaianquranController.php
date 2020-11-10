<?php

namespace App\Http\Controllers;

use App\KriteriaPenilaianquran;
use Illuminate\Http\Request;

class KriteriaPenilaianquranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = KriteriaPenilaianquran::all();
        return response()->json($kriteria);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kriteria = new KriteriaPenilaianquran;

        $kriteria->kdpenilai = $request->kdpenilai;
        $kriteria->kriteria = $request->kriteria;

        $kriteria->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KriteriaPenilaianquran  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = KriteriaPenilaianquran::find($id);
        if(!$kriteria){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($kriteria);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KriteriaPenilaianquran  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kriteria = KriteriaPenilaianquran::find($id);
        if(!$kriteria){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kriteria->kdpenilai = $request->kdpenilai;
        $kriteria->kriteria = $request->kriteria;

        $kriteria->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KriteriaPenilaianquran  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kriteria = KriteriaPenilaianquran::find($id);
        if(!$kriteria){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kriteria->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
