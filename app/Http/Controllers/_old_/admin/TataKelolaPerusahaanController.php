<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TataKelolaPerusahaanRequest;
use App\Models\TataKelolaPerusahaan;
use Illuminate\Http\Request;

class TataKelolaPerusahaanController extends Controller
{
    public function index()
    {
        return view('pages.tata-kelola-perusahaan.index', [
            'tata_kelola_perusahaans' => TataKelolaPerusahaan::get(),
        ]);
    }

    public function create()
    {
        return view('pages.tata-kelola-perusahaan.create');
    }

    public function store(TataKelolaPerusahaanRequest $request)
    {
        $attr = $request->all();

        TataKelolaPerusahaan::create($attr);

        return redirect()->back()->with('notif', 'Data berhasil ditambahkan');
    }

    public function edit(TataKelolaPerusahaan $tata_kelola_perusahaan)
    {
        return view('pages.tata-kelola-perusahaan.edit', compact('tata_kelola_perusahaan'));
    }

    public function update(TataKelolaPerusahaanRequest $request, TataKelolaPerusahaan $tata_kelola_perusahaan)
    {
        $attr = $request->all();

        $tata_kelola_perusahaan->update($attr);

        return redirect()->back()->with('notif', 'Data berhasil dirubah');
    }

    public function destroy(TataKelolaPerusahaan $tata_kelola_perusahaan)
    {
        $tata_kelola_perusahaan->delete();

        return redirect()->back()->with('notif', 'Data berhasil dihapus');
    }

    public function search()
    {
        $parameter = request('query');

        $tata_kelola_perusahaans = TataKelolaPerusahaan::where('body', 'like', '%' . $parameter . '%')->get();

        return view('pages.tata-kelola-perusahaan.index', compact('tata_kelola_perusahaans'));
    }
}
