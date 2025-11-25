@extends('index')
@section('title', 'Data Anggota')

@section('isihalaman')
<h3 class="text-center mb-4">📚 Daftar Anggota Perpustakaan Cortis</h3>

<!-- Tombol tambah -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAnggotaTambah">
    ➕ Tambah Data Anggota
</button>

<!-- Tabel Anggota -->
<table class="table table-bordered table-striped">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>ID Anggota</th>
            <th>Kode Anggota</th>
            <th>Nama Anggota</th>
            <th>Alamat</th>
            <th>Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($anggota as $index => $bk)
        <tr>
            <td align="center">{{ $index + $anggota->firstItem() }}</td>
            <td>{{ $bk->id_anggota }}</td>
            <td>{{ $bk->kode_anggota }}</td>
            <td>{{ $bk->nama_anggota }}</td>
            <td>{{ $bk->alamat }}</td>
            <td>{{ $bk->hp }}</td>
            <td align="center">

                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#modalAnggotaEdit{{ $bk->id_anggota }}">✏️ Edit</button>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalAnggotaEdit{{ $bk->id_anggota }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/anggota/edit/{{ $bk->id_anggota }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Anggota</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Anggota</label>
                                        <input type="text" name="kode_anggota" class="form-control"
                                            value="{{ $bk->kode_anggota }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input type="text" name="nama_anggota" class="form-control"
                                            value="{{ $bk->nama_anggota }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                            value="{{ $bk->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Hp</label>
                                        <input type="text" name="hp" class="form-control"
                                            value="{{ $bk->hp }}">
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
                <form action="/anggota/hapus/{{ $bk->id_anggota }}" method="POST" style="display:inline;">
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
    Halaman : {{ $anggota->currentPage() }} <br>
    Jumlah Data : {{ $anggota->total() }} <br>
    Data Per Halaman : {{ $anggota->perPage() }}
</div>
<div class="mt-2">{{ $anggota->links() }}</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalAnggotaTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/anggota/tambah" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Anggota</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Anggota</label>
                        <input type="text" name="kode_anggota" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Anggota</label>
                        <input type="text" name="nama_anggota" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Hp</label>
                        <input type="text" name="hp" class="form-control" required>
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
