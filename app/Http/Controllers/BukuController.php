<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BukuModel;

class BukuController extends Controller
{
    // 📘 Tampil data buku
    public function bukutampil()
    {
        $databuku = BukuModel::orderBy('kode_buku', 'ASC')->paginate(5);
        return view('halaman.view_buku', ['buku' => $databuku]);
    }

    // ➕ Tambah data buku
    public function bukutambah(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul'     => 'required',
            'pengarang' => 'required',
            'kategori'  => 'required'
        ]);

        BukuModel::create($request->only(['kode_buku', 'judul', 'pengarang', 'kategori']));

        return redirect('/buku')->with('success', '✅ Data buku berhasil ditambahkan.');
    }

    // ✏️ Edit data buku
    public function bukuedit($id_buku, Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul'     => 'required',
            'pengarang' => 'required',
            'kategori'  => 'required'
        ]);

        $buku = BukuModel::findOrFail($id_buku);
        $buku->update($request->only(['kode_buku', 'judul', 'pengarang', 'kategori']));

        return redirect()->back()->with('success', '✏️ Data buku berhasil diperbarui.');
    }

    // 🗑️ Hapus data buku
    public function bukuhapus($id_buku)
    {
        $buku = BukuModel::findOrFail($id_buku);
        $buku->delete();

        return redirect()->back()->with('success', '🗑️ Data buku berhasil dihapus.');
    }
}
