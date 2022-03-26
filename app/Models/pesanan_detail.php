<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan_detail extends Model
{
    use HasFactory;
    public function barang()
    {
        return $this->belongsTo('App\Models\barang', 'barang_id', 'id');
    }

    public function pesan()
    {
        return $this->belongsTo('App\Models\pesan', 'pesan_id', 'id');
    }
}
