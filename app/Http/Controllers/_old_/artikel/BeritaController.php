<?php

namespace App\Http\Controllers\artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class BeritaController extends Controller
{
    public function index(Request $request)
    {

        $beritas = Berita::orderBy('id_berita', 'asc')
            ->when($request->q, function ($query, $berita) {
                return $query->where('judul_berita', 'like', "%$berita%");
            })
            ->paginate(10);

        $publish = Berita::where('status_berita', "Publish")
            ->paginate(10);

        $nopublish = Berita::where('status_berita', "Tidak Publish")
            ->paginate(10);

        Paginator::useBootstrap();
        return view('pages.berita.index', compact('beritas', 'request', 'publish', 'nopublish'));
    }

    public function create()
    {
        return view('pages.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => ['min:3'],
            'banner_berita' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
            'thumbnail_berita' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
            'deskripsi_berita' => ['min:5'],

        ]);
        if ($request->tag) {
            $image = $request->file('banner_berita')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerBerita', $request->file('banner_berita'), $filename);

            $image2 = $request->file('thumbnail_berita')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailBerita', $request->file('thumbnail_berita'), $filename2);

            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            Berita::create([
                'judul_berita' => $request->judul_berita,
                'thumbnail_berita' => $filename2,
                'banner_berita' => $filename,
                'gambar' => $filename,
                'deskripsi_berita' => $request->deskripsi_berita,
                'tag_berita' => $data2,
                'views' => 0
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        } else {
            $image = $request->file('banner_berita')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerBerita', $request->file('banner_berita'), $filename);

            $image2 = $request->file('thumbnail_berita')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailBerita', $request->file('thumbnail_berita'), $filename2);


            Berita::create([
                'judul_berita' => $request->judul_berita,
                'thumbnail_berita' => $filename2,
                'banner_berita' => $filename,
                'deskripsi_berita' => $request->deskripsi_berita,
                'tag_berita' => " ",
                'views' => 0
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function detail($id_berita)
    {
        $berita = Berita::find($id_berita);
        $tag = explode(",", $berita->tag_berita);
        return view('pages.berita.detail', compact('berita', 'tag'));
    }

    public function edit($id_berita)
    {
        $berita = Berita::find($id_berita);
        $tags = explode(",", $berita->tag_berita);
        return view('pages.berita.edit', compact('berita', 'tags'));
    }

    public function update(Request $request, $id_berita)
    {
        $berita = Berita::find($id_berita);
        $request->validate([
            'judul_berita' => ['min:3'],
            'deskripsi_berita' => ['min:5'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $berita->update([
                'judul_berita' => $request->judul_berita,
                'deskripsi_berita' => $request->deskripsi_berita,
                'tag_berita' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        } else {


            $berita->update([
                'judul_berita' => $request->judul_berita,
                'deskripsi_berita' => $request->deskripsi_berita,
                'tag_berita' => " "
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        }
    }

    public function editGambar($id_berita)
    {
        $berita = Berita::find($id_berita);
        return view('pages.berita.editGambar', compact('berita'));
    }

    public function updateGambar(Request $request, $id_berita)
    {
        $berita = Berita::find($id_berita);
        $request->validate([
            'banner_berita' => ['mimes:jpg,jpeg,png,JPG'],
        ]);

        $path = Storage::delete('public/images/bannerBerita/' . $berita->banner_berita);
        $image = $request->file('banner_berita')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/bannerBerita', $request->file('banner_berita'), $filename);

        $berita->update([
            'banner_berita' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }

    public function editStatus($id_berita)
    {
        $berita = Berita::find($id_berita);
        return view('pages.berita.editStatus', compact('berita'));
    }

    public function updateStatus(Request $request, $id_berita)
    {
        $berita = Berita::find($id_berita);

        $berita->update([
            'status_berita' => $request->status_berita
        ]);
        session()->flash('notif', 'Status berhasil diubah!');
        return back();
    }

    public function destroy($id_berita)
    {
        $berita = Berita::find($id_berita);
        $path = Storage::delete('public/images/bannerBerita/' . $berita->banner_berita);
        $path2 = Storage::delete('public/images/thumbnailBerita/' . $berita->thumbnail_berita);
        $berita->delete();
        return back();
    }

    public function editThumbnail($id_berita)
    {
        $berita = Berita::find($id_berita);
        return view('pages.berita.thumbnail', compact('berita'));
    }

    public function updateThumbnail(Request $request, $id_berita)
    {
        $berita = Berita::find($id_berita);
        $path2 = Storage::delete('public/images/thumbnailBerita/' . $berita->thumbnail_berita);

        $image2 = $request->file('thumbnail_berita')->getClientOriginalExtension();
        $filename2 = uniqid() . '.' . $image2;
        $path2 = Storage::putFileAs('public/images/thumbnailBerita', $request->file('thumbnail_berita'), $filename2);

        $berita->update([
            'thumbnail_berita' => $filename2
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }
}
