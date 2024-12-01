<?php

namespace App\Http\Controllers;

use App\Models\merk;
use Illuminate\Http\Request;

class merkController extends Controller
{
    public function index()
    {
        $merks = merk::all();
        return view('merk.index', compact('merks'));
    }

    public function create()
    {
        return view('merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMerk' => 'required|string|max:255',
        ]);

        merk::create($request->all());

        return redirect()->route('merk.index');
    }

    public function show($id)
    {
        $merk = merk::findOrFail($id);
        return view('merk.show', compact('merk'));
    }

    public function edit($id)
    {
        $merk = merk::findOrFail($id);
        return view('merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaMerk' => 'required|string|max:255',
        ]);

        $merk = merk::findOrFail($id);
        $merk->update($request->all());

        return redirect()->route('merk.index');
    }

    public function destroy($id)
    {
        $merk = merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('merk.index');
    }
}
