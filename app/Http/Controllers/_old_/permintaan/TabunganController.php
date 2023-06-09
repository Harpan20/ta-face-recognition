<?php

namespace App\Http\Controllers\permintaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EformTabungan;
use Illuminate\Pagination\Paginator;

class TabunganController extends Controller
{
    public function index(Request $request)
    {

        $tabungan = EformTabungan::orderBy('id_eform_tabungan', 'asc')
            ->when($request->q, function ($query, $tabungan) {
                return $query->where('nama_lengkap', 'like', "%$tabungan%");
            })

            ->paginate(10);

        $menunggu = EformTabungan::where('status', 'Menunggu')
            ->paginate(10);
        $disetujui = EformTabungan::where('status', 'Disetujui')
            ->paginate(10);
        $ditolak = EformTabungan::where('status', 'Ditolak')
            ->paginate(10);

        Paginator::useBootstrap();
        return view('pages.permintaan.tabungan', compact('tabungan', 'menunggu', 'disetujui', 'ditolak', 'request'));
    }

    public function create()
    {
        //
    }
    public function detail($id_eform_tabungan)
    {
        $tabungan = EformTabungan::find($id_eform_tabungan);
        return view('pages.permintaan.detail-tabungan', compact('tabungan'));
    }

    public function store(Request $request)
    {
        //
    }

    public function editStatus($id_eform_tabungan)
    {
        $tabungan = EformTabungan::find($id_eform_tabungan);
        return view('pages.permintaan.edit-tabungan', compact('tabungan'));
    }

    public function updateStatus(Request $request, $id_eform_tabungan)
    {
        $tabungan = EformTabungan::find($id_eform_tabungan);
        $tabungan->update([
            'status' => $request->status
        ]);
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
