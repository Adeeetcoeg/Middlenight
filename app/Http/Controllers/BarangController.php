<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Http\Request;
use Alert;
use Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::with('kategori')->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'cover' => 'required|image|max:2048',
            'id_kategori' => 'required',
        ]);

        $barang = new barang;
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/barang/', $name);
            $barang->cover = $name;
        }
        $barang->id_kategori = $request->id_kategori;
        $barang->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        $barang = barang::findOrFail($id);
        $kategori = kategori::all();
        return view('barang.show', compact('barang', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        $barang = barang::findOrFail($id);
        $kategori = kategori::all();
        return view('barang.show', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        $request->validate([

            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'cover' => 'required|image|max:2048',
            'id_kategori' => 'required',
        ]);

        $barang = barang::findOrFail($id);
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->stok = $request->stok;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/barang/', $name);
            $barang->cover = $name;
        } else{
            $barang->cover = $barang->cover;
        }
        $barang->id_kategori = $request->id_kategori;
        $barang->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Data saved successfully",
        ]);
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!barang::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('barang.index');
    }
    public function barangnya()
    {

        $barang = barang::all();
        return view('frontend.index', compact('barang'));

    }
}
