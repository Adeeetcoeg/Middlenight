<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use App\Models\pesanan_detail;
use App\Models\User;
use Auth;

class BackendController extends Controller
{
    public function index()
    {
        $pesanans = pesan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('pesan2.index', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = pesan::where('id', $id)->first();
        $pesanan_details = pesanan_detail::where('pesan_id', $pesanan->id)->get();

        return view('pesan2.detail', compact('pesanan', 'pesanan_details'));
    }
    public function laporan()
    {
        $laporan = history::all();
        return view('pesan2.laporan', compact('laporan'));
    }
}
