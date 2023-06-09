<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisionRequest;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.visions.index', [
            'visions' => Vision::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.visions.create');
    }

    public function store(VisionRequest $request)
    {
        $attr = $request->all();

        Vision::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Vision $vision)
    {
        //
    }

    public function edit(Vision $vision)
    {
        return view('pages.visions.edit', compact('vision'));
    }

    public function update(VisionRequest $request, Vision $vision)
    {
        $attr = $request->all();

        $vision->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Vision $vision)
    {
        $vision->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
