<?php

namespace App\Http\Controllers;

use App\Models\penukaran;
use App\Models\poin;
use App\Models\pelanggan;
use Illuminate\Http\Request;

class penukaranController extends Controller
{
    public function index()
    {
        $penukarans = penukaran::all();
        return view('penukaran.index', compact('penukarans'));
    }

    public function create()
    {
        $poin = poin::all();
        $pelanggans = pelanggan::all();
        return view('penukaran.create', compact('poin', 'pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPoin' => 'required|exists:poin,id',
            'idPelanggan' => 'required|exists:pelanggan,id',
            'jumlahPoin' => 'required|integer',
            'tglPenukaran' => 'required|date',
        ]);

        penukaran::create($request->all());

        return redirect()->route('penukaran.index');
    }

    public function show($id)
    {
        $penukaran = penukaran::findOrFail($id);
        return view('penukaran.show', compact('penukaran'));
    }

    public function edit($id)
    {
        $penukaran = penukaran::findOrFail($id);
        $poin = poin::all();
        $pelanggans = pelanggan::all();
        return view('penukaran.edit', compact('penukaran', 'poin', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idPoin' => 'required|exists:poin,id',
            'idPelanggan' => 'required|exists:pelanggan,id',
            'jumlahPoin' => 'required|integer',
            'tglPenukaran' => 'required|date',
        ]);

        $penukaran = penukaran::findOrFail($id);
        $penukaran->update($request->all());

        return redirect()->route('penukaran.index');
    }

    public function destroy($id)
    {
        $penukaran = penukaran::findOrFail($id);
        $penukaran->delete();

        return redirect()->route('penukaran.index');
    }
}
