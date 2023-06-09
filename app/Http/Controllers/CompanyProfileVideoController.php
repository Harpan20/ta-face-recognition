<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfileVideo;
use App\Http\Requests\StoreCompanyProfileVideoRequest;
use App\Http\Requests\UpdateCompanyProfileVideoRequest;

class CompanyProfileVideoController extends Controller
{
    public function index()
    {
        return view('pages.company-profile-videos.index', [
            'company_profile_videos' => CompanyProfileVideo::latest()->paginate(8),
        ]);
    }

    public function create()
    {
        return view('pages.company-profile-videos.create');
    }

    public function store(StoreCompanyProfileVideoRequest $request)
    {
        $attr = $request->all();

        CompanyProfileVideo::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(CompanyProfileVideo $companyProfileVideo)
    {
    }

    public function edit(CompanyProfileVideo $companyProfileVideo)
    {
        return view('pages.company-profile-videos.edit', [
            'company_profile_video' => $companyProfileVideo,
        ]);
    }

    public function update(UpdateCompanyProfileVideoRequest $request, CompanyProfileVideo $companyProfileVideo)
    {
        $attr = $request->all();

        $companyProfileVideo->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(CompanyProfileVideo $companyProfileVideo)
    {
        $companyProfileVideo->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
