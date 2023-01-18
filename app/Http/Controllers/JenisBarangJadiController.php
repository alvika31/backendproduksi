<?php

namespace App\Http\Controllers;

use App\Models\JenisBarangJadi;
use Illuminate\Http\Request;

class JenisBarangJadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = JenisBarangJadi::all();
        return [
            "status" => 1,
            "data" => $jenis
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
        $data = new JenisBarangJadi();
        $data->nama_jenis = $request->input('nama_jenis');
        $data->deskripsi_jenis = $request->input('deskripsi_jenis');
        $data->save();



        return response('Berhasil Tambah Jenis Barang Jadi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisBarangJadi  $jenisBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function show(JenisBarangJadi $jenisBarangJadi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBarangJadi  $jenisBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBarangJadi $jenisBarangJadi, $id)
    {
        $jenis = JenisBarangJadi::find($id);
        return [
            'status' => 1,
            'data' => $jenis
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisBarangJadi  $jenisBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisBarangJadi $jenisBarangJadi, $id)
    {
        $check_jenis = JenisBarangJadi::firstWhere('id', $id);
        if ($check_jenis) {
            $jenis_barang = JenisBarangJadi::find($id);
            $jenis_barang->nama_jenis = $request->nama_jenis;
            $jenis_barang->deskripsi_jenis = $request->deskripsi_jenis;
            $jenis_barang->save();
            return response([
                'status' => 'OK',
                'message' => 'Data Jenis Barang Jadi Berhasil Dirubah',
                'update-data' => $jenis_barang
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'ID Jenis tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBarangJadi  $jenisBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBarangJadi $jenisBarangJadi, $id)
    {
        $check_jenis = JenisBarangJadi::firstWhere('id', $id);
        if ($check_jenis) {
            JenisBarangJadi::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data dihapus',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Jenis Barang Jadi tidak ditemukan'
            ], 404);
        }
    }
}
