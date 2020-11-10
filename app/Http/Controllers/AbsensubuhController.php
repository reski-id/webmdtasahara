<?php

namespace App\Http\Controllers;

use App\Absensubuh;
use Illuminate\Http\Request;


class AbsensubuhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Absensubuh = Absensubuh::all();
        return response()->json($Absensubuh);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Absensubuh = new Absensubuh;

        $Absensubuh->TglAbsensubuh = $request->TglAbsensubuh;
        $Absensubuh->nis = $request->nis;
        $Absensubuh->KetAbsensubuh = $request->KetAbsensubuh;

        $Absensubuh->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Absensubuh  $Absensubuh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Absensubuh = Absensubuh::find($id);
        if(!$Absensubuh){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Absensubuh);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absensubuh  $Absensubuh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Absensubuh = Absensubuh::find($id);
        if(!$Absensubuh){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Absensubuh->TglAbsensubuh = $request->TglAbsensubuh;
        $Absensubuh->nis = $request->nis;
        $Absensubuh->KetAbsensubuh = $request->KetAbsensubuh;

        $Absensubuh->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absensubuh  $Absensubuh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Absensubuh = Absensubuh::find($id);
        if(!$Absensubuh){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Absensubuh->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
