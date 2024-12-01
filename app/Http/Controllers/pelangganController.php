<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
    // Menampilkan semua pelanggan
    public function index()
    {
        $pelanggan = pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    // Menampilkan form untuk menambah pelanggan
    public function create()
    {
        return view('pelanggan.create');
    }

    // Menyimpan pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'required|integer|unique:pelanggan',
            'email' => 'string|email|unique:pelanggan',
            'jumlahPoin' => 'integer',
        ]);

        pelanggan::create($request->all());

        return redirect()->route('pelanggan.index');
    }

    // Menampilkan detail pelanggan
    public function show($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    // Menampilkan form untuk mengedit pelanggan
    public function edit($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Mengupdate data pelanggan
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'required|integer|unique:pelanggan,noTlp,' . $id,
            'email' => 'string|email|unique:pelanggan,email,' . $id,
            'jumlahPoin' => 'integer',
        ]);

        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index');
    }

    // Menghapus pelanggan
    public function destroy($id)
    {
        $pelanggan = pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index');
    }
}
