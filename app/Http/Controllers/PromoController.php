<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Http\Requests\StorePromoRequest;
use App\Http\Requests\UpdatePromoRequest;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.promos.index', [
            'promos' => Promo::latest()->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.promos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePromoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromoRequest $request)
    {
        $attr = $request->all();
        // dd($attr);

        // get and store image
        $image_desktop = $request->file('image_desktop')->store('images/promos');
        $image_mobile = $request->file('image_mobile')->store('images/promos');

        // hiject
        $attr['image_desktop'] = $image_desktop;
        $attr['image_mobile'] = $image_mobile;

        Promo::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view('pages.promos.edit', [
            'promo' => $promo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePromoRequest  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePromoRequest $request, Promo $promo)
    {
        $attr = $request->all();

        /*
         * get and store image
         * check there is new image
         * if there is new image, image from storage will be delete, and change to new image
         * if there is no new image, value will be the same as before
        */
        if ($request->file('image_desktop')) {
            Storage::delete($promo->image_desktop);
            $image_desktop = $request->file('image_desktop')->store('images/promos');
        } else {
            $image_desktop = $promo->image_desktop;
        }

        if ($request->file('image_mobile')) {
            Storage::delete($promo->image_mobile);
            $image_mobile = $request->file('image_mobile')->store('images/promos');
        } else {
            $image_mobile = $promo->image_mobile;
        }

        // hiject
        $attr['image_desktop'] = $image_desktop;
        $attr['image_mobile'] = $image_mobile;

        $promo->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
