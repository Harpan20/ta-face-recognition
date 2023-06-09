<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
    public function index()
    {
        return view('pages.countries.index', [
            'countries' => Country::orderBy('name')->paginate(10),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreCountryRequest $request)
    {
        //
    }

    public function show(Country $country)
    {
        //
    }

    public function edit(Country $country)
    {
        //
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        //
    }

    public function destroy(Country $country)
    {
        //
    }
}
