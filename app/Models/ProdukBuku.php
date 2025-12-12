<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_buku',
        'nama_penulis',
        'rating_buku',
        'slug',
        'isbn',
        'sinopsis',
        'publisher',
    ];
    protected $table = 'kumpulan_buku';

    public function KategoriBuku()
    {
        return $this->belongsToMany(KategoriBuku::class, 'buku_kategori_pivot', 'buku_id', 'kategori_id');
    }
}
