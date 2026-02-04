<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorBuku extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorBukuFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_author',
        'bio_author',
        'foto_author',
        'slug'
    ];

    protected $table = 'author_buku';

    public function produkBuku(){
        return $this->hasMany(ProdukBuku::class, 'nama_penulis', 'id');
    }
}
