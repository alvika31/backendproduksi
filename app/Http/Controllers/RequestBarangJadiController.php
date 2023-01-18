<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisBarangJadi;
use App\Models\WarnaBarangJadi;
use App\Models\RequestBarangJadi;
use App\Http\Controllers\Controller;

class RequestBarangJadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangjadi = RequestBarangJadi::with('jenisBarangJadis', 'warnaBarangJadis')->get();
        return [
            "status" => 1,
            "data" => $barangjadi
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warna_barang = WarnaBarangJadi::all();
        $jenis_barang = JenisBarangJadi::all();

        return [
            'status' => 'OK',
            'data' => [
                'warna_barang' => $warna_barang,
                'jenis_barang' => $jenis_barang
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new RequestBarangJadi();
        $data->jenis_barang_jadi_id = $request->input('jenis_barang_jadi_id');
        $data->warna_barang_jadi_id = $request->input('warna_barang_jadi_id');
        $data->kode_barang = $request->input('kode_barang');
        $data->nama_barang = $request->input('nama_barang');
        $data->quantitas = $request->input('quantitas');
        $data->tanggal_permintaan = $request->input('tanggal_permintaan');
        $data->tanggal_pengiriman = $request->input('tanggal_pengiriman');
        $data->status = 0;
        $data->save();

        return response('Berhasil Tambah Jenis Barang Jadi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestBarangJadi  $requestBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function show(RequestBarangJadi $requestBarangJadi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestBarangJadi  $requestBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestBarangJadi $requestBarangJadi, $id)
    {
        $barang = RequestBarangJadi::find($id);
        $jenis = RequestBarangJadi::find($id)->jenisBarangJadis;
        $warna = RequestBarangJadi::find($id)->warnaBarangJadis;
        $datajenis = JenisBarangJadi::all();
        $datawarna = WarnaBarangJadi::all();
        return [
            'status' => 1,
            'data' => [
                'barangjadi' => $barang,
                'jenis' => $jenis,
                'warna' => $warna,
                'data_jenis' => $datajenis,
                'data_warna' => $datawarna
            ]
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestBarangJadi  $requestBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestBarangJadi $requestBarangJadi, $id)
    {
        $check_barang_jadi = RequestBarangJadi::firstWhere('id', $id);
        if ($check_barang_jadi) {
            $barang_jadi = RequestBarangJadi::find($id);
            $barang_jadi->jenis_barang_jadi_id = $request->input('jenis_barang_jadi_id');
            $barang_jadi->warna_barang_jadi_id = $request->input('warna_barang_jadi_id');
            $barang_jadi->kode_barang = $request->input('kode_barang');
            $barang_jadi->nama_barang = $request->input('nama_barang');
            $barang_jadi->quantitas = $request->input('quantitas');
            $barang_jadi->tanggal_permintaan = $request->input('tanggal_permintaan');
            $barang_jadi->tanggal_pengiriman = $request->input('tanggal_pengiriman');
            $barang_jadi->save();
            return response([
                'status' => 'OK',
                'message' => 'Data Jenis Barang Jadi Berhasil Dirubah',
                'update-data' => $barang_jadi
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
     * @param  \App\Models\RequestBarangJadi  $requestBarangJadi
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestBarangJadi $requestBarangJadi, $id)
    {
        $check_jenis = RequestBarangJadi::firstWhere('id', $id);
        if ($check_jenis) {
            RequestBarangJadi::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data dihapus',
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Data Barang Jadi tidak ditemukan'
            ], 404);
        }
    }
}
