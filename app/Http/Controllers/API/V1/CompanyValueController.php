<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CompanyValueResource;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyValueResource::collection(CompanyValue::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyValue  $companyValue
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyValue $companyValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyValue  $companyValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyValue $companyValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyValue  $companyValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyValue $companyValue)
    {
        //
    }
}
