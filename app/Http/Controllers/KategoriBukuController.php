<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use App\Models\ProdukBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProdukBuku::all();
        return view('kategori_produk.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori_produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        KategoriBuku::create($request->all());
        return redirect('/kategori_produk')->with('success', 'Produk berhasil ditambah');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        return view('kategori_produk.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        return view('kategori_produk.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->update($request->all());
        return redirect('/kategori_produk')->with('success', 'Data Berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = KategoriBuku::findOrFail($id);
        $kategori->delete();
    }
}
