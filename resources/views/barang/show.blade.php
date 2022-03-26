@extends('adminlte::page')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Show Barang</h1>
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
                <div class="card-header">Barang</div>
                <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                @csrf
                @method('put')
                    <div class="form-group">
                         <label for=""> Nama</label>
                         <input type="text" name="nama" value="{{$barang->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                         <label for=""> Harga barang</label>
                         <input type="text" name="harga" value="{{$barang->harga}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" name="stok" value="{{$barang->stok}}" class="form-control" readonly>
                   </div>
                    <div class="form-group">
                            <label for="">Foto barang</label>
                            <br>
                            <img src="{{ $barang->image() }}" height="200" style="padding:5px;" />
                    </div>
                    <div class="form-group">
                            <label for="">Kategori barang</label>
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" disabled>
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <a href="{{route('barang.index')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
