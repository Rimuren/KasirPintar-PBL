<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class pelangganController extends Controller
{
    // Menampilkan semua data pelanggan
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));  // Menampilkan data pelanggan ke dalam view
    }

    // Menampilkan form untuk membuat pelanggan baru
    public function create()
    {
        return view('pelanggan.create');  // Menampilkan form input data pelanggan
    }

    // Menyimpan pelanggan baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->namaPelanggan = $request->namaPelanggan;
        $pelanggan->noTlp = $request->noTlp;
        $pelanggan->email = $request->email;
        $pelanggan->save();

        return redirect()->route('pelanggan.index');  // Kembali ke halaman daftar pelanggan
    }

    // Menampilkan detail pelanggan berdasarkan ID
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.show', compact('pelanggan'));  // Menampilkan detail pelanggan ke dalam view
    }

    // Menampilkan form untuk mengedit data pelanggan
    public function edit($id)
    {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.edit', compact('pelanggan'));  // Menampilkan form edit
    }

    // Memperbarui data pelanggan di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'namaPelanggan' => 'required|string|max:255',
            'noTlp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $pelanggan = Pelanggan::find($id);
        $pelanggan->namaPelanggan = $request->namaPelanggan;
        $pelanggan->noTlp = $request->noTlp;
        $pelanggan->email = $request->email;
        $pelanggan->save();

        return redirect()->route('pelanggan.index');  // Kembali ke halaman daftar pelanggan
    }

    // Menghapus data pelanggan
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index');  // Kembali ke halaman daftar pelanggan
    }
}
