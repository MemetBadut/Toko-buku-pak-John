<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_buku',
        'author_id',
        'rating_buku',
        'slug',
        'isbn',
        'sinopsis',
        'publisher',
    ];
    protected $table = 'kumpulan_buku';

    public function kategoriBuku()
    {
        return $this->belongsToMany(KategoriBuku::class, 'buku_kategori_pivot', 'buku_id', 'kategori_id');
    }

    public function authorBuku(){
        return $this->belongsTo(AuthorBuku::class, 'author_id');
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
