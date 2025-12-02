<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBuku extends Model
{
    use HasFactory;

    protected $fillable = ['nama_buku', 'nama_penulis', 'kategori_buku', 'rating_buku'];
    protected $table = 'kumpulan_buku';

    public function KategoriBuku(){
        return $this->hasMany(KategoriBuku::class);
    }
}
