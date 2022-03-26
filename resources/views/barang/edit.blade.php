@extends('adminlte::page')
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Data buku</h1>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update', $buku->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Nama Barang</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Masukan Judul barang</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Harga barang</label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Masukan Harga barang</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Stok barang</label>
                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror">
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Masukan Stok barang</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Foto barang</label>
                                <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Masukan Foto barang</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Kategori barang</label>
                                <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                                    @foreach ($kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Masukan Kategori barang</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
