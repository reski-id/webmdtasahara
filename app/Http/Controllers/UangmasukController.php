<?php

namespace App\Http\Controllers;

use App\Uangmasuk;
use Illuminate\Http\Request;

class UangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Uangmasuk = Uangmasuk::all();
        return response()->json($Uangmasuk);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Uangmasuk = new Uangmasuk;

        $Uangmasuk->tanggal = $request->tanggal;
        $Uangmasuk->jumlah= $request->jumlah;
        $Uangmasuk->keterangan = $request->keterangan;

        $Uangmasuk->save();
        return response()->json([
            'Stjumlahatus' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uangmasuk  $Uangmasuk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Uangmasuk = Uangmasuk::find($id);
        if(!$Uangmasuk){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Uangmasuk);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uangmasuk  $Uangmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Uangmasuk = Uangmasuk::find($id);
        if(!$Uangmasuk){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Uangmasuk->tanggal = $request->tanggal;
        $Uangmasuk->jumlah = $request->jumlah;
        $Uangmasuk->keterangan = $request->keterangan;

        $Uangmasuk->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uangmasuk  $Uangmasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Uangmasuk = Uangmasuk::find($id);
        if(!$Uangmasuk){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Uangmasuk->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
