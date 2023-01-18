<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMentah extends Model
{
    use HasFactory;

    public function produksi()
    {
        return $this->hasMany(Produksi::class, 'barang_mentah_id');
    }
}
