<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class SejarahController extends Controller
{
    public function index(Request $request)
    {

        $sejarah = Sejarah::orderBy('id_sejarah', 'asc')
            ->when($request->q, function ($query, $sejarah) {
                return $query->where('judul_sejarah', 'like', "%$sejarah%");
            })
            ->paginate(10);

        return view('pages.sejarah.index', compact('sejarah', 'request'));
    }

    public function create()
    {
        return view('pages.sejarah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_sejarah' => ['min:3'],
            'subjudul_sejarah' => ['min:3'],
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
            'deskripsi_sejarah' => ['min:5'],
        ]);

        if ($request->tag) {
            $image = $request->file('gambar')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/sejarah', $request->file('gambar'), $filename);

            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            Sejarah::create([
                'judul_sejarah' => $request->judul_sejarah,
                'subjudul_sejarah' => $request->subjudul_sejarah,
                'gambar' => $filename,
                'deskripsi_sejarah' => $request->deskripsi,
                'tag_sejarah' => $data2
            ]);
        } else {
            $image = $request->file('gambar')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/sejarah', $request->file('gambar'), $filename);

            Sejarah::create([
                'judul_sejarah' => $request->judul_sejarah,
                'subjudul_sejarah' => $request->subjudul_sejarah,
                'gambar' => $filename,
                'deskripsi_sejarah' => $request->deskripsi,
                'tag_sejarah' => " "
            ]);
        }

        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    public function detail($id_sejarah)
    {
        $sejarah = Sejarah::find($id_sejarah);
        $tags = explode(',', $sejarah->tag_sejarah);
        return view('pages.sejarah.detail', compact('sejarah', 'tags'));
    }

    public function edit($id_sejarah)
    {
        $sejarah = Sejarah::find($id_sejarah);
        $tags = explode(',', $sejarah->tag_sejarah);
        return view('pages.sejarah.edit', compact('sejarah', 'tags'));
    }

    public function update(Request $request, $id_sejarah)
    {
        $sejarah = Sejarah::find($id_sejarah);
        $request->validate([
            'judul_sejarah' => ['min:3'],
            'subjudul_sejarah' => ['min:3'],
            'deskripsi_sejarah' => ['min:5'],
        ]);

        $data = '';
        foreach ($request->tag as $item => $values) {
            $data .= $values . ',';
        }
        $data2 = substr($data, 0, -1);

        $sejarah->update([
            'judul_sejarah' => $request->judul_sejarah,
            'subjudul_sejarah' => $request->subjudul_sejarah,
            'deskripsi_sejarah' => $request->deskripsi,
            'tag_sejarah' => $data2
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function editGambar($id_sejarah)
    {
        $sejarah = Sejarah::find($id_sejarah);
        return view('pages.sejarah.editGambar', compact('sejarah'));
    }

    public function updateGambar(Request $request, $id_sejarah)
    {
        $sejarah = Sejarah::find($id_sejarah);
        $request->validate([
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
        ]);

        $path = Storage::delete('public/images/sejarah/' . $sejarah->gambar);
        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/sejarah', $request->file('gambar'), $filename);

        $sejarah->update([
            'gambar' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }

    public function destroy($id_sejarah)
    {
        $sejarah = Sejarah::find($id_sejarah);
        $path = Storage::delete('public/images/sejarah/' . $sejarah->gambar);
        $sejarah->delete();
        return back();
    }
}
