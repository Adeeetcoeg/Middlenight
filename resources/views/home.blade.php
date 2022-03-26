@extends('adminlte::page')

@section('title', 'Toko Buku')

@section('content_header')



@endsection

@section('content')
<div class="row">
    <!-- ./col -->
    <div class="col-lg-5 col-xs-10">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ DB::table('barangs')->count() }}</h3>

                <p>Total Produk</p>
            </div>
            <div class="icon">
                <i class="fa fa-cubes"></i>
            </div>
            <a href="{{ route('barang.create') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-5 col-xs-10">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ DB::table('kategoris')->count() }}</h3>

                <p>Total Kategori</p>
            </div>
            <div class="icon">
                <i class="fa fa-id-card"></i>
            </div>
            <a href="{{ route('kategori.create') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-5 col-xs-10">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ DB::table('penjualans')->count() }}</h3>

                <p>Total Penjualan</p>
            </div>
            <div class="icon">
                <i class="fa fa-tasks"></i>
            </div>
            <a href="{{ route('penjualan.create') }}" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
