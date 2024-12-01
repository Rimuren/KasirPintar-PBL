<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    public function index()
    {
        $suppliers = supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaSupplier' => 'required|string|max:255',
            'noTlp' => 'required|integer|unique:supplier',
            'email' => 'required|string|email|unique:supplier',
        ]);

        supplier::create($request->all());

        return redirect()->route('supplier.index');
    }

    public function show($id)
    {
        $supplier = supplier::findOrFail($id);
        return view('supplier.show', compact('supplier'));
    }

    public function edit($id)
    {
        $supplier = supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaSupplier' => 'required|string|max:255',
            'noTlp' => 'required|integer|unique:supplier,noTlp,' . $id,
            'email' => 'required|string|email|unique:supplier,email,' . $id,
        ]);

        $supplier = supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('supplier.index');
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index');
    }
}
