<?php

namespace App\Http\Controllers;

use App\Models\opname;
use App\Models\barang;
use Illuminate\Http\Request;

class opnameController extends Controller
{
    public function index()
    {
        $opnames = opname::all();
        return view('opname.index', compact('opnames'));
    }

    public function create()
    {
        $barangs = barang::all();
        return view('opname.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'quantity' => 'required|integer',
            'tglOpname' => 'required|date',
        ]);

        opname::create($request->all());

        return redirect()->route('opname.index');
    }

    public function show($id)
    {
        $opname = opname::findOrFail($id);
        return view('opname.show', compact('opname'));
    }

    public function edit($id)
    {
        $opname = opname::findOrFail($id);
        $barangs = barang::all();
        return view('opname.edit', compact('opname', 'barangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'quantity' => 'required|integer',
            'tglOpname' => 'required|date',
        ]);

        $opname = opname::findOrFail($id);
        $opname->update($request->all());

        return redirect()->route('opname.index');
    }

    public function destroy($id)
    {
        $opname = opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opname.index');
    }
}
