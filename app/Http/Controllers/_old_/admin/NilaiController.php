<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NilaiRequest;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        return view('pages.nilai.index', [
            'nilais' => Nilai::get(),
        ]);
    }

    public function create()
    {
        return view('pages.nilai.create');
    }

    public function store(NilaiRequest $request)
    {
        $attr = $request->all();

        Nilai::create($attr);

        return redirect()->back()->with('notif', 'Data berhasil ditambahkan');
    }

    public function edit(Nilai $nilai)
    {
        return view('pages.nilai.edit', compact('nilai'));
    }

    public function update(NilaiRequest $request, Nilai $nilai)
    {
        $attr = $request->all();

        $nilai->update($attr);

        return redirect()->back()->with('notif', 'Data berhasil dirubah');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->back()->with('notif', 'Data berhasil dihapus');
    }

    public function search()
    {
        $parameter = request('query');

        $nilais = Nilai::where('title', 'like', '%' . $parameter . '%')->get();

        return view('pages.nilai.index', compact('nilais'));
    }
}
