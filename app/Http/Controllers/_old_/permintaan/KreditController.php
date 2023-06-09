<?php

namespace App\Http\Controllers\permintaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EformKredit;
use Illuminate\Pagination\Paginator;

class KreditController extends Controller
{
    public function index(Request $request)
    {
        $kredit = EformKredit::orderBy('id_eform_kredit', 'asc')
            ->when($request->q, function ($query, $kredit) {
                return $query->where('nama_lengkap', 'like', "%$kredit%");
            })

            ->paginate(10);
        $menunggu = EformKredit::where('status', 'Menunggu')
            ->paginate(10);
        $disetujui = EformKredit::where('status', 'Disetujui')
            ->paginate(10);
        $ditolak = EformKredit::where('status', 'Ditolak')
            ->paginate(10);
        Paginator::useBootstrap();
        return view('pages.permintaan.kredit', compact('kredit', 'menunggu', 'disetujui', 'ditolak', 'request'));
    }

    public function detail($id_eform_kredit)
    {
        $kredit = EformKredit::find($id_eform_kredit);
        return view('pages.permintaan.detail-kredit', compact('kredit'));
    }

    public function editStatus($id_eform_kredit)
    {
        $kredit = EformKredit::find($id_eform_kredit);
        return view('pages.permintaan.edit-kredit', compact('kredit'));
    }

    public function updateStatus(Request $request, $id_eform_kredit)
    {
        $kredit = EformKredit::find($id_eform_kredit);
        $kredit->update([
            'status' => $request->status
        ]);
        return back();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
