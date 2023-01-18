<?php

namespace App\Http\Controllers;

use App\Models\WarnaBarangJadi;
use Illuminate\Http\Request;

class WarnaBarangJadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warna = WarnaBarangJadi::all();
        return [
            "status" => 1,
            "data" => $warna
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new WarnaBarangJadi();
        $data->nama_warna = $request->input('nama_warna');
        $data->kode_warna = $request->input('kode_warna');
        $data->save();

        return response('Berhasil Tambah Warna Barang Jadi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WarnaBarangJadi  $warnaBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function show(WarnaBarangJadi $warnaBarangJadi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WarnaBarangJadi  $warnaBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function edit(WarnaBarangJadi $warnaBarangJadi, $id)
    {
        $warna = WarnaBarangJadi::find($id);
        return [
            'status' => 1,
            'data' => $warna
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WarnaBarangJadi  $warnaBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarnaBarangJadi $warnaBarangJadi, $id)
    {
        $check_warna = WarnaBarangJadi::firstWhere('id', $id);
        if ($check_warna) {
            $warna_barang = WarnaBarangJadi::find($id);
            $warna_barang->nama_warna = $request->nama_warna;
            $warna_barang->kode_warna = $request->kode_warna;
            $warna_barang->save();
            return response([
                'status' => 'OK',
                'message' => 'Data Warna Barang Jadi Berhasil Dirubah',
                'update-data' => $warna_barang
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'ID Barang tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WarnaBarangJadi  $warnaBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarnaBarangJadi $warnaBarangJadi, $id)
    {
        $check_warna = WarnaBarangJadi::firstWhere('id', $id);
        if ($check_warna) {
            WarnaBarangJadi::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data dihapus',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Warna Barang Jadi tidak ditemukan'
            ], 404);
        }
    }
}
