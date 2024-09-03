<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    
    protected $filtlabel =['id','id_barang', 'tanggal_pengembalian', 'nama_peminjam', 'jumlah','status'];
    public $timestamps = true;

     //relasi ke tabel
     public function barangs()
     {
         return $this->belongsTo(Barang::class, 'id_barang');
     }
}
