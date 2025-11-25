<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetugasModel;

class PetugasController extends Controller
{
    // 📘 Tampil data petugas
    public function petugastampil()
    {
        $datapetugas = PetugasModel::orderBy('kode_petugas', 'ASC')->paginate(5);
        return view('halaman.view_petugas', ['petugas' => $datapetugas]);
    }

    // ➕ Tambah data petugas
    public function petugastambah(Request $request)
    {
        $request->validate([
            'kode_petugas' => 'required',
            'nama_petugas' => 'required',
            'hp'           => 'required'
        ]);

        PetugasModel::create($request->only(['kode_petugas', 'nama_petugas', 'hp']));

        return redirect('/petugas')->with('success', '✅ Data petugas berhasil ditambahkan.');
    }

    // ✏️ Edit data petugas
    public function petugasedit($id_petugas, Request $request)
    {
        $request->validate([
            'kode_petugas' => 'required',
            'nama_petugas' => 'required',
            'hp'           => 'required'
        ]);

        $petugas = PetugasModel::findOrFail($id_petugas);
        $petugas->update($request->only(['kode_petugas', 'nama_petugas', 'hp']));

        return redirect()->back()->with('success', '✏️ Data petugas berhasil diperbarui.');
    }

    // 🗑️ Hapus data petugas
    public function petugashapus($id_petugas)
    {
        $petugas = PetugasModel::findOrFail($id_petugas);
        $petugas->delete();

        return redirect()->back()->with('success', '🗑️ Data petugas berhasil dihapus.');
    }
}
