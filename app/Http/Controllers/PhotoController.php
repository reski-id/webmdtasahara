<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Photo = Photo::all();
        return response()->json($Photo);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Photo = new Photo;

        $Photo->nama_file = $request->nama_file;
        $Photo->judul = $request->judul;
        $Photo->waktu = $request->waktu;
        $Photo->keterangan = $request->keterangan;

        $Photo->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $Photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Photo = Photo::find($id);
        if(!$Photo){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Photo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $Photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Photo = Photo::find($id);
        if(!$Photo){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Photo->nama_file = $request->nama_file;
        $Photo->judul = $request->judul;
        $Photo->waktu = $request->waktu;
        $Photo->keterangan = $request->keterangan;

        $Photo->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $Photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Photo = Photo::find($id);
        if(!$Photo){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Photo->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
