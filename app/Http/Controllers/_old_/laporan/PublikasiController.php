<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Publikasi;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $laporans = Publikasi::orderBy('id_publikasi', 'asc')
            ->when($request->q, function ($query, $publikasi) {
                return $query->where('nama_laporan', 'like', "%$publikasi%");
            })
            ->paginate(10);;
        return view('pages.laporan.publikasi.publikasi', compact('laporans', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.laporan.publikasi.publikasi-create');
    }
    public function download($id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $path = public_path() . "/storage/file/publikasi/" . $laporan->dokumen_publikasi;
        $newName = 'laporan-publikasi-' . $laporan->dokumen_publikasi;
        return response()->download($path, $newName, $headers);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_laporan' => ['min:3'],
            'dokumen_publikasi' => ['mimes:pdf'],
            'deskripsi_publikasi' => ['min:5']
        ]);

        $image = $request->file('dokumen_publikasi')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/file/publikasi', $request->file('dokumen_publikasi'), $filename);

        $bulan_awal = $request->bulan_awal . " " . $request->tahun1;
        $bulan_akhir = $request->bulan_akhir . " " . $request->tahun2;

        Publikasi::create([
            'nama_laporan' => $request->nama_laporan,
            'bulan_awal' => $bulan_awal,
            'bulan_akhir' => $bulan_akhir,
            'tahun' => $request->tahun,
            'dokumen_publikasi' => $filename,
            'deskripsi_publikasi' => $request->deskripsi_publikasi
        ]);
        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function detail($id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);
        return view('pages.laporan.publikasi.publikasi-detail', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);
        return view('pages.laporan.publikasi.publikasi-edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);

        $request->validate([
            'nama_laporan' => ['min:3'],
            'deskripsi_publikasi' => ['min:5']
        ]);

        $bulan_awal = $request->bulan_awal . " " . $request->tahun1;
        $bulan_akhir = $request->bulan_akhir . " " . $request->tahun2;
        $laporan->update([
            'nama_laporan' => $request->nama_laporan,
            'bulan_awal' => $bulan_awal,
            'bulan_akhir' => $bulan_akhir,
            'tahun' => $request->tahun,
            'deskripsi_publikasi' => $request->deskripsi_publikasi
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editDokumen($id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);
        return view('pages.laporan.publikasi.dokumen-edit', compact('laporan'));
    }
    public function updateDokumen(Request $request, $id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);
        $request->validate([
            'dokumen' => ['mimes:pdf']
        ]);

        $path = Storage::delete('public/file/publikasi/' . $laporan->dokumen_publikasi);
        $image = $request->file('dokumen')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/file/publikasi', $request->file('dokumen'), $filename);

        $laporan->update([
            'dokumen_publikasi' => $filename
        ]);
        session()->flash('notif', 'Dokumen Berhasil diubah!');
        return back();
    }
    public function destroy($id_publikasi)
    {
        $laporan = Publikasi::find($id_publikasi);
        $path = Storage::delete('public/file/publikasi/' . $laporan->dokumen_publikasi);
        $laporan->delete();
        return back();
    }
}
