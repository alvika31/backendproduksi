<?php

namespace App\Http\Controllers;

use App\Models\BarangMentah;
use Illuminate\Http\Request;

class BarangMentahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentah = BarangMentah::all();
        return [
            "status" => 1,
            "data" => $mentah
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
        $data = new BarangMentah();
        $data->nama_barang_mentah = $request->input('nama_barang_mentah');
        $data->jenis_barang_mentah = $request->input('jenis_barang_mentah');
        $data->warna_barang_mentah = $request->input('warna_barang_mentah');
        $data->stock_mentah = $request->input('stock_mentah');
        $data->save();
        return response('Berhasil Tambah Barang Mentah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMentah  $barangMentah
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMentah $barangMentah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMentah  $barangMentah
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangMentah $barangMentah, $id)
    {
        $mentah = BarangMentah::find($id);
        return [
            'status' => 1,
            'data' => $mentah
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMentah  $barangMentah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangMentah $barangMentah, $id)
    {
        $cek_mentah = BarangMentah::firstWhere('id', $id);
        if ($cek_mentah) {
            $barang_mentah = BarangMentah::find($id);
            $barang_mentah->nama_barang_mentah = $request->nama_barang_mentah;
            $barang_mentah->jenis_barang_mentah = $request->jenis_barang_mentah;
            $barang_mentah->warna_barang_mentah = $request->warna_barang_mentah;
            $barang_mentah->stock_mentah = $request->stock_mentah;
            $barang_mentah->save();
            return response([
                'status' => 'OK',
                'message' => 'Barang Mentah Berhasil Dirubah',
                'update-data' => $barang_mentah
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'ID Barang Mentah tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMentah  $barangMentah
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangMentah $barangMentah, $id)
    {
        $check_jenis = BarangMentah::firstWhere('id', $id);
        if ($check_jenis) {
            BarangMentah::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data dihapus',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Barang Mentah tidak ditemukan'
            ], 404);
        }
    }
}
