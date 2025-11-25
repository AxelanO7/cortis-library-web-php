@extends('index')

@section('title', 'Register')

@section('isihalaman')
<div class="row align-items-center">
    <div class="col-lg-6 mb-4 mb-lg-0 order-lg-2">
        <div class="auth-highlight h-100 d-flex flex-column justify-content-center">
            <div class="d-inline-flex align-items-center mb-3">
                <span class="badge-soft mr-2">Akun Baru</span>
                <span class="text-muted">Jadi bagian dari Cortis</span>
            </div>
            <h3 class="font-weight-bold text-primary">Bangun pengalaman membaca terbaik</h3>
            <p class="mb-0 text-secondary">Daftar untuk mulai mengelola koleksi buku, anggota, hingga transaksi. Desain baru yang ringan siap menemani tugas kuliahmu.</p>
        </div>
    </div>
    <div class="col-lg-6 order-lg-1">
        <div class="p-4 shadow-sm rounded-lg bg-white border">
            <div class="d-flex align-items-center mb-3">
                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mr-3" style="width:46px;height:46px;">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div>
                    <h4 class="mb-1">Daftar Akun</h4>
                    <small class="text-muted">Lengkapi data dirimu dengan benar</small>
                </div>
            </div>

            <form action="{{ url('/register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success btn-block font-weight-bold">Buat Akun</button>
            </form>

            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="{{ route('login') }}">Login</a></small>
            </div>
        </div>
    </div>
</div>
@endsection
