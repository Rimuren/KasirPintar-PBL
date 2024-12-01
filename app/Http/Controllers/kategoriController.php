<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
        $kategoris = kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        kategori::create($request->all());

        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKategori' => 'required|string|max:255',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
