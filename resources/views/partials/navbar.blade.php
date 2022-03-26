<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +6282269962344</li>
                            <li><i class="ti-email"></i> Coegpengencuan@gmail.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">

                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="{{ asset('img/logo.jpg') }}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            {{-- <select>
                                <option selected="selected">All Category</option>
                                @foreach($kategori as $data)
                                <option>{{ $data->nama_kategori }}</option>
                                @endforeach
                            </select> --}}
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div>
                        @guest
                            @if (Route::has('login'))
                            <div class="sinlge-bar">
                                <a href="{{ route('login') }}" class="single-icon"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                            </div>
                            @endif
                        @else
                        <div class="sinlge-bar">
                       <a href="{{ route('logout') }}" class="single-icon"><i class="fa fa-sign-in" aria-hidden="true"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"></i></a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </div>
                        @endguest

                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{ DB::table('pesanan_details')->count() }} Produk</span>
                                    <a href="#">View Cart</a>
                                </div>
                                @foreach($pesanan_details as $data)
                                <ul class="shopping-list">
                                    <li>

                                        <a class="cart-img" href="#"><img src="{{ $data->barang->image() }}" alt="#"></a>
                                        <h4><a href="#">{{ $data->barang->nama }}</a></h4>
                                        <p class="quantity">{{ $data->jumlah }} - Unit<br><span class="amount">Rp.{{ number_format($data->barang->harga) }}</span></p>

                                    </li>
                                @endforeach
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">Rp. {{ number_format($data->jumlah_harga) }}</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="all-category">
                            <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>HOME</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                                <li><a href="#">Product</a></li>
                                                <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                    <ul class="dropdown">
                                                        <li><a href="cart.html">Keranjang</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                </li>
                                                <li><a href="#">Contact Us</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
