<?php

namespace App\Http\Controllers\artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class PromoController extends Controller
{
    public function index(Request $request)
    {

        $promos = Promo::orderBy('id_promo', 'asc')
            ->when($request->q, function ($query, $promo) {
                return $query->where('nama_promo', 'like', "%$promo%");
            })
            ->paginate(10);
        $publish = Promo::where('status_promo', 'Publish')
            ->paginate(10);

        $nopublish = Promo::where('status_promo', 'Tidak Publish')
            ->paginate(10);
        Paginator::useBootstrap();

        return view('pages.promo.index', compact('promos', 'publish', 'nopublish', 'request'));
    }

    public function create()
    {
        return view('pages.promo.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'gambar' => ['mimes:png,jpg,jpeg'],
            'nama_promo' => ['min:3'],
            'deskripsi_promo' => ['min:5'],
            'mulai_promo' => ['required'],
            'akhir_promo' => ['required'],
        ]);
        if ($request->tag) {
            $image = $request->file('gambar')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/promo', $request->file('gambar'), $filename);

            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            Promo::create([
                'gambar' => $filename,
                'nama_promo' => $request->nama_promo,
                'mulai_promo' => $request->mulai_promo,
                'akhir_promo' => $request->akhir_promo,
                'deskripsi_promo' => $request->deskripsi_promo,
                'status_promo' => $request->status_promo,
                'tag_promo' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        } else {
            $image = $request->file('gambar')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/promo', $request->file('gambar'), $filename);

            Promo::create([
                'gambar' => $filename,
                'nama_promo' => $request->nama_promo,
                'mulai_promo' => $request->mulai_promo,
                'akhir_promo' => $request->akhir_promo,
                'deskripsi_promo' => $request->deskripsi_promo,
                'status_promo' => $request->status_promo,
                'tag_promo' => " "
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function detail($id_promo)
    {
        $promo = Promo::find($id_promo);
        $tag = explode(",", $promo->tag_promo);
        return view('pages.promo.detail', compact('promo', 'tag'));
    }
    public function edit($id_promo)
    {
        $promo = Promo::find($id_promo);
        $tags = explode(",", $promo->tag_promo);
        return view('pages.promo.edit', compact('promo', 'tags'));
    }

    public function update(Request $request, $id_promo)
    {
        $promo = Promo::find($id_promo);

        $request->validate([
            'nama_promo' => ['min:3'],
            'deskripsi_promo' => ['min:5'],
            'mulai_promo' => ['required'],
            'akhir_promo' => ['required'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $promo->update([
                'nama_promo' => $request->nama_promo,
                'mulai_promo' => $request->mulai_promo,
                'akhir_promo' => $request->akhir_promo,
                'deskripsi_promo' => $request->deskripsi_promo,
                'tag_promo' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        } else {

            $promo->update([
                'nama_promo' => $request->nama_promo,
                'mulai_promo' => $request->mulai_promo,
                'akhir_promo' => $request->akhir_promo,
                'deskripsi_promo' => $request->deskripsi_promo,
                'tag_promo' => " "
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        }
    }

    public function destroy($id_promo)
    {
        $promo = Promo::find($id_promo);
        $path = Storage::delete('public/images/promo/' . $promo->gambar);
        $promo->delete();
        return back();
    }

    public function editStatus($id_promo)
    {
        $promo = Promo::find($id_promo);
        return view('pages.promo.editStatus', compact('promo'));
    }

    public function updatedStatus(Request $request, $id_promo)
    {
        $promo = Promo::find($id_promo);
        $promo->update([
            'status_promo' => $request->status_promo
        ]);
        session()->flash('notif', 'Status Berhasil diubah!');
        return back();
    }

    public function editGambar($id_promo)
    {
        $promo = Promo::find($id_promo);
        return view('pages.promo.editGambar', compact('promo'));
    }

    public function updatedGambar(Request $request, $id_promo)
    {
        $promo = Promo::find($id_promo);
        $request->validate([
            'gambar' => ['mimes:jpg,jpeg,png,JPG'],
        ]);

        $path = Storage::delete('public/images/promo/' . $promo->gambar);
        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/promo', $request->file('gambar'), $filename);

        $promo->update([
            'gambar' => $filename
        ]);
        session()->flash('notif', 'Gambar Berhasil diubah!');
        return back();
    }
}
