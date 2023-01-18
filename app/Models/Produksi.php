<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_barang_jadi_id', 'barang_mentah_id', 'quantitas', 'tanggal_produksu'
    ];

    public function requestbarangjadi()
    {
        return $this->belongsTo(RequestBarangJadi::class, 'request_barang_jadi_id');
    }

    public function barangmentah()
    {
        return $this->belongsTo(BarangMentah::class, 'barang_mentah_id');
    }
}
