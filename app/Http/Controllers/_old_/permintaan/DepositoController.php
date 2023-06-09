<?php

namespace App\Http\Controllers\permintaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EformDeposito;
use Illuminate\Pagination\Paginator;

class DepositoController extends Controller
{
    public function index(Request $request)
    {
        $deposito = EformDeposito::orderBy('id_eform_deposito', 'asc')
            ->when($request->q, function ($query, $deposito) {
                return $query->where('nama_lengkap', 'like', "%$deposito%");
            })

            ->paginate(10);
        $menunggu = EformDeposito::where('status', 'Menunggu')
            ->paginate(10);
        $disetujui = EformDeposito::where('status', 'Disetujui')
            ->paginate(10);
        $ditolak = EformDeposito::where('status', 'Ditolak')
            ->paginate(10);
        Paginator::useBootstrap();
        return view('pages.permintaan.deposito', compact('deposito', 'menunggu', 'disetujui', 'ditolak', 'request'));
    }

    public function create()
    {
        //
    }

    public function detail($id_eform_deposito)
    {
        $deposito = EformDeposito::find($id_eform_deposito);
        return view('pages.permintaan.detail-deposito', compact('deposito'));
    }

    public function editStatus($id_eform_deposito)
    {
        $deposito = EformDeposito::find($id_eform_deposito);
        return view('pages.permintaan.edit-deposito', compact('deposito'));
    }

    public function updateStatus(Request $request, $id_eform_deposito)
    {
        $deposito = EformDeposito::find($id_eform_deposito);
        $deposito->update([
            'status' => $request->status
        ]);
        return back();
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
