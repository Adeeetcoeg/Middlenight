@extends('layouts.user')
@section('container')
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 ">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{ $barang->image() }}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $barang->nama }}</h2>
							<div>
								<h3 class="product-price">Rp. {{ number_format($barang->harga) }}</h3>
								<span class="product-available">Stock : {{ $barang->stok }}</span>
							</div>
							<div class="add-to-cart">
                            <form method="post" action="{{ url('pesan') }}/{{ $barang->id }}">
                                                    @csrf
                            <input type="number" name="jumlah_pesan" class="form-control"
                            required=""><br>
                            <button type="submit" class="btn btn-primary"><i
                            class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                            </form>
							</div>
						</div>
					</div>
					<!-- /Product details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>

@endsection
@section('footer')
@endsection
