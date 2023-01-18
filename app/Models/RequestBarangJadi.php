<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBarangJadi extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_barang_jadi_id', 'warna_barang_jadi_id', 'kode_barang', 'nama_barang', 'quantitas', 'tanggal_permintaan', 'tanggal_pengiriman'
    ];

    public function jenisBarangJadis()
    {
        return $this->belongsTo(JenisBarangJadi::class, 'jenis_barang_jadi_id');
    }

    public function warnaBarangJadis()
    {
        return $this->belongsTo(WarnaBarangJadi::class, 'warna_barang_jadi_id');
    }

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'request_barang_jadi_id');
    }
}
