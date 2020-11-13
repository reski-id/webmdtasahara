<?php

namespace App\Http\Controllers;

use App\Nilaiquran;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Element\AbstractWebResource;

class NilaiquranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Nilaiquran = Nilaiquran::all();
        return response()->json($Nilaiquran);
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
            'kdkriteria' => 'required',
            'nis' => 'required|integer',
            'nilai' => 'required|string'
        ]);

        $Nilaiquran = new Nilaiquran;

        $Nilaiquran->kdkriteria = $request->kdkriteria;
        $Nilaiquran->nis = $request->nis;
        $Nilaiquran->nilai = $request->nilai;

        $Nilaiquran->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilaiquran  $Nilaiquran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Nilaiquran = Nilaiquran::find($id);
        if(!$Nilaiquran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Nilaiquran);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilaiquran  $Nilaiquran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nis' => 'integer',
            'nilai' => 'string'
        ]);

        $Nilaiquran = Nilaiquran::find($id);
        if(!$Nilaiquran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Nilaiquran->kdkriteria = $request->kdkriteria;
        $Nilaiquran->nis = $request->nis;
        $Nilaiquran->nilai = $request->nilai;

        $Nilaiquran->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilaiquran  $Nilaiquran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Nilaiquran = Nilaiquran::find($id);
        if(!$Nilaiquran){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Nilaiquran->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
