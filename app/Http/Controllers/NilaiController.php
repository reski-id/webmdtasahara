<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\AbstractWebResource;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Nilai = Nilai::all();
        return response()->json($Nilai);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Nilai = new Nilai;

        $Nilai->Kode_Pelajaran = $request->Kode_Pelajaran;
        $Nilai->nis = $request->nis;
        $Nilai->nilai = $request->nilai;

        $Nilai->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Nilai = Nilai::find($id);
        if(!$Nilai){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Nilai);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Nilai = Nilai::find($id);
        if(!$Nilai){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Nilai->Kode_Pelajaran = $request->Kode_Pelajaran;
        $Nilai->nis = $request->nis;
        $Nilai->nilai = $request->nilai;

        $Nilai->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $Nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Nilai = Nilai::find($id);
        if(!$Nilai){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Nilai->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
