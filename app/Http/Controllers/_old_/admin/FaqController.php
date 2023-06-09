<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Pagination\Paginator;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::orderBy('id_faq', 'desc')
            ->when($request->q, function ($query, $faq) {
                return $query->where('pertanyaan', 'like', "%$faq%");
            })
            ->paginate(10);

        Paginator::useBootstrap();
        return view('pages.faq.index', compact('faqs', 'request'));
    }

    public function detail($id_faq)
    {
        $faq = Faq::find($id_faq);
        return view('pages.faq.detail', compact('faq'));
    }

    public function edit($id_faq)
    {
        $faq = Faq::find($id_faq);
        return view('pages.faq.update', compact('faq'));
    }

    public function update(Request $request, $id_faq)
    {
        $faq = Faq::find($id_faq);
        $faq->update([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);
        session()->flash('notif', 'Data Berhasil diubah!');
        return back();
    }

    public function create()
    {
        return view('pages.faq.create');
    }

    public function store(Request $request)
    {
        Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban
        ]);
        session()->flash('notif', 'Data Berhasil ditambahkan!');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
    }
}
