<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\merk;
use App\Models\kategori;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function index()
    {
        $barangs = barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $merks = merk::all();
        $kategoris = kategori::all();
        return view('barang.create', compact('merks', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idmerk' => 'required|exists:merk,id',
            'idkategori' => 'required|exists:kategori,id',
            'namaBarang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'hargaBeli' => 'required|numeric',
            'hargaJual' => 'required|numeric',
        ]);

        barang::create($request->all());

        return redirect()->route('barang.index');
    }

    public function show($id)
    {
        $barang = barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = barang::findOrFail($id);
        $merks = merk::all();
        $kategoris = kategori::all();
        return view('barang.edit', compact('barang', 'merks', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idmerk' => 'required|exists:merk,id',
            'idkategori' => 'required|exists:kategori,id',
            'namaBarang' => 'required|string|max:255',
            'stok' => 'required|integer',
            'hargaBeli' => 'required|numeric',
            'hargaJual' => 'required|numeric',
        ]);

        $barang = barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        $barang = barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index');
    }
}
