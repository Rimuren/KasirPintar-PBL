<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Models\barang;
use App\Models\supplier;
use App\Models\transaksi;
use Illuminate\Http\Request;

class pembelianController extends Controller
{
    public function index()
    {
        $pembelians = pembelian::all();
        return view('pembelian.index', compact('pembelians'));
    }

    public function create()
    {
        $barangs = barang::all();
        $suppliers = supplier::all();
        $transaksis = transaksi::all();
        return view('pembelian.create', compact('barangs', 'suppliers', 'transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idtransaksi' => 'required|exists:transaksi,id',
            'idbarang' => 'required|exists:barang,id',
            'idsupplier' => 'required|exists:supplier,id',
            'quantity' => 'required|integer',
            'tglPembelian' => 'required|date',
        ]);

        pembelian::create($request->all());

        return redirect()->route('pembelian.index');
    }

    public function show($id)
    {
        $pembelian = pembelian::findOrFail($id);
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit($id)
    {
        $pembelian = pembelian::findOrFail($id);
        $barangs = barang::all();
        $suppliers = supplier::all();
        $transaksis = transaksi::all();
        return view('pembelian.edit', compact('pembelian', 'barangs', 'suppliers', 'transaksis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idtransaksi' => 'required|exists:transaksi,id',
            'idbarang' => 'required|exists:barang,id',
            'idsupplier' => 'required|exists:supplier,id',
            'quantity' => 'required|integer',
            'tglPembelian' => 'required|date',
        ]);

        $pembelian = pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelian.index');
    }

    public function destroy($id)
    {
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index');
    }
}
