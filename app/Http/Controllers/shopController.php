<?php

namespace App\Http\Controllers;

use App\Models\shop;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {
        $shops = shop::all();
        return view('shop.index', compact('shops'));
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        shop::create($request->all());

        return redirect()->route('shop.index');
    }

    public function show($id)
    {
        $shop = shop::findOrFail($id);
        return view('shop.show', compact('shop'));
    }

    public function edit($id)
    {
        $shop = shop::findOrFail($id);
        return view('shop.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $shop = shop::findOrFail($id);
        $shop->update($request->all());

        return redirect()->route('shop.index');
    }

    public function destroy($id)
    {
        $shop = shop::findOrFail($id);
        $shop->delete();

        return redirect()->route('shop.index');
    }
}
