<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use App\Models\ProdukBuku;
use Illuminate\Http\Request;

class ProdukBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        // $data_buku = ProdukBuku::query();
        $data_buku = ProdukBuku::with('KategoriBuku');

        if ($keyword) {
            $data_buku = $data_buku->where('nama_buku', 'like', "%{$keyword}%")
                ->orWhere('nama_penulis', 'like', "%{$keyword}%");
        }

        $data_buku = $data_buku->orderByDesc('id')->paginate(5);


        return view('data_produk.index', compact('data_buku'));
    }

    public function test()
    {
        $data_test = ProdukBuku::all();
        $data_test = ProdukBuku::paginate(5);
        return view('data_produk.test', compact('data_test'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriBuku::all();
        $kategori = KategoriBuku::pluck('id');
        return view('data_produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukBuku $data_produk)
    {
        return view('data_produk.show', compact('data_produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukBuku $data_produk)
    {
        return view('data_produk.edit', compact('data_produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = ProdukBuku::findOrFail($id);
        $buku->update($request->all());
        return redirect('/data_produk')->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = ProdukBuku::findOrFail($id);
        $buku->delete();
    }
}
