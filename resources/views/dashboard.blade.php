@extends('index')

@section('title', 'Dashboard')

@section('isihalaman')
<div class="text-center">
    <h3 class="mb-2">Selamat Datang, {{ Auth::user()->name }} 🎉</h3>
    <p class="text-muted">Kamu sudah masuk dan siap mengelola data perpustakaan.</p>
    <form action="{{ route('logout') }}" method="POST" class="d-inline-block mt-3">
        @csrf
        <button class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
