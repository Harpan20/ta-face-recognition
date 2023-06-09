<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class LayananController extends Controller
{

    public function index(Request $request)
    {
        $layanans = Layanan::orderBy('id_layanan', 'asc')
            ->when($request->q, function ($query, $layanan) {
                return $query->where('nama_layanan', 'like', "%$layanan%");
            })
            ->paginate(10);

        Paginator::useBootstrap();
        return view('pages.layanan.index', compact('layanans', 'request'));
    }

    public function create()
    {
        return view('pages.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_layanan' => ['mimes:jpg,png,jpeg,JPG', 'max:2048'],
            'thumbnail_layanan' => ['mimes:jpg,png,jpeg,JPG', 'max:2048'],
            'nama_layanan' => ['min:3'],
            'deskripsi_layanan' => ['min:5'],
        ]);

        if ($request->tag) {
            $image = $request->file('banner_layanan')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerLayanan', $request->file('banner_layanan'), $filename);

            $image2 = $request->file('thumbnail_layanan')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailLayanan', $request->file('thumbnail_layanan'), $filename2);

            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);
            Layanan::create([
                'thumbnail_layanan' => $filename2,
                'banner_layanan' => $filename,
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'tag_layanan' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        } else {
            $image = $request->file('banner_layanan')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerLayanan', $request->file('banner_layanan'), $filename);

            $image2 = $request->file('thumbnail_layanan')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailLayanan', $request->file('thumbnail_layanan'), $filename2);

            Layanan::create([
                'thumbnail_layanan' => $filename2,
                'banner_layanan' => $filename,
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'tag_layanan' => ''
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function detail($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        $tag = explode(",", $layanan->tag_layanan);
        return view('pages.layanan.detail', compact('layanan', 'tag'));
    }

    public function edit($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        $tags = explode(",", $layanan->tag_layanan);

        return view('pages.layanan.edit', compact('layanan', 'tags'));
    }

    public function update(Request $request, $id_layanan)
    {
        $layanan = Layanan::find($id_layanan);

        $request->validate([
            'nama_layanan' => ['min:3'],
            'deskripsi_layanan' => ['min:5'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $layanan->update([
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'tag_layanan' => $data2
            ]);
            session()->flash('notif', 'Data berhasil diubah!');
            return back();
        } else {
            $layanan->update([
                'nama_layanan' => $request->nama_layanan,
                'deskripsi_layanan' => $request->deskripsi_layanan,
                'tag_layanan' => " "
            ]);
            session()->flash('notif', 'Data berhasil diubah!');
            return back();
        }
    }

    public function destroy($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        $path = Storage::delete('public/images/banneLayanan/' . $layanan->gambar);
        $path2 = Storage::delete('public/images/thumbnailLayanan/' . $layanan->thumbnail_layanan);
        $layanan->delete();
        return back();
    }

    public function editGambar($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        return view('pages.layanan.editGambar', compact('layanan'));
    }

    public function updateGambar(Request $request, $id_layanan)
    {
        $layanan = Layanan::find($id_layanan);

        $request->validate([
            'banner_layanan' => ['mimes:jpg,png,jpeg,JPG', 'max:2048'],
        ]);

        $path = Storage::delete('public/images/bannerLayanan/' . $layanan->banner_layanan);
        $image = $request->file('banner_layanan')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/bannerLayanan', $request->file('banner_layanan'), $filename);

        $layanan->update([
            'banner_layanan' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }

    public function editThumbnail($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        return view('pages.layanan.thumbnail', compact('layanan'));
    }

    public function updateThumbnail(Request $request, $id_layanan)
    {
        $layanan = Layanan::find($id_layanan);


        $request->validate([
            'thumbnail_layanan' => ['mimes:jpg,png,jpeg,JPG', 'max:2048'],
        ]);

        $path = Storage::delete('public/images/thumbnailLayanan/' . $layanan->thumbnail_layanan);
        $image = $request->file('thumbnail_layanan')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/thumbnailLayanan', $request->file('thumbnail_layanan'), $filename);

        $layanan->update([
            'thumbnail_layanan' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }
}
