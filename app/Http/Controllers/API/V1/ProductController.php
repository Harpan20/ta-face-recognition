<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ProductSingleResource;
use App\Models\Product;
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
        // return ProductResource::collection(Product::paginate(10));
        return ProductResource::collection(Product::orderBy('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $attr = $request->toArray();

        // hiject image
        $attr['image_hero'] = $request->file('image_hero')->store('images/products');
        $attr['image_feature'] = $request->file('image_feature')->store('images/products');
        $attr['image_benefit'] = $request->file('image_benefit')->store('images/products');
        $attr['image_benefit_mobile'] = $request->file('image_benefit_mobile')->store('images/products');

        $product = Product::create($attr);

        return response()->json([
            'message' => __('Product was created'),
            'product' => new ProductSingleResource($product),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductSingleResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $attr = $request->toArray();

        // hiject image
        if ($request->file('image_hero')) {
            Storage::delete($product->image_hero);
            $attr['image_hero'] = $request->file('image_hero')->store('images/products');
        } else {
            $attr['image_hero'] = $product->image_hero;
        }
        if ($request->file('image_feature')) {
            Storage::delete($product->image_feature);
            $attr['image_feature'] = $request->file('image_feature')->store('images/products');
        } else {
            $attr['image_feature'] = $product->image_feature;
        }
        if ($request->file('image_benefit')) {
            Storage::delete($product->image_benefit);
            $attr['image_benefit'] = $request->file('image_benefit')->store('images/products');
        } else {
            $attr['image_benefit'] = $product->image_benefit;
        }
        if ($request->file('image_benefit_mobile')) {
            Storage::delete($product->image_benefit_mobile);
            $attr['image_benefit_mobile'] = $request->file('image_benefit_mobile')->store('images/products');
        } else {
            $attr['image_benefit_mobile'] = $product->image_benefit_mobile;
        }

        $product->update($attr);

        return response()->json([
            'message' => __('Product was updated'),
            'product' => new ProductSingleResource($product),
        ]);
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

        return response()->json([
            'message' => __('Product was deleted'),
        ]);
    }
}
