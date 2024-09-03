<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_barang', 'jumlah', 'keterangan'];
    public $timestamps = true;

    //relasi ke tabel
    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
    public function barang_keluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
    public function Pinjaman ()
    {
        return $this->hasMany(Pinjaman::class);
    }
    public function Pengembalian ()
    {
        return $this->hasMany(Pengembakian::class);
    }
}
