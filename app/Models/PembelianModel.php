<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianModel extends Model
{
    use HasFactory;

    protected $table = "pembelian";

    // PERBAIKAN: Mengubah primarykey menjadi primaryKey (huruf K besar) dan menambah titik koma
    protected $primaryKey = "id_pembelian";

    protected $fillable = ['id_pembelian', 'id_petugas', 'id_anggota', 'id_buku', 'qty', 'harga'];

    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'id_petugas');
    }

    //relasi ke anggota
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'id_anggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'id_buku');
    }
}