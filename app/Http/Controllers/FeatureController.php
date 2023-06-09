<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;

class FeatureController extends Controller
{
    public function index()
    {
        return view('pages.features.index', [
            'features' => Feature::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.features.create');
    }

    public function store(StoreFeatureRequest $request)
    {
        $attr = $request->all();

        Feature::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Feature $feature)
    {
    }

    public function edit(Feature $feature)
    {
        return view('pages.features.edit', [
            'feature' => $feature,
        ]);
    }

    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $attr = $request->all();

        $feature->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
