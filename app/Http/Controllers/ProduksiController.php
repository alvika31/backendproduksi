<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\BarangMentah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RequestBarangJadi;

class ProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadi = RequestBarangJadi::where('status', 0)->orWhere('status', 1)->with('jenisBarangJadis', 'warnaBarangJadis', 'produksi')->get();
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
        $data = new Produksi();
        $data->request_barang_jadi_id = $request->input('request_barang_jadi_id');
        $data->barang_mentah_id = $request->input('barang_mentah_id');
        $data->quantitas = $request->input('quantitas');
        $data->tanggal_produksi = $request->input('tanggal_produksi');
        $data->status_produksi = 0;
        $data->save();


        if ($request->input('status_produksi')) {
            $produksi_cek = Produksi::where('request_barang_jadi_id', $request->input('request_barang_jadi_id'));
            $produksi_cek->status_produksi = 1;
            $produksi_cek->save();
        }

        if ($request->input('quantitas')) {
            $barang_mentah = BarangMentah::find($data->barang_mentah_id);
            $barang_mentah->stock_mentah = $barang_mentah->stock_mentah - $request->input('quantitas');
            $barang_mentah->save();
        }

        if ($request->input('quantitas')) {
            $requestbarangjadi = RequestBarangJadi::find($data->request_barang_jadi_id);
            $requestbarangjadi->status = 1;
            $requestbarangjadi->save();
        }

        return response('Berhasil Tambah Produksi Barang Jadi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function show(Produksi $produksi, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Produksi $produksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produksi $produksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produksi  $produksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produksi $produksi)
    {
        //
    }

    public function addproduksi($id)
    {
        $barang_jadi = RequestBarangJadi::with('jenisBarangJadis', 'warnaBarangJadis', 'produksi.barangmentah', 'pengiriman')->findOrFail($id);
        $barang_mentah = BarangMentah::all();
        return [
            'status' => 'OK',
            'data' => [
                'barang_jadi' => $barang_jadi,
                'barang_mentah' => $barang_mentah,
            ],
        ];
    }

    public function updatestatusproduksi(Request $request, $id)
    {
        Produksi::where('request_barang_jadi_id', $id)
            ->update([
                'status_produksi' => 1,
            ]);
        RequestBarangJadi::where('id', $id)
            ->update([
                'status' => 2,
            ]);


        return [
            'status' => 'OK Berhasil Di update'
        ];
    }

    public function sudahproduksi()
    {
        $jadi = RequestBarangJadi::whereRelation('produksi', 'status_produksi', 1)->with('jenisBarangJadis', 'warnaBarangJadis', 'produksi')->get();
        // $jadi = Produksi::where('status_produksi', 0)->with('requestbarangjadi.jenisBarangJadis', 'requestbarangjadi.warnaBarangJadis')->get();
        return [
            "status" => 1,
            "data" => $jadi,
        ];
    }
}
