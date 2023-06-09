<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Struktur;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class StrukturController extends Controller
{
    public function index(Request $request)
    {

        $struktur = Struktur::orderBy('id_struktur', 'asc')
            ->paginate(10);
        $publish = Struktur::where('status', 'Publish')
            ->paginate(10);
        $nopublish = Struktur::where('status', 'Tidak Publish')
            ->paginate(10);
        Paginator::useBootstrap();
        return view('pages.struktur.index', compact('struktur', 'publish', 'nopublish', 'request'));
    }

    public function create()
    {

        return view('pages.struktur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['min:3'],
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
            'jabatan' => ['min:3'],
        ]);

        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/struktur', $request->file('gambar'), $filename);

        Struktur::create([
            'nama' => $request->nama,
            'gambar' => $filename,
            'jabatan' => $request->jabatan,
            'kategori_struktur' => $request->kategori_struktur
        ]);
        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function updateStatus(Request $request, $id_struktur)
    {

        $struktur = Struktur::find($id_struktur);
        $struktur->update([
            'status' => $request->status
        ]);
        session()->flash('notif', 'Status Berhasil diubah!');
        return back();
    }

    public function editStatus($id_struktur)
    {
        $struktur = Struktur::find($id_struktur);
        return view('pages.struktur.editStatus', compact('struktur'));
    }

    public function edit($id_struktur)
    {
        $struktur = Struktur::find($id_struktur);

        return view('pages.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, $id_struktur)
    {
        $struktur = Struktur::find($id_struktur);
        $request->validate([
            'nama' => ['min:3'],
            'jabatan' => ['min:3'],
        ]);
        $struktur->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kategori_struktur' => $request->kategori_struktur
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function destroy($id_struktur)
    {
        $struktur = Struktur::find($id_struktur);
        $struktur->delete();
        return back();
    }

    public function editGambar($id_struktur)
    {
        $struktur = Struktur::find($id_struktur);
        return view('pages.struktur.editGambar', compact('struktur'));
    }

    public function updateGambar(Request $request, $id_struktur)
    {
        $struktur = Struktur::find($id_struktur);
        $request->validate([
            'gambar' => ['mimes:jpg,jpeg,png,JPG']
        ]);

        $path = Storage::delete('public/images/struktur/' . $struktur->gambar);
        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/struktur', $request->file('gambar'), $filename);
        $struktur->update([
            'gambar' => $filename
        ]);
        session()->flash('notif', 'Gambar Berhasil diubah!');
        return back();
    }
}
