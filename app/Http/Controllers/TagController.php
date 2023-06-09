<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
{
    public function index()
    {
        return view('pages.tags.index', [
            'tags' => Tag::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->name) . '-' . uniqid();
        Tag::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('pages.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $attr = $request->all();

        $isSameName = ($request->name == $tag->name);
        $isSameName
            ? $attr['slug'] = $tag['slug']
            : $attr['slug'] = Str::slug($request->name) . '-' . uniqid();

        $tag->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
