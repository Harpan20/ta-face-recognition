<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EformDeposito;
use App\Models\EformKredit;
use App\Models\EformTabungan;
use App\Models\Pesan;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $tabungan = EformTabungan::count();
        $tabunganWait = EformTabungan::where('status', 'Menunggu')
            ->count();
        $tabunganSetuju = EformTabungan::where('status', 'Disetujui')
            ->count();
        $tabunganTolak = EformTabungan::where('status', 'Ditolak')
            ->count();

        $kredit = EformKredit::get();
        $kreditWait = EformKredit::where('status', 'Menunggu')
            ->count();
        $kreditSetuju = EformKredit::where('status', 'Disetujui')
            ->count();
        $kreditTolak = EformKredit::where('status', 'Ditolak')
            ->count();

        $deposito = EformDeposito::get();
        $depositoWait = EformDeposito::where('status', 'Menunggu')
            ->count();
        $depositoSetuju = EformDeposito::where('status', 'Disetujui')
            ->count();
        $depositoTolak = EformDeposito::where('status', 'Ditolak')
            ->count();

        $pesan = Pesan::where('status', 'Belum direspon')
            ->paginate(5);
        Paginator::useBootstrap();
        return view('pages.dashboard', compact('tabungan', 'tabunganWait', 'tabunganSetuju', 'tabunganTolak', 'kredit', 'kreditWait', 'kreditSetuju', 'kreditTolak', 'deposito', 'depositoWait', 'depositoSetuju', 'depositoTolak', 'pesan'));
    }
}
