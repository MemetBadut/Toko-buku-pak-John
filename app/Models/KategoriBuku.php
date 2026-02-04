<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class KategoriBuku extends Model
{
    use HasFactory;
    protected $fillable = ['kategori_buku'];
    protected $table = 'kategori_buku';

    public function produkBuku(){
        return $this->belongsToMany(ProdukBuku::class, 'buku_kategori_pivot','kategori_id', 'buku_id');
    }
}


