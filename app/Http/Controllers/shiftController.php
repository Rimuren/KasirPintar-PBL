<?php

namespace App\Http\Controllers;

use App\Models\shift;
use Illuminate\Http\Request;

class shiftController extends Controller
{
    public function index()
    {
        $shifts = shift::all();
        return view('shift.index', compact('shifts'));
    }

    public function create()
    {
        return view('shift.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'staff_id' => 'required|exists:staff,id',
        ]);

        shift::create($request->all());

        return redirect()->route('shift.index');
    }

    public function show($id)
    {
        $shift = shift::findOrFail($id);
        return view('shift.show', compact('shift'));
    }

    public function edit($id)
    {
        $shift = shift::findOrFail($id);
        return view('shift.edit', compact('shift'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'staff_id' => 'required|exists:staff,id',
        ]);

        $shift = shift::findOrFail($id);
        $shift->update($request->all());

        return redirect()->route('shift.index');
    }

    public function destroy($id)
    {
        $shift = shift::findOrFail($id);
        $shift->delete();

        return redirect()->route('shift.index');
    }
}
