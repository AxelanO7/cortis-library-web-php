@extends('index')
@section('title', 'Pembelian')

@section('isihalaman')
    <h3><center>Data Pembelian Buku</center><h3>
    <h3><center>Perpustakaan Cortis</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPembelianTambah"> 
        Tambah Data Pembelian 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pembelian</td>
                <td align="center">ID Petugas</td>
                <td align="center">ID Anggota</td>
                <td align="center">ID Buku</td>
                <td align="center">Qty</td>
                <td align="center">Harga</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pembelian as $index=>$p)
                <tr>
                    <td align="center" scope="row">{{ $index + $pembelian->firstItem() }}</td>
                    <td align="center">{{$p->id_pembelian}}</td>
                    <td>{{$p->petugas->nama_petugas}}</td>
                    <td>{{$p->anggota->nama_anggota}}</td>
                    <td>{{$p->buku->judul}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPembelianEdit{{$p->id_pembelian}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Pembelian -->
                        <div class="modal fade" id="modalPembelianEdit{{$p->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="modalPembelianEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPembelianEditLabel">Form Edit Data Pembelian</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpembelianedit" id="formpembelianedit" action="/pembelian/edit/{{ $p->id_pembelian}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pembelian" class="col-sm-4 col-form-label">ID Pembelian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{ $p->id_pembelian}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_petugas" name="id_petugas">
                                                        @foreach ($petugas as $pt)
                                                            @if ($pt->id_petugas == $p->id_petugas)
                                                                <option value="{{ $pt->id_petugas }}" selected>{{ $pt->nama_petugas }}</option>
                                                            @else
                                                                <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_anggota" name="id_anggota">
                                                        @foreach ($anggota as $a)
                                                            @if ($a->id_anggota == $p->id_anggota)
                                                                <option value="{{ $a->id_anggota }}" selected>{{ $a->nama_anggota }}</option>
                                                            @else
                                                                <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_buku" name="id_buku">
                                                        @foreach ($buku as $bk)
                                                            @if ($bk->id_buku == $p->id_buku)
                                                                <option value="{{ $bk->id_buku }}" selected>{{ $bk->judul }}</option>
                                                            @else
                                                                <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pembeliantambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Pembelian -->
                        |
                        <a href="pembelian/hapus/{{$p->id_pembelian}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pembelian->currentPage() }} <br />
    Jumlah Data : {{ $pembelian->total() }} <br />
    Data Per Halaman : {{ $pembelian->perPage() }} <br />

    {{ $pembelian->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Peminjaman -->
    <div class="modal fade" id="modalPembelianTambah" tabindex="-1" role="dialog" aria-labelledby="modalPembelianTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPembelianTambahLabel">Form Input Data Pembelian</h5>
                </div>
                <div class="modal-body">

                    <form name="formpembeliantambah" id="formpembeliantambah" action="/pembelian/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                    <option></option>
                                    @foreach($anggota as $a)
                                        <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pinjamtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Pembelian -->
    
@endsection