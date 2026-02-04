<?php

namespace App\Http\Controllers;

use App\Models\ProdukBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index(){
        $user = Auth::user();
        $produk = ProdukBuku::with(['nama_penulis', 'publisher'])
        ->;

        return view('dashboard', compact('user'));
    }

    public function show(){

    }
}
