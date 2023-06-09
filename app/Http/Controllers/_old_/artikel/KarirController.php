<?php

namespace App\Http\Controllers\artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karir;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\Models\InfoTambahan;


class KarirController extends Controller
{
    public function index(Request $request)
    {
        $karirs = Karir::orderBy('id_karir', 'asc')
            ->when($request->q, function ($query, $karir) {
                return $query->where('judul_karir', 'like', "%$karir%");
            })
            ->paginate(10);

        $publish = Karir::where('status_karir', 'Publish')
            ->paginate(10);

        $nopublish = Karir::where('status_karir', 'Tidak Publish')
            ->paginate(10);
        Paginator::useBootstrap();
        return view('pages.karir.index', compact('karirs', 'publish', 'nopublish', 'request'));
    }

    public function create()
    {
        return view('pages.karir.create');
    }

    public function detail($id_karir)
    {
        $karir = Karir::find($id_karir);
        $informasi = InfoTambahan::where('id_karir', $id_karir)
            ->get();
        $tag = explode(",", $karir->tag_karir);
        return view('pages.karir.detail', compact('karir', 'tag', 'informasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_karir' => ['min:3'],
            'posisi_karir' => ['min:3'],
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
            'deskripsi_karir' => ['min:5'],
        ]);
        if ($request->tag) {
            $image = $request->file('gambar')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/karir', $request->file('gambar'), $filename);

            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);
            Karir::create([
                'judul_karir' => $request->judul_karir,
                'posisi_karir' => $request->posisi_karir,
                'gambar' => $filename,
                'tingkat_pengalaman' => $request->tingkat_pengalaman,
                'deskripsi_karir' => $request->deskripsi_karir,
                'tag_karir' => $data2

            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        } else {
            $image = $request->file('gambar')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/karir', $request->file('gambar'), $filename);

            Karir::create([
                'judul_karir' => $request->judul_karir,
                'posisi_karir' => $request->posisi_karir,
                'gambar' => $filename,
                'tingkat_pengalaman' => $request->tingkat_pengalaman,
                'deskripsi_karir' => $request->deskripsi_karir,
                'tag_karir' => " "

            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        }
    }

    public function editGambar($id_karir)
    {
        $karir = Karir::find($id_karir);
        return view('pages.karir.editGambar', compact('karir'));
    }

    public function updateGambar(Request $request, $id_karir)
    {
        $karir = Karir::find($id_karir);
        $request->validate([
            'gambar' => ['mimes:jpg,jpeg,png,JPG']
        ]);

        $path = Storage::delete('public/images/karir/' . $karir->gambar);
        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/karir', $request->file('gambar'), $filename);

        $karir->update([
            'gambar' => $filename
        ]);
        session()->flash('notif', 'Gambar Berhasil diubah!');
        return back();
    }

    public function editStatus($id_karir)
    {
        $karir = Karir::find($id_karir);
        return view('pages.karir.editStatus', compact('karir'));
    }

    public function updateStatus(Request $request, $id_karir)
    {
        $karir = Karir::find($id_karir);
        $karir->update([
            'status_karir' => $request->status_karir
        ]);
        session()->flash('notif', 'Status Berhasil diubah!');
        return back();
    }

    public function edit($id_karir)
    {
        $karir = Karir::find($id_karir);
        $tags = explode(",", $karir->tag_karir);
        return view('pages.karir.edit', compact('karir', 'tags'));
    }

    public function update(Request $request, $id_karir)
    {
        $karir = Karir::find($id_karir);
        $request->validate([
            'judul_karir' => ['min:3'],
            'posisi_karir' => ['min:3'],
            'deskripsi_karir' => ['min:5'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $karir->update([
                'judul_karir' => $request->judul_karir,
                'posisi_karir' => $request->posisi_karir,
                'tingkat_pengalaman' => $request->tingkat_pengalaman,
                'deskripsi_karir' => $request->deskripsi_karir,
                'tag_karir' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        } else {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $karir->update([
                'judul_karir' => $request->judul_karir,
                'posisi_karir' => $request->posisi_karir,
                'tingkat_pengalaman' => $request->tingkat_pengalaman,
                'deskripsi_karir' => $request->deskripsi_karir,
                'tag_karir' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        }
    }

    public function destroy($id_karir)
    {
        $karir = Karir::find($id_karir);
        $path = Storage::delete('public/images/karir/' . $karir->gambar);
        $karir->delete();
        return back();
    }

    public function infoCreate($id_karir)
    {
        $karir = Karir::find($id_karir);
        return view('pages.karir.info-create', compact('karir'));
    }

    public function infoStore(Request $request, $id_karir)
    {
        $karir = Karir::find($id_karir);

        InfoTambahan::create([
            'id_karir' => $karir->id_karir,
            'judul_info' => $request->judul_info,
            'deskripsi_info' => $request->deskripsi_info
        ]);

        session()->flash('notif', 'Data Berhasil ditambah!');
        return back();
    }

    public function infoEdit($id_info)
    {
        $info = InfoTambahan::find($id_info);
        return view('pages.karir.info-edit', compact('info'));
    }

    public function infoUpdate(Request $request, $id_info)
    {
        $info = InfoTambahan::find($id_info);
        $info->update([
            'judul_info' => $request->judul_info,
            'deskripsi_info' => $request->deskripsi_info
        ]);

        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function infoDestroy($id_info)
    {
        $info = InfoTambahan::find($id_info);
        $info->delete();
        return back();
    }
}
