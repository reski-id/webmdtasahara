<?php

namespace App\Http\Controllers;

use App\KalenderAkademik;
use Illuminate\Http\Request;

class KalenderAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kalakademik = KalenderAkademik::all();
        return response()->json($kalakademik);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kalakademik = new KalenderAkademik;

        $kalakademik->tgl_mulai = $request->tgl_mulai;
        $kalakademik->tgl_selesai = $request->tgl_selesai;
        $kalakademik->acara = $request->acara;

        $kalakademik->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KalenderAkademik  $kalakademik
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kalakademik = KalenderAkademik::find($id);
        if(!$kalakademik){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($kalakademik);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KalenderAkademik  $kalakademik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kalakademik = KalenderAkademik::find($id);
        if(!$kalakademik){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kalakademik->tgl_mulai = $request->tgl_mulai;
        $kalakademik->tgl_selesai = $request->tgl_selesai;
        $kalakademik->acara = $request->acara;
        $kalakademik->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KalenderAkademik  $kalakademik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kalakademik = KalenderAkademik::find($id);
        if(!$kalakademik){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kalakademik->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
