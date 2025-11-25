<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Perpustakaan Cortis')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, rgba(0, 86, 179, 0.13), rgba(255, 166, 0, 0.12)),
                        url('{{ asset('gambar/banner.jpg') }}') center/cover fixed;
            color: #1d2c4d;
        }

        .backdrop {
            position: fixed;
            inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.95), rgba(255,255,255,0.92));
            z-index: -1;
        }

        .navbar-custom {
            background: linear-gradient(120deg, #0a3d62, #205072);
            border-radius: 0 0 16px 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
            color: #fefefe !important;
        }

        .nav-link { color: #ecf2ff !important; font-weight: 500; }
        .nav-link:hover { color: #f9d342 !important; }

        .content-shell {
            max-width: 1150px;
        }

        .content-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(27, 49, 66, 0.12);
            padding: 28px;
            border: 1px solid rgba(12, 52, 96, 0.05);
        }

        .footer {
            color: #6c7a92;
        }

        .auth-highlight {
            background: linear-gradient(135deg, rgba(10, 61, 98, 0.12), rgba(255, 193, 7, 0.18));
            border-radius: 14px;
            padding: 22px;
            border: 1px dashed rgba(32, 80, 114, 0.3);
        }

        .badge-soft {
            background: rgba(255, 255, 255, 0.3);
            color: #fefefe;
            border-radius: 999px;
            padding: 6px 14px;
            font-size: 12px;
            letter-spacing: .4px;
        }
    </style>
</head>
<body>
    <div class="backdrop"></div>

    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container content-shell">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span class="mr-2"><i class="fas fa-book-reader"></i></span> Cortis Library
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars text-white"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('buku.tampil') }}">Data Buku</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('anggota.tampil') }}">Data Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('petugas.tampil') }}">Data Petugas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('pembelian.tampil') }}">Data Pembelian</a></li>
                    @endauth
                </ul>
                <div class="d-flex align-items-center">
                    @auth
                        <span class="text-light mr-3 d-none d-md-inline">Halo, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="mb-0">
                            @csrf
                            <button class="btn btn-warning text-dark btn-sm font-weight-bold">Logout</button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm mr-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-light btn-sm text-primary font-weight-bold">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="container content-shell">
        @if (session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm">
                <div class="font-weight-bold mb-2">Terjadi kesalahan:</div>
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="content-card mb-4">
            @yield('isihalaman')
        </div>
    </main>

    <footer class="footer text-center py-3">
        <div class="container content-shell">
            <small>Perpustakaan Cortis &middot; Menjaga budaya membaca yang nyaman dan modern.</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
