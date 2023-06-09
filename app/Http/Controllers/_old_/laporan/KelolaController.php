<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelola;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class KelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $laporan = Kelola::orderBy('id_kelola', 'asc')
            ->when($request->q, function ($query, $laporan) {
                return $query->where('tahun', 'like', "%$laporan%");
            })
            ->paginate(10);
        Paginator::useBootstrap();
        return view('pages.laporan.kelola.kelola', compact('laporan', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.laporan.kelola.kelola-create');
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
            'nama_kelola' => ['min:3'],
            'dokumen_kelola' => ['mimes:pdf'],
            'deskripsi_kelola' => ['min:5']
        ]);

        $image = $request->file('dokumen_kelola')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/file/kelola', $request->file('dokumen_kelola'), $filename);

        Kelola::create([
            'nama_kelola' => $request->nama_kelola,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'dokumen_kelola' => $filename,
            'deskripsi_kelola' => $request->deskripsi_kelola
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
    public function detail($id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        return view('pages.laporan.kelola.detail', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        $headers = array(
            'Content-Type: application/pdf',
        );
        $path = public_path() . "/storage/file/kelola/" . $laporan->dokumen_kelola;
        $newName = 'laporan-kelola-' . $laporan->dokumen_kelola;
        return response()->download($path, $newName, $headers);
    }
    public function edit($id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        return view('pages.laporan.kelola.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        $request->validate([
            'nama_kelola' => ['min:3'],
            'dokumen_kelola' => ['mimes:pdf'],
            'deskripsi_kelola' => ['min:3']
        ]);

        $laporan->update([
            'nama_kelola' => $request->nama_kelola,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'deskripsi_kelola' => $request->deskripsi_kelola
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function editDokumen($id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        return view('pages.laporan.kelola.dokumen-edit', compact('laporan'));
    }
    public function updateDokumen(Request $request, $id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        $request->validate([
            'dokumen_kelola' => ['mimes:pdf'],
        ]);

        $path = Storage::delete('public/file/kelola/' . $laporan->dokumen_kelola);

        $image = $request->file('dokumen_kelola')->getClientOriginalExtension();
        $filename = uniqid() . '.' . $image;
        $path = Storage::putFileAs('public/file/kelola', $request->file('dokumen_kelola'), $filename);
        $laporan->update([
            'dokumen_kelola' => $filename
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
    public function destroy($id_kelola)
    {
        $laporan = Kelola::find($id_kelola);
        $path = Storage::delete('public/file/kelola/' . $laporan->dokumen_kelola);
        $laporan->delete();
        return back();
    }
}
