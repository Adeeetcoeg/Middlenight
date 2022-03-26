<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $fillable = ['id_kategori','judul_barang','harga','cover','keterangan','pengarang_barang','stok','tahun_terbit'];
    public $timetamps = true;

    public function kategori()
    {

        return $this->belongsTo('App\Models\kategori', 'id_kategori');
    }
    public function penjualan()
    {
        $this->hasMany('App\Models\barang', 'id_barang');
    }
    public function laporanpenjualan()
    {
        $this->hasMany('App\Models\barang', 'id_barang');
    }



    public function image()
    {
        if ($this->cover && file_exists(public_path('image/barang/' . $this->cover))) {
            return asset('image/barang/' . $this->cover);
        } else {
            return asset('image/no_image.png');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('image/barang/' . $this->cover))) {
            return unlink(public_path('image/barang/' . $this->cover));
        }

    }
}
