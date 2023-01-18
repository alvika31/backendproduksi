<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;
use App\Models\RequestBarangJadi;
use Illuminate\Routing\Controller;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadi = RequestBarangJadi::where('status', 2)->with('jenisBarangJadis', 'warnaBarangJadis', 'produksi')->get();
        // $jadi = Produksi::where('status_produksi', 0)->with('requestbarangjadi.jenisBarangJadis', 'requestbarangjadi.warnaBarangJadis')->get();
        return [
            "status" => 1,
            "data" => $jadi,
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
        $data = new Pengiriman();
        $data->request_barang_jadi_id = $request->input('request_barang_jadi_id');
        $data->tanggal_pengiriman = $request->input('tanggal_pengiriman');
        $data->save();

        if ($request->input('tanggal_pengiriman')) {
            $requestbarangjadi = RequestBarangJadi::find($data->request_barang_jadi_id);
            $requestbarangjadi->status = 3;
            $requestbarangjadi->save();
        }
        return response('Berhasil Tambah Produksi Barang Jadi');
    }

    public function sudahkirim()
    {
        $jadi = RequestBarangJadi::where('status', 3)->with('jenisBarangJadis', 'warnaBarangJadis', 'produksi')->get();
        // $jadi = Produksi::where('status_produksi', 0)->with('requestbarangjadi.jenisBarangJadis', 'requestbarangjadi.warnaBarangJadis')->get();
        return [
            "status" => 1,
            "data" => $jadi,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengiriman  $pengiriman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengiriman $pengiriman)
    {
        //
    }
}
