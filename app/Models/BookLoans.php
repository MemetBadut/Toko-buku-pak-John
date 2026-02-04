<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoans extends Model
{
    /** @use HasFactory<\Database\Factories\BookLoansFactory> */
    use HasFactory;

    protected $fillable = [
        'buku_id',
        'user_id',
        'borrowed_at',
        'due_at',
        'returned_at'
    ];

    protected $table = 'book_loans';

    public function ProdukBuku(){
        return $this->belongsTo(ProdukBuku::class, 'buku_id', 'id');
    }

}
