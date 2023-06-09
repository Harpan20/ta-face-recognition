<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        return view('pages.missions.index', [
            'missions' => Mission::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.missions.create');
    }

    public function store(MissionRequest $request)
    {
        $attr = $request->all();

        Mission::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Mission $mission)
    {
        //
    }

    public function edit(Mission $mission)
    {
        return view('pages.missions.edit', compact('mission'));
    }

    public function update(MissionRequest $request, Mission $mission)
    {
        $attr = $request->all();

        $mission->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Mission $mission)
    {
        $mission->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
