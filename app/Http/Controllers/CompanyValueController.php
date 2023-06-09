<?php

namespace App\Http\Controllers;

use App\Models\CompanyValue;
use App\Http\Requests\StoreCompanyValueRequest;
use App\Http\Requests\UpdateCompanyValueRequest;
use Illuminate\Support\Facades\Storage;

class CompanyValueController extends Controller
{
    public function index()
    {
        return view('pages.company-values.index', [
            'company_values' => CompanyValue::latest()->paginate(12),
        ]);
    }

    public function create()
    {
        return view('pages.company-values.create');
    }

    public function store(StoreCompanyValueRequest $request)
    {
        $attr = $request->all();
        $image = $request->file('image')->store('images/company-values');
        $attr['image'] = $image;

        CompanyValue::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(CompanyValue $companyValue)
    {
        //
    }

    public function edit(CompanyValue $companyValue)
    {
        return view('pages.company-values.edit', [
            'company_value' => $companyValue,
        ]);
    }

    public function update(UpdateCompanyValueRequest $request, CompanyValue $companyValue)
    {
        $attr = $request->all();
        if ($request->file('image')) {
            Storage::delete($companyValue->image);
            $image = $request->file('image')->store('images/company-values');
        } else {
            $image = $companyValue->image;
        }
        $attr['image'] = $image;
        $companyValue->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(CompanyValue $companyValue)
    {
        $companyValue->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
