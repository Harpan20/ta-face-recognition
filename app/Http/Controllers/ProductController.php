<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Benefit;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Support;
use App\Models\Advantage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.products.index', [
            'products' => Product::with('features', 'benefits', 'advantages', 'supports', 'faqs')->latest()->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create', [
            'features' => Feature::orderBy('name')->get(),
            'benefits' => Benefit::orderBy('name')->get(),
            'advantages' => Advantage::orderBy('name')->get(),
            'supports' => Support::orderBy('name')->get(),
            'faqs' => Faq::orderBy('question')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $attr = $request->all();
        // dd($attr);

        // get and store image
        $image_hero = $request->file('image_hero')->store('images/products');
        $image_feature = $request->file('image_feature')->store('images/products');
        $image_benefit = $request->file('image_benefit')->store('images/products');
        $image_benefit_mobile = $request->file('image_benefit_mobile')->store('images/products');

        // hiject
        $attr['image_hero'] = $image_hero;
        $attr['image_feature'] = $image_feature;
        $attr['image_benefit'] = $image_benefit;
        $attr['image_benefit_mobile'] = $image_benefit_mobile;

        $product = Product::create($attr);

        // attach for relationship
        $product->features()->attach(request('features'));
        $product->benefits()->attach(request('benefits'));
        $product->advantages()->attach(request('advantages'));
        $product->supports()->attach(request('supports'));
        $product->faqs()->attach(request('faqs'));

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit', [
            'product' => $product,
            'features' => Feature::orderBy('name')->get(),
            'benefits' => Benefit::orderBy('name')->get(),
            'advantages' => Advantage::orderBy('name')->get(),
            'supports' => Support::orderBy('name')->get(),
            'faqs' => Faq::orderBy('question')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $attr = $request->all();

        /*
         * get and store image
         * check there is new image
         * if there is new image, image from storage will be delete, and change to new image
         * if there is no new image, value will be the same as before
        */
        if ($request->file('image_hero')) {
            Storage::delete($product->image_hero);
            $image_hero = $request->file('image_hero')->store('images/products');
        } else {
            $image_hero = $product->image_hero;
        }

        if ($request->file('image_feature')) {
            Storage::delete($product->image_feature);
            $image_feature = $request->file('image_feature')->store('images/products');
        } else {
            $image_feature = $product->image_feature;
        }

        if ($request->file('image_benefit')) {
            Storage::delete($product->image_benefit);
            $image_benefit = $request->file('image_benefit')->store('images/products');
        } else {
            $image_benefit = $product->image_benefit;
        }

        if ($request->file('image_benefit_mobile')) {
            Storage::delete($product->image_benefit_mobile);
            $image_benefit_mobile = $request->file('image_benefit_mobile')->store('images/products');
        } else {
            $image_benefit_mobile = $product->image_benefit_mobile;
        }

        // hiject
        $attr['image_hero'] = $image_hero;
        $attr['image_feature'] = $image_feature;
        $attr['image_benefit'] = $image_benefit;
        $attr['image_benefit_mobile'] = $image_benefit_mobile;

        $product->update($attr);

        // sync for relationship
        $product->features()->sync(request('features'));
        $product->benefits()->sync(request('benefits'));
        $product->advantages()->sync(request('advantages'));
        $product->supports()->sync(request('supports'));
        $product->faqs()->sync(request('faqs'));

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // for force delete
        // $product->features()->detach(request('features'));
        // $product->benefits()->detach(request('benefits'));
        // $product->advantages()->detach(request('advantages'));
        // $product->supports()->detach(request('supports'));
        // $product->faqs()->detach(request('faqs'));

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
