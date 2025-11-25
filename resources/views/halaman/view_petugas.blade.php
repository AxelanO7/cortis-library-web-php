@extends('index')
@section('title', 'Data Petugas')

@section('isihalaman')
<h3 class="text-center mb-4">📚 Daftar Petugas Perpustakaan Cortis</h3>

<!-- Tombol tambah -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalPetugasTambah">
    ➕ Tambah Data Petugas
</button>

<!-- Tabel Petugas -->
<table class="table table-bordered table-striped">
    <thead class="text-center">
        <tr>
            <th>No</th>
            <th>ID Petugas</th>
            <th>Kode Petugas</th>
            <th>Nama Petugas</th>
            <th>Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($petugas as $index => $bk)
        <tr>
            <td align="center">{{ $index + $petugas->firstItem() }}</td>
            <td>{{ $bk->id_petugas }}</td>
            <td>{{ $bk->kode_petugas }}</td>
            <td>{{ $bk->nama_petugas }}</td>
            <td>{{ $bk->hp }}</td>
            <td align="center">

                <!-- Tombol Edit -->
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#modalPPetugasEdit{{ $bk->id_petugas}}">✏️ Edit</button>

                <!-- Modal Edit -->
                <div class="modal fade" id="modalPetugasEdit{{ $bk->id_petugas }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/petugas/edit/{{ $bk->id_petugas }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Data Petugas</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Petugas</label>
                                        <input type="text" name="kode_petugas" class="form-control"
                                            value="{{ $bk->kode_petugas }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Petugas</label>
                                        <input type="text" name="nama_petugas" class="form-control"
                                            value="{{ $bk->nama_petugas }}">
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
                <form action="/petugas/hapus/{{ $bk->id_petugas }}" method="POST" style="display:inline;">
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
    Halaman : {{ $petugas->currentPage() }} <br>
    Jumlah Data : {{ $petugas->total() }} <br>
    Data Per Halaman : {{ $petugas->perPage() }}
</div>
<div class="mt-2">{{ $petugas->links() }}</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalPetugasTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/petugas/tambah" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Petugas</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Petugas</label>
                        <input type="text" name="kode_petugas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" required>
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
