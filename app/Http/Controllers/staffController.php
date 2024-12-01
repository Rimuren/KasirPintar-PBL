<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class staffController extends Controller
{
    public function index()
    {
        $staff = staff::all();
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaStaff' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'noTlp' => 'required|integer|unique:staff',
            'email' => 'string|email|unique:staff',
        ]);

        staff::create($request->all());

        return redirect()->route('staff.index');
    }

    public function show($id)
    {
        $staff = staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaStaff' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'noTlp' => 'required|integer|unique:staff,noTlp,' . $id,
            'email' => 'string|email|unique:staff,email,' . $id,
        ]);

        $staff = staff::findOrFail($id);
        $staff->update($request->all());

        return redirect()->route('staff.index');
    }

    public function destroy($id)
    {
        $staff = staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index');
    }
}
