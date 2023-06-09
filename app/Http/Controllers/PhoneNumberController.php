<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use App\Http\Requests\StorePhoneNumberRequest;
use App\Http\Requests\UpdatePhoneNumberRequest;
use App\Models\Country;

class PhoneNumberController extends Controller
{
    public function index()
    {
        $phone_numbers = tap(PhoneNumber::with('country')->latest()->paginate(10))
            ->map(function ($phone_number) {
                $is_main_phone_number = $phone_number->is_main === 1;
                $is_main_phone_number
                    ? $phone_number->is_main = __('Main')
                    : $phone_number->is_main = __('Additional');

                return $phone_number;
            });
        return view('pages.phone-numbers.index', [
            'phone_numbers' => $phone_numbers,
        ]);
    }

    public function create()
    {
        return view('pages.phone-numbers.create', [
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function store(StorePhoneNumberRequest $request)
    {
        $attr = $request->all();

        PhoneNumber::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(PhoneNumber $phoneNumber)
    {
        //
    }

    public function edit(PhoneNumber $phoneNumber)
    {
        return view('pages.phone-numbers.edit', [
            'phoneNumber' => $phoneNumber,
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function update(UpdatePhoneNumberRequest $request, PhoneNumber $phoneNumber)
    {
        $attr = $request->all();

        $phoneNumber->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(PhoneNumber $phoneNumber)
    {
        $phoneNumber->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
