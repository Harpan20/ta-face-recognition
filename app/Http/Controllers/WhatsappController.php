<?php

namespace App\Http\Controllers;

use App\Models\Whatsapp;
use App\Http\Requests\StoreWhatsappRequest;
use App\Http\Requests\UpdateWhatsappRequest;
use App\Models\Country;

class WhatsappController extends Controller
{
    public function index()
    {
        $whatsapps = tap(Whatsapp::with('country')->latest()->paginate(10))
            ->map(function ($whatsapp) {
                $is_main_whatsapp = $whatsapp->is_main === 1;
                $is_main_whatsapp
                    ? $whatsapp->is_main = __('Main')
                    : $whatsapp->is_main = __('Additional');

                return $whatsapp;
            });
        return view('pages.whatsapps.index', [
            'whatsapps' => $whatsapps,
        ]);
    }

    public function create()
    {
        return view('pages.whatsapps.create', [
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function store(StoreWhatsappRequest $request)
    {
        $attr = $request->all();

        Whatsapp::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Whatsapp $whatsapp)
    {
        //
    }

    public function edit(Whatsapp $whatsapp)
    {
        return view('pages.whatsapps.edit', [
            'whatsapp' => $whatsapp,
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateWhatsappRequest $request, Whatsapp $whatsapp)
    {
        $attr = $request->all();

        $whatsapp->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Whatsapp $whatsapp)
    {
        $whatsapp->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
