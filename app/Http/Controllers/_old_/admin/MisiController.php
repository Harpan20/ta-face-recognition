<?php

namespace App\Http\Controllers\admin;

use App\Models\Misi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MisiRequest;

class MisiController extends Controller
{
    public function index()
    {
        return view('pages.misi.index', [
            'misis' => Misi::get(),
        ]);
    }

    public function create()
    {
        return view('pages.misi.create');
    }

    public function store(MisiRequest $request)
    {
        $attr = $request->all();

        Misi::create($attr);

        return redirect()->back()->with('notif', 'Data berhasil ditambahkan');
    }

    public function edit(Misi $misi)
    {
        return view('pages.misi.edit', compact('misi'));
    }

    public function update(MisiRequest $request, Misi $misi)
    {
        $attr = $request->all();

        $misi->update($attr);

        return redirect()->back()->with('notif', 'Data berhasil dirubah');
    }

    public function destroy(Misi $misi)
    {
        $misi->delete();

        return redirect()->back()->with('notif', 'Data berhasil dihapus');
    }

    public function search()
    {
        $parameter = request('query');

        $misis = Misi::where('body', 'like', '%' . $parameter . '%')->get();

        return view('pages.misi.index', compact('misis'));
    }
}
