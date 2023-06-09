<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tentang;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function index(Request $request)
    {
        $tentangs = Tentang::orderBy('id_tentang', 'asc')
            ->when($request->q, function ($query, $tentang) {
                return $query->where('judul_tentang', 'like', "%$tentang%");
            })
            ->paginate(10);

        return view('pages.tentang.index', compact('tentangs', 'request'));
    }

    public function create()
    {
        return view('pages.tentang.create');
    }

    public function detail($id_tentang)
    {
        $tentang = Tentang::find($id_tentang);
        $tag  = explode(',', $tentang->tag_tentang);
        return view('pages.tentang.detail', compact('tentang', 'tag'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_tentang' => ['min:3'],
            'subjudul_tentang' => ['min:3'],
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
            'deskripsi_tentang' => ['min:5'],
        ]);


        if ($request->tag) {
            if ($request('gambar')) {
                $image = $request->file('gambar')->getClientOriginalExtension();
                $filename = uniqid() . '.' . $image;
                $path = Storage::putFileAs('public/images/tentang', $request->file('gambar'), $filename);

                $data = '';
                foreach ($request->tag as $item => $values) {
                    $data .= $values . ',';
                }
                $data2 = substr($data, 0, -1);

                Tentang::create([
                    'judul_tentang' => $request->judul_tentang,
                    'subjudul_tentang' => $request->subjudul_tentang,
                    'gambar' => $filename,
                    'deskripsi_tentang' => $request->deskripsi_tentang,
                    'tag_tentang' => $data2
                ]);
            } else {
                $data = '';
                foreach ($request->tag as $item => $values) {
                    $data .= $values . ',';
                }
                $data2 = substr($data, 0, -1);

                Tentang::create([
                    'judul_tentang' => $request->judul_tentang,
                    'subjudul_tentang' => $request->subjudul_tentang,
                    'gambar' => " ",
                    'deskripsi_tentang' => $request->deskripsi_tentang,
                    'tag_tentang' => $data2
                ]);
            }
        } else {
            if ($request->gambar) {
                $image = $request->file('gambar')->getClientOriginalExtension();
                $filename = uniqid() . '.' . $image;
                $path = Storage::putFileAs('public/images/tentang', $request->file('gambar'), $filename);

                Tentang::create([
                    'judul_tentang' => $request->judul_tentang,
                    'subjudul_tentang' => $request->subjudul_tentang,
                    'gambar' => $filename,
                    'deskripsi_tentang' => $request->deskripsi_tentang,
                    'tag_tentang' => " "
                ]);
            } else {
                Tentang::create([
                    'judul_tentang' => $request->judul_tentang,
                    'subjudul_tentang' => $request->subjudul_tentang,
                    'gambar' => " ",
                    'deskripsi_tentang' => $request->deskripsi_tentang,
                    'tag_tentang' => " "
                ]);
            }
        }


        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id_tentang)
    {
        $tentang = Tentang::find($id_tentang);
        $tags = explode(',', $tentang->tag_tentang);
        return view('pages.tentang.edit', compact('tentang', 'tags'));
    }

    public function update(Request $request, $id_tentang)
    {

        $tentang = Tentang::find($id_tentang);
        $request->validate([
            'judul_tentang' => ['min:3'],
            'subjudul_tentang' => ['min:3'],
            'deskripsi_tentang' => ['min:5'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $tentang->update([
                'judul_tentang' => $request->judul_tentang,
                'subjudul_tentang' => $request->subjudul_tentang,
                'deskripsi_tentang' => $request->deskripsi_tentang,
                'tag_tentang' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        } else {

            $tentang->update([
                'judul_tentang' => $request->judul_tentang,
                'subjudul_tentang' => $request->subjudul_tentang,
                'deskripsi_tentang' => $request->deskripsi_tentang,
                'tag_tentang' => ""
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        }
    }

    public function editGambar($id_tentang)
    {
        $tentang = Tentang::find($id_tentang);
        return view('pages.tentang.editGambar', compact('tentang'));
    }

    public function updateGambar(Request $request, $id_tentang)
    {
        $tentang = Tentang::find($id_tentang);
        $request->validate([
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
        ]);

        $path = Storage::delete('public/images/tentang/' . $tentang->gambar);
        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/tentang', $request->file('gambar'), $filename);

        $tentang->update([
            'gambar' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }

    public function destroy($id_tentang)
    {
        $tentang = Tentang::find($id_tentang);
        $path = Storage::delete('public/images/tentang/' . $tentang->gambar);
        $tentang->delete();
        return back();
    }
}
