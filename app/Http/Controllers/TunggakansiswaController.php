<?php

namespace App\Http\Controllers;

use App\Tunggakansiswa;
use Illuminate\Http\Request;

class TunggakansiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tunggakansiswa = Tunggakansiswa::all();
        return response()->json($Tunggakansiswa);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Tunggakansiswa = new Tunggakansiswa;

        $Tunggakansiswa->idtunggakan = $request->idtunggakan;
        $Tunggakansiswa->tanggal = $request->tanggal;
        $Tunggakansiswa->NIS = $request->NIS;
        $Tunggakansiswa->jumlah = $request->jumlah;
        $Tunggakansiswa->idkategori = $request->idkategori;
        $Tunggakansiswa->kettungakan = $request->kettungakan;
        $Tunggakansiswa->tgl_jatuhtempo = $request->tgl_jatuhtempo;
        $Tunggakansiswa->tgl_bayar = $request->tgl_bayar;
        $Tunggakansiswa->jenis_pembayaran = $request->jenis_pembayaran;
        $Tunggakansiswa->proses = $request->proses;
        $Tunggakansiswa->pesan = $request->pesan;
        $Tunggakansiswa->bukti_bayar = $request->bukti_bayar;

        $Tunggakansiswa->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil disimpan'
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tunggakansiswa  $Tunggakansiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tunggakansiswa = Tunggakansiswa::find($id);
        if(!$Tunggakansiswa){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        return response()->json($Tunggakansiswa);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tunggakansiswa  $Tunggakansiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Tunggakansiswa = Tunggakansiswa::find($id);
        if(!$Tunggakansiswa){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Tunggakansiswa->idtunggakan = $request->idtunggakan;
        $Tunggakansiswa->tanggal = $request->tanggal;
        $Tunggakansiswa->NIS = $request->NIS;
        $Tunggakansiswa->jumlah = $request->jumlah;
        $Tunggakansiswa->idkategori = $request->idkategori;
        $Tunggakansiswa->kettungakan = $request->kettungakan;
        $Tunggakansiswa->tgl_jatuhtempo = $request->tgl_jatuhtempo;
        $Tunggakansiswa->tgl_bayar = $request->tgl_bayar;
        $Tunggakansiswa->jenis_pembayaran = $request->jenis_pembayaran;
        $Tunggakansiswa->proses = $request->proses;
        $Tunggakansiswa->pesan = $request->pesan;
        $Tunggakansiswa->bukti_bayar = $request->bukti_bayar;

        $Tunggakansiswa->save();
        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil diupdate'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tunggakansiswa  $Tunggakansiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $Tunggakansiswa = Tunggakansiswa::find($id);
        if(!$Tunggakansiswa){
            return response()->json([
                'Status' => 'Failed',
                'Message' => 'Data tidak ditemukan'
            ],404);
        }

        $Tunggakansiswa->delete();

        return response()->json([
            'Status' => 'Success',
            'Message' => 'Data berhasil dihapus'
        ],201);

    }
}
