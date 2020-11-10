<?php

namespace App\Http\Controllers;

use App\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kas = Kas::all();
        return response()->json($kas);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kas = new Kas;

        $kas->keterangan = $request->keterangan;
        $kas->tgl = $request->tgl;
        $kas->jumlah = $request->jumlah;
        $kas->jenis = $request->jenis;

        $kas->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kas = Kas::find($id);
        if(!$kas){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($kas);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kas = Kas::find($id);
        if(!$kas){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kas->keterangan = $request->keterangan;
        $kas->tgl = $request->tgl;
        $kas->jumlah = $request->jumlah;
        $kas->jenis = $request->jenis;

        $kas->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kas  $kas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kas = Kas::find($id);
        if(!$kas){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $kas->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
