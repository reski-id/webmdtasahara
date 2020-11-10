<?php

namespace App\Http\Controllers;

use App\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pelajaran = Pelajaran::all();
        return response()->json($Pelajaran);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Pelajaran = new Pelajaran;

        $Pelajaran->KodePljrn = $request->KodePljrn;
        $Pelajaran->NamaPljrn = $request->NamaPljrn;

        $Pelajaran->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelajaran  $Pelajaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Pelajaran = Pelajaran::find($id);
        if(!$Pelajaran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Pelajaran);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelajaran  $Pelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Pelajaran = Pelajaran::find($id);
        if(!$Pelajaran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Pelajaran->KodePljrn = $request->KodePljrn;
        $Pelajaran->NamaPljrn = $request->NamaPljrn;

        $Pelajaran->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelajaran  $Pelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Pelajaran = Pelajaran::find($id);
        if(!$Pelajaran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Pelajaran->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
