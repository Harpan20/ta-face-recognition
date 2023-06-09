<?php

namespace App\Http\Controllers\admin;

use App\Enums\MessageStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesan;
use Illuminate\Pagination\Paginator;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $pesans = Pesan::orderBy('id_pesan', 'desc')
            ->when($request->q, function ($query, $pesan) {
                return $query->where('username', 'like', "%$pesan%");
            })
            ->paginate(10);
        // $respon = Pesan::where('status','Sudah direspon')
        $respon = Pesan::where('status', MessageStatus::Sudah->value)
            ->paginate(10);


        // $norespon = Pesan::where('status','Belum direspon')
        $norespon = Pesan::where('status', MessageStatus::Belum->value)
            ->paginate(10);

        Paginator::useBootstrap();
        return view('pages.pesan.index', compact('pesans', 'respon', 'norespon', 'request'));
    }

    public function detail($id_pesan)
    {
        $pesan = Pesan::find($id_pesan);
        return view('pages.pesan.detail', compact('pesan'));
    }

    public function edit($id_pesan)
    {
        $pesan = Pesan::find($id_pesan);
        return view('pages.pesan.edit', compact('pesan'));
    }

    public function update(Request $request, $id_pesan)
    {
        $pesan = Pesan::find($id_pesan);
        $pesan->update([
            'jawaban' => $request->jawaban,
            'status' => MessageStatus::Sudah->value
            // 'status'=>"Sudah direspon"
        ]);

        session()->flash('notif', 'Jawaban berhasil dikirim!');
        return back();
    }

    public function destroy($id_pesan)
    {
        $pesan = Pesan::find($id_pesan);
        $pesan->delete();
        return back();
    }
}
