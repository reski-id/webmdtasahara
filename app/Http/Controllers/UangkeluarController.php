<?php

namespace App\Http\Controllers;

use App\Uangkeluar;
use Illuminate\Http\Request;

class UangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Uangkeluar = Uangkeluar::all();
        return response()->json($Uangkeluar);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Uangkeluar = new Uangkeluar;

        $Uangkeluar->tanggal = $request->tanggal;
        $Uangkeluar->jumlah= $request->jumlah;
        $Uangkeluar->keterangan = $request->keterangan;

        $Uangkeluar->save();
        return response()->json([
            'Stjumlahatus' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uangkeluar  $Uangkeluar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Uangkeluar = Uangkeluar::find($id);
        if(!$Uangkeluar){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Uangkeluar);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uangkeluar  $Uangkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Uangkeluar = Uangkeluar::find($id);
        if(!$Uangkeluar){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Uangkeluar->tanggal = $request->tanggal;
        $Uangkeluar->jumlah = $request->jumlah;
        $Uangkeluar->keterangan = $request->keterangan;

        $Uangkeluar->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uangkeluar  $Uangkeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Uangkeluar = Uangkeluar::find($id);
        if(!$Uangkeluar){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Uangkeluar->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
