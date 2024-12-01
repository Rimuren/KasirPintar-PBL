<?php

namespace App\Http\Controllers;

use App\Models\cashDrawer;
use Illuminate\Http\Request;

class cashDrawerController extends Controller
{
    public function index()
    {
        $cashdrawers = cashDrawer::all();
        return view('cashdrawer.index', compact('cashdrawers'));
    }

    public function create()
    {
        return view('cashdrawer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        cashDrawer::create($request->all());

        return redirect()->route('cashdrawer.index');
    }

    public function show($id)
    {
        $cashdrawer = cashDrawer::findOrFail($id);
        return view('cashdrawer.show', compact('cashdrawer'));
    }

    public function edit($id)
    {
        $cashdrawer = cashDrawer::findOrFail($id);
        return view('cashdrawer.edit', compact('cashdrawer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $cashdrawer = cashDrawer::findOrFail($id);
        $cashdrawer->update($request->all());

        return redirect()->route('cashdrawer.index');
    }

    public function destroy($id)
    {
        $cashdrawer = cashDrawer::findOrFail($id);
        $cashdrawer->delete();

        return redirect()->route('cashdrawer.index');
    }
}
