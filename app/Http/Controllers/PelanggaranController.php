<?php

namespace App\Http\Controllers;

use App\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pelanggaran = Pelanggaran::all();
        return response()->json($Pelanggaran);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Pelanggaran = new Pelanggaran;

        $Pelanggaran->tanggal = $request->tanggal;
        $Pelanggaran->nis = $request->nis;
        $Pelanggaran->jenispelanggara = $request->jenispelanggara;
        $Pelanggaran->keterangan = $request->keterangan;
        $Pelanggaran->solusi = $request->solusi;
        $Pelanggaran->proses = $request->proses;

        $Pelanggaran->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggaran  $Pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Pelanggaran = Pelanggaran::find($id);
        if(!$Pelanggaran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Pelanggaran);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggaran  $Pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Pelanggaran = Pelanggaran::find($id);
        if(!$Pelanggaran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Pelanggaran->tanggal = $request->tanggal;
        $Pelanggaran->nis = $request->nis;
        $Pelanggaran->jenispelanggara = $request->jenispelanggara;
        $Pelanggaran->keterangan = $request->keterangan;
        $Pelanggaran->solusi = $request->solusi;
        $Pelanggaran->proses = $request->proses;

        $Pelanggaran->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggaran  $Pelanggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Pelanggaran = Pelanggaran::find($id);
        if(!$Pelanggaran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Pelanggaran->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
