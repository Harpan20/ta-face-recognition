<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        return view('pages.emails.index', [
            'emails' => Email::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('pages.emails.create');
    }

    public function store(EmailRequest $request)
    {
        $attr = $request->all();

        Email::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Email $email)
    {
        //
    }

    public function edit(Email $email)
    {
        return view('pages.emails.edit', compact('email'));
    }

    public function update(EmailRequest $request, Email $email)
    {
        $attr = $request->all();

        $email->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Email $email)
    {
        $email->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
