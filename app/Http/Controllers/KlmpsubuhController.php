<?php

namespace App\Http\Controllers;

use App\Klmpsubuh;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\AbstractWebResource;

class KlmpsubuhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Klmpsubuh = Klmpsubuh::all();
        return response()->json($Klmpsubuh);
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
            'nama_kelompok' => 'required|string'
        ]);

        $Klmpsubuh = new Klmpsubuh;

        $Klmpsubuh->nama_kelompok = $request->nama_kelompok;

        $Klmpsubuh->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Klmpsubuh  $Klmpsubuh
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Klmpsubuh = Klmpsubuh::find($id);
        if(!$Klmpsubuh){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Klmpsubuh);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Klmpsubuh  $Klmpsubuh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kelompok' => 'string'
        ]);

        $Klmpsubuh = Klmpsubuh::find($id);
        if(!$Klmpsubuh){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Klmpsubuh->nama_kelompok = $request->nama_kelompok;

        $Klmpsubuh->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Klmpsubuh  $Klmpsubuh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Klmpsubuh = Klmpsubuh::find($id);
        if(!$Klmpsubuh){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Klmpsubuh->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
