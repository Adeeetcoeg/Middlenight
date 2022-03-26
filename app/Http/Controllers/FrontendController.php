<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use App\Models\Pesanan_detail;


class FrontendController extends Controller
{
    //
    public function index()
    {
        $barang = Barang::all();
        $pesanan_details = Pesanan_detail::all();
        $kategori = Kategori::all();
        return view('frontend.index', compact('barang','kategori','pesanan_details'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFaill($id);
        return view('frontend.index', compact('barang'));
    }
}
