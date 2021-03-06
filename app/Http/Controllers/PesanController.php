<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\barang;
use App\Models\kategori;
use App\Models\penjualan;
use App\Models\pesanan_detail;
use App\Models\pesan;
use App\Models\user;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $barang = barang::where('id', $id)->first();
        $kategori = kategori::where('id', $id)->first();
        $pesanan_details = Pesanan_detail::all();
        $kategori = Kategori::all();
        return view('pesan.index', compact('barang','kategori','pesanan_details'));
    }
    public function pesan(Request $request, $id)
    {
        $barang = barang::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
        if ($request->jumlah_pesan > $barang->stok) {
            return redirect('pesan/' . $id);
        }

        //cek validasi
        $cek_pesanan = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        //simpan ke database pesanan
        if (empty($cek_pesanan)) {
            $pesanan = new pesan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }

        //simpan ke database pesanan detail
        $pesanan_baru = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //cek pesanan detail
        $cek_pesanan_detail = pesanan_detail::where('barang_id', $barang->id)->where('pesan_id', $pesanan_baru->id)->first();
        if (empty($cek_pesanan_detail)) {
            $pesanan_detail = new pesanan_detail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesan_id = $pesanan_baru->id;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = pesanan_detail::where('barang_id', $barang->id)->where('pesan_id', $pesanan_baru->id)->first();

            $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

            //harga sekarang
            $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //jumlah total
        $pesanan = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        Alert::success('pesan masuk keranjang', 'Success');
        return redirect('check-out');

    }

    public function check_out()
    {
        $pesanan = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($pesanan)) {
            $pesanan_details = pesanan_detail::where('pesan_id', $pesanan->id)->get();
            $barang = Barang::all();
        }
        return view('pesan.check_out', compact('pesanan', 'pesanan_details','barang',));
    }

    public function delete($id)
    {
        $pesanan_detail = pesanan_detail::where('id', $id)->first();

        $pesanan = pesan::where('id', $pesanan_detail->pesan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        Alert::error('pesan Sukses Dihapus', 'Hapus');
        return redirect('check-out');
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $pesanan = pesan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = pesanan_detail::where('pesan_id', $pesan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok = $barang->stok - $pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::success('pesan telah di checkout', 'Success');
        return redirect('history/' . $pesan_id);

    }


}
