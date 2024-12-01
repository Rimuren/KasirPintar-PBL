<?php

namespace App\Http\Controllers;

use App\Models\poin;
use Illuminate\Http\Request;

class poinController extends Controller
{
    public function index()
    {
        $poins = poin::all();
        return view('poin.index', compact('poins'));
    }

    public function create()
    {
        return view('poin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'min_range' => 'required|integer',
            'max_range' => 'required|integer',
            'poin' => 'required|integer',
        ]);

        poin::create($request->all());

        return redirect()->route('poin.index');
    }

    public function show($id)
    {
        $poin = poin::findOrFail($id);
        return view('poin.show', compact('poin'));
    }

    public function edit($id)
    {
        $poin = poin::findOrFail($id);
        return view('poin.edit', compact('poin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'min_range' => 'required|integer',
            'max_range' => 'required|integer',
            'poin' => 'required|integer',
        ]);

        $poin = poin::findOrFail($id);
        $poin->update($request->all());

        return redirect()->route('poin.index');
    }

    public function destroy($id)
    {
        $poin = poin::findOrFail($id);
        $poin->delete();

        return redirect()->route('poin.index');
    }
}
