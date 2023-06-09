<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        return view('pages.teams.index', [
            'teams' => Team::with('position')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.teams.create', [
            'positions' => Position::orderBy('name')->get(),
        ]);
    }

    public function store(StoreTeamRequest $request)
    {
        $attr = $request->all();
        $image = $request->file('image')->store('images/teams');
        $attr['image'] = $image;

        Team::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Team $team)
    {
        //
    }

    public function edit(Team $team)
    {
        return view('pages.teams.edit', [
            'team' => $team,
            'positions' => Position::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        $attr = $request->all();
        if ($request->file('image')) {
            Storage::delete($team->image);
            $image = $request->file('image')->store('images/teams');
        } else {
            $image = $team->image;
        }
        $attr['image'] = $image;
        $team->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
