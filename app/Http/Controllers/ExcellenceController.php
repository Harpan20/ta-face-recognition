<?php

namespace App\Http\Controllers;

use App\Models\Excellence;
use App\Http\Requests\StoreExcellenceRequest;
use App\Http\Requests\UpdateExcellenceRequest;

class ExcellenceController extends Controller
{
    public function index()
    {
        return view('pages.excellences.index', [
            'excellences' => Excellence::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.excellences.create');
    }

    public function store(StoreExcellenceRequest $request)
    {
        $attr = $request->all();

        Excellence::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Excellence $excellence)
    {
        //
    }

    public function edit(Excellence $excellence)
    {
        return view('pages.excellences.edit', [
            'excellence' => $excellence,
        ]);
    }

    public function update(UpdateExcellenceRequest $request, Excellence $excellence)
    {
        $attr = $request->all();

        $excellence->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Excellence $excellence)
    {
        $excellence->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
