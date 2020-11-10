<?php

namespace App\Http\Controllers;

use App\Acara;
use Illuminate\Http\Request;


class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Acara = Acara::all();
        return response()->json($Acara);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Acara = new Acara;

        $Acara->tanggal = $request->tanggal;
        $Acara->acara = $request->acara;
        $Acara->lokasi = $request->lokasi;

        $Acara->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Acara  $Acara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Acara = Acara::find($id);
        if(!$Acara){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Acara);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acara  $Acara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Acara = Acara::find($id);
        if(!$Acara){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Acara->tanggal = $request->tanggal;
        $Acara->acara = $request->acara;
        $Acara->lokasi = $request->lokasi;
        $Acara->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acara  $Acara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Acara = Acara::find($id);
        if(!$Acara){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Acara->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
