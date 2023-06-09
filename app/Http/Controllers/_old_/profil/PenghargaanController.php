<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penghargaan;
use Illuminate\Pagination\Paginator;

class PenghargaanController extends Controller
{
    public function index(Request $request)
    {

        $penghargaan = Penghargaan::orderBy('id_penghargaan', 'asc')
            ->when($request->q, function ($query, $penghargaan) {
                return $query->where('penghargaan', 'like', "%$penghargaan%");
            })
            ->paginate(10);

        return view('pages.penghargaan.index', compact('penghargaan', 'request'));
    }

    public function create()
    {
        return view('pages.penghargaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penghargaan' => ['min:3'],
            'penyelenggara' => ['min:3'],
            'deskripsi_penghargaan' => ['min:5']
        ]);

        Penghargaan::create([
            'penghargaan' => $request->penghargaan,
            'penyelenggara' => $request->penyelenggara,
            'deskripsi_penghargaan' => $request->deskripsi_penghargaan
        ]);
        session()->flash('notif', 'Data Berhasil ditambahkan');
        return back();
    }

    public function detail($id_penghargaan)
    {
        $penghargaan = Penghargaan::find($id_penghargaan);
        return view('pages.penghargaan.detail', compact('penghargaan'));
    }

    public function edit($id_penghargaan)
    {
        $penghargaan = Penghargaan::find($id_penghargaan);
        return view('pages.penghargaan.edit', compact('penghargaan'));
    }

    public function update(Request $request, $id_penghargaan)
    {
        $penghargaan = Penghargaan::find($id_penghargaan);
        $request->validate([
            'penghargaan' => ['min:3'],
            'penyelenggara' => ['min:3'],
            'deskripsi_penghargaan' => ['min:5']
        ]);
        $penghargaan->update([
            'penghargaan' => $request->penghargaan,
            'penyelenggara' => $request->penyelenggara,
            'deskripsi_penghargaan' => $request->deskripsi_penghargaan
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function destroy($id_penghargaan)
    {
        $penghargaan = Penghargaan::find($id_penghargaan);
        $penghargaan->delete();
        return back();
    }
}
