<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Http\Requests\StoreAdvantageRequest;
use App\Http\Requests\UpdateAdvantageRequest;
use Illuminate\Support\Facades\Storage;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.advantages.index', [
            'advantages' => Advantage::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.advantages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvantageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvantageRequest $request)
    {
        $attr = $request->all();
        $attr['icon'] = $request->file('icon')->store('images/advantages');

        Advantage::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function edit(Advantage $advantage)
    {
        return view('pages.advantages.edit', [
            'advantage' => $advantage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvantageRequest  $request
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvantageRequest $request, Advantage $advantage)
    {
        $attr = $request->all();
        if ($request->file('icon')) {
            Storage::delete($advantage->icon);
            $icon = $request->file('icon')->store('images/advantages');
        } else {
            $icon = $advantage->icon;
        }
        $attr['icon'] = $icon;

        $advantage->update($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advantage  $advantage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advantage $advantage)
    {
        $advantage->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
