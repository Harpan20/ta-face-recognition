<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CompanyProfileVideoResource;
use App\Models\CompanyProfileVideo;
use Illuminate\Http\Request;

class CompanyProfileVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyProfileVideoResource::collection(CompanyProfileVideo::get());
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
     * @param  \App\Models\CompanyProfileVideo  $companyProfileVideo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyProfileVideo $companyProfileVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyProfileVideo  $companyProfileVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyProfileVideo $companyProfileVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyProfileVideo  $companyProfileVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfileVideo $companyProfileVideo)
    {
        //
    }
}
