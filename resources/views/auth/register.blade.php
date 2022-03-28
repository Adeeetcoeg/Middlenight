@extends('layouts.app')
<body style="overflow: hidden; margin: 0px;">
    <div id="vanta-bg" style="height:100vh">
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">

              @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dissmis="alert" aria-label="close"></button>
            </div>
              @endif
              <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-9 fw-bold lh-1 mb-3">Mendaftar Akun </h1>
                <p class="col-lg-10 fs-4">Harap Daftar untuk berbelanja</p>
              </div>
              <div class="col-md-10 mx-auto col-lg-5">



                <form method="POST" action="{{ route('register') }}" class="p-4 p-md-5 border rounded-3 bg-light">
                  @csrf
                    <h4>Form Daftar</h4>
                  <small class="text-muted">Isi menggunakan data yang benar!</small>
                  <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('Nama') is-invalid @enderror" id="Nama" placeholder="name@example.com" required required value="{{ old('name') }}">
                    <label for="Nama">Nama</label>
                    @error('Nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                    @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control @error('Email') is-invalid @enderror" id="Email" placeholder="name@example.com" required required value="{{ old('email') }}">
                    <label for="">Alamat Email</label>
                    @error('Email')
                    <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                    @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                    <label for="">Katasandi</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="password_confirmation" required autocomplete="new-password">
                    <label for="">Konfirmasi katasandi</label>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  {{-- <div class="form-floating mb-3">
                    <input type="password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <label for="">Confirm Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div> --}}
                  <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Register') }}</button>
                  <hr class="my-4">
                  <small class="text-muted">Sudah Memiliki Akun? <a href="/login">Masuk</a></small>
                </form>
              </div>
            </div>
          </div></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.clouds2.min.js"></script>
<script>
VANTA.CLOUDS2({
  el: "#vanta-bg",
  mouseControls: true,
  touchControls: true,
  gyroControls: false,
  minHeight: 200.00,
  minWidth: 200.00,
  scale: 1.00,
  texturePath: "{{ asset('image/noise.png') }}"
})
</script>
</body>
