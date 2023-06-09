<?php

namespace App\Http\Controllers;

use App\Models\PostType;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostTypeRequest;
use App\Http\Requests\UpdatePostTypeRequest;

class PostTypeController extends Controller
{
    public function index()
    {
        return view('pages.post-types.index', [
            'post_types' => PostType::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.post-types.create');
    }

    public function store(StorePostTypeRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->name) . '-' . uniqid();
        PostType::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(PostType $postType)
    {
        //
    }

    public function edit(PostType $postType)
    {
        return view('pages.post-types.edit', [
            'post_type' => $postType,
        ]);
    }

    public function update(UpdatePostTypeRequest $request, PostType $postType)
    {
        $attr = $request->all();

        $isSameName = ($request->name == $postType->name);
        $isSameName
            ? $attr['slug'] = $postType['slug']
            : $attr['slug'] = Str::slug($request->name) . '-' . uniqid();

        $postType->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(PostType $postType)
    {
        $postType->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
