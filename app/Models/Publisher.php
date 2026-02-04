<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_publisher',
        'alamat_publisher',
        'telepon_publisher'
    ];

    protected $table = 'publisher';

    public function produkBuku(){
        return $this->hasMany(ProdukBuku::class, 'publisher_id');
    }
}
