@extends('index')

@section('title', 'Login')

@section('isihalaman')
<div class="row align-items-center">
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="auth-highlight h-100 d-flex flex-column justify-content-center">
            <div class="d-inline-flex align-items-center mb-3">
                <span class="badge-soft mr-2">Selamat Datang</span>
                <span class="text-muted">Perpustakaan Cortis</span>
            </div>
            <h3 class="font-weight-bold text-primary">Akses koleksi favoritmu</h3>
            <p class="mb-0 text-secondary">Masuk untuk mulai mengelola data buku, anggota, petugas, hingga transaksi pembelian dengan tampilan yang lebih rapi.</p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="p-4 shadow-sm rounded-lg bg-white border">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mr-3" style="width:46px;height:46px;">
                    <i class="fas fa-unlock-alt"></i>
                </div>
                <div>
                    <h4 class="mb-1">Masuk</h4>
                    <small class="text-muted">Gunakan email dan kata sandi terdaftar</small>
                </div>
            </div>

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block font-weight-bold">Masuk ke Dashboard</button>
            </form>

            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></small>
            </div>
        </div>
    </div>
</div>
@endsection
