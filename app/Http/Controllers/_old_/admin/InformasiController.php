<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::get();
        return view('pages.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('pages.informasi.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_kantor' => ['min:3'],
            'deskripsi_informasi' => ['min:5'],
            'alamat_kantor' => ['min:5'],
            'no_telpon' => ['numeric'],
            'nomor_wa' => ['numeric'],
            'instagram' => ['min:3'],
            'facebook' => ['min:3'],
            'youtube' => ['min:3']
        ]);

        Informasi::create([
            'nama_kantor' => $request->nama_kantor,
            'deskripsi_informasi' => $request->deskripsi_informasi,
            'alamat_kantor' => $request->alamat_kantor,
            'no_telpon' => $request->no_telpon,
            'nomor_wa' => $request->nomor_wa,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube
        ]);
        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    public function show($id_informasi)
    {
        $informasi = Informasi::find($id_informasi);
        return view('pages.informasi.detail', compact('informasi'));
    }

    public function edit($id_informasi)
    {
        $informasi = Informasi::find($id_informasi);
        return view('pages.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, $id_informasi)
    {
        $informasi = Informasi::find($id_informasi);
        $request->validate([
            'nama_kantor' => ['min:3'],
            'deskripsi_informasi' => ['min:5'],
            'alamat_kantor' => ['min:5'],
            'no_telpon' => ['numeric'],
            'nomor_wa' => ['numeric'],
            'instagram' => ['min:3'],
            'facebook' => ['min:3'],
            'youtube' => ['min:3']
        ]);

        $informasi->update([
            'nama_kantor' => $request->nama_kantor,
            'deskripsi_informasi' => $request->deskripsi_informasi,
            'alamat_kantor' => $request->alamat_kantor,
            'no_telpon' => $request->no_telpon,
            'nomor_wa' => $request->nomor_wa,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function destroy($id_informasi)
    {
        $informasi = Informasi::find($id_informasi);
        $informasi->delete();
        return back();
    }
}
