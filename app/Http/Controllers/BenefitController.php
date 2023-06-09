<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Http\Requests\StoreBenefitRequest;
use App\Http\Requests\UpdateBenefitRequest;
use Illuminate\Support\Facades\Storage;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.benefits.index', [
            'benefits' => Benefit::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.benefits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBenefitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBenefitRequest $request)
    {
        $attr = $request->all();
        $attr['icon'] = $request->file('icon')->store('images/benefits');

        Benefit::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefit $benefit)
    {
        return view('pages.benefits.edit', [
            'benefit' => $benefit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBenefitRequest  $request
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBenefitRequest $request, Benefit $benefit)
    {
        $attr = $request->all();
        if ($request->file('icon')) {
            Storage::delete($benefit->icon);
            $icon = $request->file('icon')->store('images/benefits');
        } else {
            $icon = $benefit->icon;
        }
        $attr['icon'] = $icon;

        $benefit->update($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefit $benefit)
    {
        $benefit->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
