<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Suku;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produks = Produk::orderBy('id_produk', 'asc')
            ->when($request->q, function ($query, $produk) {
                return $query->where('nama_produk', 'like', "%$produk%");
            })
            ->paginate(10);

        $tabungan = Produk::where('kategori_produk', 'Tabungan')
            ->paginate(10);

        $kredit = Produk::where('kategori_produk', 'Kredit')
            ->paginate(10);

        $deposito = Produk::where('kategori_produk', 'Deposito')
            ->paginate(10);

        Paginator::useBootstrap();
        return view('pages.produks.index', compact('produks', 'tabungan', 'kredit', 'deposito', 'request'));
    }

    public function create()
    {
        return view('pages.produks.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'banner_produk' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
                'thumbnail_produk' => ['mimes:jpg,jpeg,png,JPG', 'max:2048'],
                'nama_produk' => ['min:3'],
            ],
            ['banner_produk.mimes' => 'Format Banner harus png,jpg, atau jpeg'],
            ['banner_produk.max' => 'Ukuran gambar tidak boleh lebih dari 2mb'],
            ['thumbnail_produk.mimes' => 'Format Banner harus png,jpg, atau jpeg'],
            ['thumbnail_produk.max' => 'Ukuran gambar tidak boleh lebih dari 2mb'],
        );

        if ($request->tag) {
            $image = $request->file('banner_produk')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerProduk', $request->file('banner_produk'), $filename);

            $image2 = $request->file('thumbnail_produk')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailProduk', $request->file('thumbnail_produk'), $filename2);

            $data = '';

            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);


            Produk::create([
                'thumbnail_produk' => $filename2,
                'banner_produk' => $filename,
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'bunga_produk' => $request->bunga_produk,
                'nominal_min' => $request->nominal_min,
                'nominal_max' => $request->nominal_max,
                'range_min' => '',
                'range_max' => '',
                'range' => '',
                'jangka_min' => $request->jangka_min,
                'jangka_max' => $request->jangka_max,
                'kelipatan' => $request->kelipatan,
                'nominal_kelipatan' => $request->nominal_kelipatan,
                'kategori_produk' => $request->kategori_produk,
                'tag_produk' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        } else {

            $image = $request->file('banner_produk')->getClientOriginalExtension();
            $filename = uniqid() . '.' . $image;
            $path = Storage::putFileAs('public/images/bannerProduk', $request->file('banner_produk'), $filename);

            $image2 = $request->file('thumbnail_produk')->getClientOriginalExtension();
            $filename2 = uniqid() . '.' . $image2;
            $path2 = Storage::putFileAs('public/images/thumbnailProduk', $request->file('thumbnail_produk'), $filename2);


            Produk::create([
                'thumbnail_produk' => $filename2,
                'banner_produk' => $filename,
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'bunga_produk' => $request->bunga_produk,
                'nominal_min' => $request->nominal_min,
                'nominal_max' => $request->nominal_max,
                'range_min' => '',
                'range_max' => '',
                'range' => '',
                'jangka_min' => $request->jangka_min,
                'jangka_max' => $request->jangka_max,
                'kelipatan' => $request->kelipatan,
                'nominal_kelipatan' => $request->nominal_kelipatan,
                'kategori_produk' => $request->kategori_produk,
                'tag_produk' => ''
            ]);
            session()->flash('notif', 'Data Berhasil ditambahkan!');
            return back();
        }
    }

    public function show($id)
    {
        //
    }
    public function detail($id_produk)
    {
        $produk = Produk::find($id_produk);
        $tag = explode(",", $produk->tag_produk);
        $range = explode("/", $produk->range);
        return view('pages.produks.detail', compact('produk', 'tag', 'range'));
    }

    public function edit($id_produk)
    {
        $produk = Produk::find($id_produk);
        $tags = explode(",", $produk->tag_produk);
        return view('pages.produks.edit', compact('produk', 'tags'));
    }

    public function update(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);

        $request->validate([
            'nama_produk' => ['min:3'],
            'deskripsi_produk' => ['min:5'],
        ]);

        if ($request->tag) {
            $data = '';
            foreach ($request->tag as $item => $values) {
                $data .= $values . ',';
            }
            $data2 = substr($data, 0, -1);

            $produk->update([
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'bunga_produk' => $request->bunga_produk,
                'nominal_min' => $request->nominal_min,
                'nominal_max' => $request->nominal_max,
                'jangka_min' => $request->jangka_min,
                'jangka_max' => $request->jangka_max,
                'kelipatan' => $request->kelipatan,
                'nominal_kelipatan' => $request->nominal_kelipatan,
                'kategori_produk' => $request->kategori_produk,
                'tag_produk' => $data2
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        } else {
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'bunga_produk' => $request->bunga_produk,
                'nominal_min' => $request->nominal_min,
                'nominal_max' => $request->nominal_max,
                'jangka_min' => $request->jangka_min,
                'jangka_max' => $request->jangka_max,
                'kelipatan' => $request->kelipatan,
                'nominal_kelipatan' => $request->nominal_kelipatan,
                'kategori_produk' => $request->kategori_produk,
                'tag_produk' => " "
            ]);
            session()->flash('notif', 'Data Berhasil diubah!');
            return back();
        }
    }

    public function destroy($id_produk)
    {
        $produk = Produk::find($id_produk);
        $path = Storage::delete('public/images/bannerProduk/' . $produk->banner_produk);
        $path2 = Storage::delete('public/images/thumbnailProduk/' . $produk->thumbnail_produk);
        $produk->delete();
        return back();
    }

    public function editGambar($id_produk)
    {
        $produk = Produk::find($id_produk);
        return view('pages.produks.editGambar', compact('produk'));
    }

    public function updateGambar(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);
        $request->validate([
            'banner_produk' => ['mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $path = Storage::delete('public/images/bannerProduk/' . $produk->banner_produk);
        $image = $request->file('banner_produk')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/bannerProduk', $request->file('banner_produk'), $filename);

        $produk->update([
            'banner_produk' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }

    public function birate()
    {
        $sukus = Suku::get();
        return view('pages.birates.index', compact('sukus'));
    }

    public function birateCreate()
    {
        return view('pages.birates.create');
    }

    public function birateStore(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_sukubunga' => ['min:3'],
            'nilai_besaran' => ['numeric'],
            'suku_bunga' => ['numeric']
        ]);

        Suku::create([
            'nama_sukubunga' => $request->nama_sukubunga,
            'nilai_besaran' => $request->nilai_besaran,
            'suku_bunga' => $request->suku_bunga
        ]);

        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    public function birateEdit($id_sukubunga)
    {
        $suku = Suku::find($id_sukubunga);
        return view('pages.birates.edit', compact('suku'));
    }

    public function birateUpdate(Request $request, $id_sukubunga)
    {
        $suku = Suku::find($id_sukubunga);
        $request->validate([
            'nama_sukubunga' => ['min:3'],
            'nilai_besaran' => ['numeric'],
            'suku_bunga' => ['numeric']
        ]);

        $suku->update([
            'nama_sukubunga' => $request->nama_sukubunga,
            'nilai_besaran' => $request->nilai_besaran,
            'suku_bunga' => $request->suku_bunga
        ]);

        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function birateDestroy($id_sukubunga)
    {
        $suku = Suku::find($id_sukubunga);
        $suku->delete();
        return back();
    }

    public function range($id_produk)
    {
        $produk = Produk::find($id_produk);
        return view('pages.produks.range', compact('produk'));
    }

    public function rangeStore(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);
        $rangemin = '';
        $rangemax = '';
        $range = '';

        for ($i = 0; $i < count($request->nominal_min); $i++) {
            $rangemin .= $request->nominal_min[$i] . '/';
            $rangemax .= $request->nominal_max[$i] . '/';
            $range .= 'Rp.' . number_format($request->nominal_min[$i]) . ' - ' . 'Rp.' . number_format($request->nominal_max[$i]) . '/';
        }

        $data1 = substr($rangemin, 0, -1);
        $data2 = substr($rangemax, 0, -1);
        $data3 = substr($range, 0, -1);

        $produk->update([
            'range_min' => $data1,
            'range_max' => $data2,
            'range' => $data3
        ]);
        return back()->with('notif', 'Range Berhasil ditambahkan!!!');
    }

    public function rangeEdit($id_produk)
    {
        $produk = Produk::find($id_produk);
        $rangemin = explode("/", $produk->range_min);
        $rangemax = explode("/", $produk->range_max);
        return view('pages.produks.editRange', compact('produk', 'rangemin', 'rangemax'));
    }

    public function rangeUpdate(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);
        $rangemin = '';
        $rangemax = '';
        $range = '';

        for ($i = 0; $i < count($request->nominal_min); $i++) {
            $rangemin .= $request->nominal_min[$i] . '/';
            $rangemax .= $request->nominal_max[$i] . '/';
            $range .= 'Rp.' . number_format($request->nominal_min[$i]) . ' - ' . 'Rp.' . number_format($request->nominal_max[$i]) . '/';
        }
        $data1 = substr($rangemin, 0, -1);
        $data2 = substr($rangemax, 0, -1);
        $data3 = substr($range, 0, -1);

        $produk->update([
            'range_min' => $data1,
            'range_max' => $data2,
            'range' => $data3
        ]);
        return back()->with('notif', 'Range Berhasil diupdate!!!');
    }

    public function editThumbnail($id_produk)
    {
        $produk = Produk::find($id_produk);
        return view('pages.produks.thumbnail', compact('produk'));
    }

    public function updateThumbnail(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);
        $request->validate([
            'thumbnail_produk' => ['mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $path = Storage::delete('public/images/thumbnailProduk/' . $produk->gambar);
        $image = $request->file('gambar')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/images/thumbnailProduk', $request->file('gambar'), $filename);

        $produk->update([
            'thumbnail_produk' => $filename
        ]);
        session()->flash('notif', 'Gambar berhasil diubah!');
        return back();
    }
}
