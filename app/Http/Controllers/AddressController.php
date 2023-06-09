<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = tap(Address::latest()->paginate(10))
            ->map(function ($address) {
                $is_main_address = $address->is_main === 1;
                $is_main_address
                    ? $address->is_main = __('Main')
                    : $address->is_main = __('Additional');

                return $address;
            });
        return view('pages.addresses.index', [
            'addresses' => $addresses,
        ]);
    }

    public function create()
    {
        return view('pages.addresses.create');
    }

    public function store(StoreAddressRequest $request)
    {
        $attr = $request->all();

        Address::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Address $address)
    {
        //
    }

    public function edit(Address $address)
    {
        return view('pages.addresses.edit', [
            'address' => $address,
        ]);
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $attr = $request->all();

        $address->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
