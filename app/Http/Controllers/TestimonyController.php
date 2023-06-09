<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    public function index()
    {
        return view('pages.testimonies.index', [
            'testimonies' => Testimony::latest()->paginate(12),
        ]);
    }

    public function create()
    {
        return view('pages.testimonies.create');
    }

    public function store(StoreTestimonyRequest $request)
    {
        $attr = $request->all();
        $image = $request->file('image')->store('images/testimonies');
        $attr['image'] = $image;

        Testimony::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Testimony $testimony)
    {
        //
    }

    public function edit(Testimony $testimony)
    {
        return view('pages.testimonies.edit', [
            'testimony' => $testimony,
        ]);
    }

    public function update(UpdateTestimonyRequest $request, Testimony $testimony)
    {
        $attr = $request->all();
        if ($request->file('image')) {
            Storage::delete($testimony->image);
            $image = $request->file('image')->store('images/testimonies');
        } else {
            $image = $testimony->image;
        }
        $attr['image'] = $image;
        $testimony->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Testimony $testimony)
    {
        $testimony->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
