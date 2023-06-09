<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use App\Http\Requests\StoreContactFormRequest;
use App\Http\Requests\UpdateContactFormRequest;
use App\Models\Country;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('pages.contact-forms.index', [
            'contact_forms' => ContactForm::with('country')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.contact-forms.create', [
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function store(StoreContactFormRequest $request)
    {
        $attr = $request->all();

        ContactForm::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(ContactForm $contactForm)
    {
        //
    }

    public function edit(ContactForm $contactForm)
    {
        return view('pages.contact-forms.edit', [
            'contact_form' => $contactForm,
            'countries' => Country::orderBy('name')->get(),
        ]);
    }

    public function update(UpdateContactFormRequest $request, ContactForm $contactForm)
    {
        $attr = $request->all();

        $contactForm->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(ContactForm $contactForm)
    {
        $contactForm->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
