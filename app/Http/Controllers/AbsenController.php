<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\AbstractWebResource;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::all();
        return response()->json($absen);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $absen = new Absen;

        $absen->TglAbsen = $request->TglAbsen;
        $absen->nis = $request->nis;
        $absen->KetAbsen = $request->KetAbsen;

        $absen->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $absen = Absen::find($id);
        if(!$absen){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($absen);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $absen = Absen::find($id);
        if(!$absen){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $absen->TglAbsen = $request->TglAbsen;
        $absen->nis = $request->nis;
        $absen->KetAbsen = $request->KetAbsen;

        $absen->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $absen = Absen::find($id);
        if(!$absen){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $absen->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
