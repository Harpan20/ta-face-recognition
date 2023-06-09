<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromoClaimRequest;
use App\Http\Resources\V1\PromoClaimSingleResource;
use App\Models\PromoClaim;
use Illuminate\Http\Request;

class PromoClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoClaimRequest $request)
    {
        $attr = $request->toArray();
        $promo_claim = PromoClaim::create($attr);

        return response()->json([
            'message' => __('Promo Claim was sent'),
            'data' => new PromoClaimSingleResource($promo_claim),
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PromoClaim  $promoClaim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromoClaim $promoClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromoClaim  $promoClaim
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoClaim $promoClaim)
    {
        //
    }
}
