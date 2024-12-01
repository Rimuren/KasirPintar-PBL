<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\pelanggan;
use App\Models\staff;
use Illuminate\Http\Request;

class transaksiController extends Controller
{
    public function index()
    {
        $transaksis = transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = pelanggan::all();
        $staffs = staff::all();
        return view('transaksi.create', compact('pelanggans', 'staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idPelanggan' => 'required|exists:pelanggan,id',
            'idStaff' => 'required|exists:staff,id',
            'namaTransaksi' => 'required|string|max:255',
            'tglTransaksi' => 'required|date',
            'totalTransaksi' => 'required|integer',
            'tipeTransaksi' => 'required|in:beli,tukar',
        ]);

        transaksi::create($request->all());

        return redirect()->route('transaksi.index');
    }

    public function show($id)
    {
        $transaksi = transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $pelanggans = pelanggan::all();
        $staffs = staff::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggans', 'staffs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idPelanggan' => 'required|exists:pelanggan,id',
            'idStaff' => 'required|exists:staff,id',
            'namaTransaksi' => 'required|string|max:255',
            'tglTransaksi' => 'required|date',
            'totalTransaksi' => 'required|integer',
            'tipeTransaksi' => 'required|in:beli,tukar',
        ]);

        $transaksi = transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index');
    }
}
