<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('pages.categories.index', [
            'categories' => Category::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug($request->name) . '-' . uniqid();
        Category::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attr = $request->all();

        $isSameName = ($request->name == $category->name);
        $isSameName
            ? $attr['slug'] = $category['slug']
            : $attr['slug'] = Str::slug($request->name) . '-' . uniqid();

        $category->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
