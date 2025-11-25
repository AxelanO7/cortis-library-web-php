@extends('index')

@section('Register')

@section('isihalaman')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-3">📝 Register</h3>

    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Daftar</button>
    </form>

    <div class="text-center mt-3">
        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
    </div>
</div>
@endsection
