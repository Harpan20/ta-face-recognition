<?php

namespace App\Http\Controllers;

use App\Models\PromoClaim;
use App\Http\Requests\StorePromoClaimRequest;
use App\Http\Requests\UpdatePromoClaimRequest;
use App\Models\Country;
use App\Models\Product;

class PromoClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.promo-claims.index', [
            'promo_claims' => PromoClaim::with('country', 'product')->latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pages.promo-claims.create', [
        //     'countries' => Country::orderBy('name')->get(),
        //     'products' => Product::orderBy('name')->get(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromoClaimRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoClaimRequest $request)
    {
        // $attr = $request->all();

        // PromoClaim::create($attr);

        // return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PromoClaim  $promoClaim
     * @return \Illuminate\Http\Response
     */
    public function show(PromoClaim $promoClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PromoClaim  $promoClaim
     * @return \Illuminate\Http\Response
     */
    public function edit(PromoClaim $promoClaim)
    {
        // return view('pages.promo-claims.edit', [
        //     'promo_claim' => $promoClaim,
        //     'countries' => Country::orderBy('name')->get(),
        //     'products' => Product::orderBy('name')->get(),
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromoClaimRequest  $request
     * @param  \App\Models\PromoClaim  $promoClaim
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromoClaimRequest $request, PromoClaim $promoClaim)
    {
        // $attr = $request->all();

        // $promoClaim->update($attr);

        // return redirect()->back()->with('success', __('Data edited successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromoClaim  $promoClaim
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoClaim $promoClaim)
    {
        $promoClaim->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
