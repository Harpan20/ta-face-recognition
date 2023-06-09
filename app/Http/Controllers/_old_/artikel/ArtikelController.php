<?php

namespace App\Http\Controllers\artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {

        $artikels = Artikel::orderBy('id_artikel', 'asc')
            ->when($request->q, function ($query, $artikel) {
                return $query->where('judul_artikel', 'like', "%$artikel%");
            })
            ->paginate(10);
        $publish = Artikel::where('status_artikel', 'Publish')
            ->paginate(10);
        $nopublish = Artikel::where('status_artikel', 'Tidak Publish')
            ->paginate(10);
        return view('pages.artikel.index', compact('artikels', 'publish', 'nopublish', 'request'));
    }

    public function create()
    {
        return view('pages.artikel.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'judul_artikel' => ['min:3'],
            'banner_artikel' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
            'thumbnail_artikel' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
            'deskripsi_artikel' => ['min:5'],
        ]);

        if ($request->tag) {
            $image = $request->file('banner_artikel')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerArtikel', $request->file('banner_artikel'), $filename);

            $image2 = $request->file('thumbnail_artikel')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailArtikel', $request->file('thumbnail_artikel'), $filename2);

            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            Artikel::create([
                'judul_artikel' => $request->judul_artikel,
                'banner_artikel' => $filename,
                'thumbnail_artikel' => $filename2,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'tag_artikel' => $data2,
                'views' => 0
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        } else {
            $image = $request->file('banner_artikel')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerArtikel', $request->file('banner_artikel'), $filename);

            $image2 = $request->file('thumbnail_artikel')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailArtikel', $request->file('thumbnail_artikel'), $filename2);

            Artikel::create([
                'judul_artikel' => $request->judul_artikel,
                'banner_artikel' => $filename,
                'thumbnail_artikel' => $filename2,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'tag_artikel' => "",
                'views' => 0
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        }
    }

    public function detail($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        $tag = explode(",", $artikel->tag_artikel);
        return view('pages.artikel.detail', compact('artikel', 'tag'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        $tags = explode(",", $artikel->tag_artikel);
        return view('pages.artikel.edit', compact('artikel', 'tags'));
    }

    public function update(Request $request, $id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        $request->validate([
            'judul_artikel' => ['min:3'],
            'deskripsi_artikel' => ['min:5'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $artikel->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'tag_artikel' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        } else {

            $artikel->update([
                'judul_artikel' => $request->judul_artikel,
                'deskripsi_artikel' => $request->deskripsi_artikel,
                'tag_artikel' => " "
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        }
    }

    public function destroy($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        $path = Storage::delete('public/images/bannerArtikel/' . $artikel->banner_artikel);
        $path2 = Storage::delete('public/images/thumbnailArtikel/' . $artikel->thumbnail_artikel);
        $artikel->delete();
        return back();
    }

    public function editGambar($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        return view('pages.artikel.editGambar', compact('artikel'));
    }

    public function updateGambar(Request $request, $id_artikel)
    {
        $request->validate([
            'banner_artikel' => ['mimes:jpg,jpeg,png,JPG'],
        ]);

        $artikel = Artikel::find($id_artikel);
        $path = Storage::delete('public/images/bannerArtikel/' . $artikel->gambar);
        $image = $request->file('banner_artikel')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/bannerArtikel', $request->file('banner_artikel'), $filename);

        $artikel->update([
            'banner_artikel' => $filename
        ]);
        session()->flash('notif', 'Gambar Berhasil diubah!');
        return back();
    }

    public function editStatus($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        return view('pages.artikel.editStatus', compact('artikel'));
    }

    public function updateStatus(Request $request, $id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        $artikel->update([
            'status_artikel' => $request->status_artikel
        ]);
        session()->flash('notif', 'Status Berhasil diubah!');
        return back();
    }

    public function editThumbnail($id_artikel)
    {
        $artikel = Artikel::find($id_artikel);
        return view('pages.artikel.thumbnail', compact('artikel'));
    }

    public function updateThumbnail(Request $request, $id_artikel)
    {
        $artikel = Artikel::find($id_artikel);


        $request->validate([
            'thumbnail_artikel' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
        ]);

        $path2 = Storage::delete('public/images/thumbnailArtikel/' . $artikel->thumbnail_artikel);
        $image2 = $request->file('thumbnail_artikel')->getClientOriginalExtension();
        $filename2 = uniqid() . '.' . $image2;
        $path2 = Storage::putFileAs('public/images/thumbnailArtikel', $request->file('thumbnail_artikel'), $filename2);

        $artikel->update([
            'thumbnail_artikel' => $filename2
        ]);

        session()->flash('notif', 'Gambar Berhasil diubah!');
        return back();
    }
}
