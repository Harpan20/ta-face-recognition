<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;

class PositionController extends Controller
{
    public function index()
    {
        return view('pages.positions.index', [
            'positions' => Position::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.positions.create');
    }

    public function store(StorePositionRequest $request)
    {
        $attr = $request->all();

        Position::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Position $position)
    {
        //
    }

    public function edit(Position $position)
    {
        return view('pages.positions.edit', compact('position'));
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $attr = $request->all();

        $position->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
