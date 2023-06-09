<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        return view('pages.clients.index', [
            'clients' => Client::latest()->paginate(12),
        ]);
    }

    public function create()
    {
        return view('pages.clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $attr = $request->all();
        $image = $request->file('image')->store('images/clients');
        $attr['image'] = $image;

        Client::create($attr);

        return redirect()->back()->with('success', __('Data added successfully'));
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        return view('pages.clients.edit', [
            'client' => $client,
        ]);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $attr = $request->all();
        if ($request->file('image')) {
            Storage::delete($client->image);
            $image = $request->file('image')->store('images/clients');
        } else {
            $image = $client->image;
        }
        $attr['image'] = $image;
        $client->update($attr);

        return redirect()->back()->with('success', __('Data edited successfully'));
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->back()->with('deleted', __('Data deleted successfully'));
    }
}
