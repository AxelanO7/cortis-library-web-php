<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaModel;

class AnggotaController extends Controller
{
    // 📘 Tampil data anggota
    public function anggotatampil()
    {
        $dataanggota = AnggotaModel::orderBy('kode_anggota', 'ASC')->paginate(5);
        return view('halaman.view_anggota', ['anggota' => $dataanggota]);
    }

    // ➕ Tambah data anggota
    public function anggotatambah(Request $request)
    {
        $request->validate([
            'kode_anggota' => 'required',
            'nama_anggota' => 'required',
            'alamat'       => 'required',
            'hp'           => 'required'
        ]);

        AnggotaModel::create($request->only(['kode_anggota', 'nama_anggota', 'alamat', 'hp']));

        return redirect('/anggota')->with('success', '✅ Data anggota berhasil ditambahkan.');
    }

    // ✏️ Edit data anggota
    public function anggotaedit($id_anggota, Request $request)
    {
        $request->validate([
            'kode_anggota' => 'required',
            'nama_anggota' => 'required',
            'alamat'       => 'required',
            'hp'           => 'required'
        ]);

        $anggota = AnggotaModel::findOrFail($id_anggota);
        $anggota->update($request->only(['kode_anggota', 'nama_anggota', 'alamat', 'hp']));

        return redirect()->back()->with('success', '✏️ Data anggota berhasil diperbarui.');
    }

    // 🗑️ Hapus data anggota
    public function anggotahapus($id_anggota)
    {
        $anggota = AnggotaModel::findOrFail($id_anggota);
        $anggota->delete();

        return redirect()->back()->with('success', '🗑️ Data anggota berhasil dihapus.');
    }
}
