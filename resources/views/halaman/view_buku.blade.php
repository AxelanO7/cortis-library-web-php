@extends('index')
@section('title', 'Data Buku')

@section('isihalaman')
<h3 class="text-center mb-4">📚 Daftar Buku Perpustakaan Cortis</h3>

<!-- Tombol tambah -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalBukuTambah">
    ➕ Tambah Data Buku
</button>

<!-- Tabel Buku -->
<table class="table table-bordered table-striped">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>ID Buku</th>
            <th>Kode Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($buku as $index => $bk)
        <tr>
            <td align="center">{{ $index + $buku->firstItem() }}</td>
            <td>{{ $bk->id_buku }}</td>
            <td>{{ $bk->kode_buku }}</td>
            <td>{{ $bk->judul }}</td>
            <td>{{ $bk->pengarang }}</td>
            <td>{{ $bk->kategori }}</td>
            <td align="center">

                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#modalBukuEdit{{ $bk->id_buku }}">✏️ Edit</button>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalBukuEdit{{ $bk->id_buku }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/buku/edit/{{ $bk->id_buku }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Buku</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Buku</label>
                                        <input type="text" name="kode_buku" class="form-control"
                                            value="{{ $bk->kode_buku }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" name="judul" class="form-control"
                                            value="{{ $bk->judul }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" name="pengarang" class="form-control"
                                            value="{{ $bk->pengarang }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" name="kategori" class="form-control"
                                            value="{{ $bk->kategori }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Tombol Hapus -->
                <form action="/buku/hapus/{{ $bk->id_buku }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin mau dihapus?')">🗑️ Hapus</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div class="mt-3">
    Halaman : {{ $buku->currentPage() }} <br>
    Jumlah Data : {{ $buku->total() }} <br>
    Data Per Halaman : {{ $buku->perPage() }}
</div>
<div class="mt-2">{{ $buku->links() }}</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalBukuTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/buku/tambah" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Buku</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
