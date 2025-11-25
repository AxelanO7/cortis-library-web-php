@extends('index')

@section('title', 'Login')

@section('isihalaman')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-3">🔐 Login</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Masuk</button>
    </form>

    <div class="text-center mt-3">
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
    </div>
</div>
@endsection
