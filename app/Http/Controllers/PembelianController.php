<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianModel;
use App\Models\PetugasModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;

class PembelianController extends Controller
{
    //method untuk tampil data pembelian
    public function pembeliantampil()
    {
        $datapembelian = PembelianModel::prderby('id_pembelian','ASC')
        ->paginate(5);

        $datapetugas = PetugasModel::all();
        $datanggota = AnggotaModel::all();
        $databuku = bukuModel::all();

        return view('halaman/view_pembelian',['pembelian'=>$datapembelian,'petugas'=>$datapetugas,'anggota'=>$datanggota,'buku'=>$databuku])
    }

    // ➕ Tambah data pembelian
    public function pembeliantambah(Request $request)
    {
        $request->validate([
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'qty' => 'required',
            'harga' => 'required'
        ]);

        PembelianModel::create($request->only(['id_petugas', 'id_anggota', 'id_buku', 'qty','harga']));

        return redirect('/pembelian')->with('success', '✅ Data pembelian berhasil ditambahkan.');
    }

    // ✏️ Edit data pembelian
    public function pembelianedit($id_pembelian, Request $request)
    {
        $request->validate([
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'qty' => 'required',
            'harga' => 'required'
        ]);

        $pembelian = PembelianModel::findOrFail($id_pembelian);
        $pembelian->update($request->only(['id_petugas', 'id_anggota', 'id_buku', 'qty','harga']));

        return redirect()->back()->with('success', '✏️ Data pembelian berhasil diperbarui.');
    }

    // 🗑️ Hapus data pembelian
    public function pembelianhapus($id_pembelian)
    {
        $pembelian = PembelianModel::findOrFail($id_pembelian);
        $pembelian->delete();

        return redirect()->back()->with('success', '🗑️ Data pembelian berhasil dihapus.');
    }
}
