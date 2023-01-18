<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warna_barang_jadis')->insert([
            'nama_warna' => 'Hitam',
            'kode_warna' => '#000',
        ]);
        DB::table('jenis_barang_jadis')->insert([
            'nama_jenis' => 'Combed 30 S',
            'deskripsi_jenis' => 'Kaos Dengan bahan extra lembut',
        ]);
        DB::table('request_barang_jadis')->insert([
            'jenis_barang_jadi_id' => 1,
            'warna_barang_jadi_id' => 1,
            'kode_barang' => 'A001',
            'nama_barang' => 'Kaos Hoaxxx',
            'quantitas' => '100',
            'tanggal_permintaan' => '2023-10-01',
            'tanggal_pengiriman' => '2023-10-01',
            'status' => 0,
        ]);
        DB::table('barang_mentahs')->insert([
            'nama_barang_mentah' => 'Kancing',
            'jenis_barang_mentah' => 'kancing',
            'warna_barang_mentah' => 'merah',
            'stock_mentah' => 100,
        ]);
    }
}
