<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahunan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class TahunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahunan = Tahunan::orderBy('id_tahunan', 'asc')
            ->when($request->q, function ($query, $tahunan) {
                return $query->where('tahun', 'like', "%$tahunan%");
            })

            ->paginate(10);;
        Paginator::useBootstrap();
        return view('pages.laporan.tahunan.tahunan', compact('tahunan', 'request'));
    }

    public function detail($id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        return view('pages.laporan.tahunan.detail', compact('laporan'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.laporan.tahunan.tahunan-create');
    }
    public function download($id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $path = public_path() . "/storage/file/tahunan/" . $laporan->dokumen_tahunan;
        $newName = 'laporan-tahunan-' . $laporan->dokumen_tahunan;
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
            'nama_tahunan' => ['min:3'],
            'dokumen_tahunan' => ['mimes:pdf'],
            'deskripsi' => ['min:5']
        ]);

        $image = $request->file('dokumen_tahunan')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/file/tahunan', $request->file('dokumen_tahunan'), $filename);

        Tahunan::create([
            'nama_tahunan' => $request->nama_tahunan,
            'tahun' => $request->tahun,
            'dokumen_tahunan' => $filename,
            'deskripsi' => $request->deskripsi
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        return view('pages.laporan.tahunan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        $request->validate([
            'nama_laporan' => ['min:3'],
            'deskripsi' => ['min:5']
        ]);


        $laporan->update([
            'nama_tahunan' => $request->nama_laporan,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function editDokumen($id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        return view('pages.laporan.tahunan.dokumen-edit', compact('laporan'));
    }
    public function updateDokumen(Request $request, $id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        $request->validate([
            'dokumen_tahunan' => ['mimes:pdf'],
        ]);

        $path = Storage::delete('public/file/tahunan/' . $laporan->dokumen_tahunan);

        $image = $request->file('dokumen_tahunan')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/file/tahunan', $request->file('dokumen_tahunan'), $filename);

        $laporan->update([
            'dokumen_tahunan' => $filename
        ]);
        session()->flash('notif', 'Dokumen Berhasil diubah!');
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_tahunan)
    {
        $laporan = Tahunan::find($id_tahunan);
        $path = Storage::delete('public/file/tahunan/' . $laporan->dokumen_tahunan);
        $laporan->delete();
        return back();
    }
}
