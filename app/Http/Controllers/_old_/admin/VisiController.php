<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VisiRequest;
use App\Models\Visi;

class VisiController extends Controller
{
    public function index()
    {
        return view('pages.visi.index', [
            'visis' => Visi::get(),
        ]);
    }

    public function create()
    {
        return view('pages.visi.create');
    }

    public function store(VisiRequest $request)
    {
        $attr = $request->all();

        Visi::create($attr);

        return redirect()->back()->with('notif', 'Data berhasil ditambahkan');
    }

    public function edit(Visi $visi)
    {
        return view('pages.visi.edit', compact('visi'));
    }

    public function update(VisiRequest $request, Visi $visi)
    {
        $attr = $request->all();

        $visi->update($attr);

        return redirect()->back()->with('notif', 'Data berhasil dirubah');
    }

    public function destroy(Visi $visi)
    {
        $visi->delete();

        return redirect()->back()->with('notif', 'Data berhasil dihapus');
    }

    public function search()
    {
        $parameter = request('query');

        $visis = Visi::where('title', 'like', '%' . $parameter . '%')->get();

        return view('pages.visi.index', compact('visis'));
    }
}
