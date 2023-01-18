<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    public function requestbarangjadi()
    {
        return $this->belongsTo(RequestBarangJadi::class, 'request_barang_jadi_id');
    }
}
