<?php

namespace App\Http\Controllers\admin;

use App\Models\Laporan;
use App\Enums\ReportType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        /* FILTER UNIQUE YEAR ONLY */
        $report_years = [];
        foreach (Laporan::orderBy('start_date', 'desc')->where('type', ReportType::Publikasi->value)->get() as $data) {
            if (in_array($data->start_date->format('Y'), $report_years) == false) {
                array_push($report_years, $data->start_date->format('Y'));
            }
        }

        return view('pages.laporan.index', [
            'reports' =>  Laporan::orderBy('start_date', 'desc')->paginate(10),
            'report_years' => $report_years,
        ]);
    }

    public function create()
    {
        return view('pages.laporan.create', [
            'report_types' => ReportType::cases(),
        ]);
    }

    public function store(Request $request)
    {
        /* VALIDATION */
        $validated = $request->validate(
            [
                'name' => ['required', 'regex: /[a-zA-Z]([0-9- ])?/i', 'min:3', 'max:35'],
                'type' => ['required', new Enum(ReportType::class)],
                'document' => ['required', 'mimes:pdf'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
            ],
            /* CUSTOME VALIDATION MESSAGES */
            [
                'name.required' => '* Nama laporan wajib diisi.',
                'name.regex' => '* Format nama laporan tidak sah.',
                'name.min' => '* Nama laporan minimal terdiri dari :min karakter.',
                'name.max' => '* Nama laporan maksimal terdiri dari :max karakter.',
                'type.required' => '* Tipe laporan wajib diisi.',
                'type.enum' => '* Tipe laporan tidak sah.',
                'document.required' => '* Dokumen wajib diisi.',
                'document.mimes' => '* Tipe dokumen harus pdf.',
                'start_date.required' => '* Tanggal awal wajib diisi.',
                'start_date.date' => '* Format tanggal awal tidak sah.',
                'end_date.required' => '* Tanggal akhir wajib diisi.',
                'end_date.date' => '* Format tanggal akhir tidak sah.',
            ]
        );

        if ($request->hasFile('document')) {
            /* VARIABLE FOR CHANGE PATH, NAME, AND EXTENSION */
            $document_path = 'public/file/laporans';
            $document_name = $validated['type'] . '-' . $validated['start_date'] . '-' . $validated['end_date'] . '-' . uniqid();
            $document_extension = '.pdf';
            $document_name_with_extension = $document_name . $document_extension;

            /* SAVE FILE NAME TO DATABASE */
            $validated['document'] = $document_name_with_extension;
            /* STORE FILE TO STORAGE */
            $request->document->storeAs($document_path, $document_name_with_extension);
        }

        Laporan::create($validated);

        // return redirect(route('admin.laporans.index'))->with('notif', 'Data berhasil ditambahkan');
        return back()->with('notif', 'Data berhasil ditambahkan');
    }

    public function show(Laporan $report)
    {
        return view('pages.laporan.show', compact('report'));
    }

    public function edit(Laporan $report)
    {
        return view('pages.laporan.edit', [
            'report' => $report,
            'report_types' => ReportType::cases(),
        ]);
    }

    public function update(Request $request, Laporan $report)
    {
        /* VALIDATION */
        $validated = $request->validate(
            [
                'name' => ['required', 'regex: /[a-zA-Z]([0-9- ])?/i', 'min:3', 'max:35'],
                'type' => ['required', new Enum(ReportType::class)],
                'document' => ['mimes:pdf'],
                'start_date' => ['required', 'date'],
                'end_date' => ['required', 'date'],
            ],
            /* CUSTOME VALIDATION MESSAGES */
            [
                'name.required' => '* Nama laporan wajib diisi.',
                'name.regex' => '* Format nama laporan tidak sah.',
                'name.min' => '* Nama laporan minimal terdiri dari :min karakter.',
                'name.max' => '* Nama laporan maksimal terdiri dari :max karakter.',
                'type.required' => '* Tipe laporan wajib diisi.',
                'type.enum' => '* Tipe laporan tidak sah.',
                'document.mimes' => '* Tipe dokumen harus pdf.',
                'start_date.required' => '* Tanggal awal wajib diisi.',
                'start_date.date' => '* Format tanggal awal tidak sah.',
                'end_date.required' => '* Tanggal akhir wajib diisi.',
                'end_date.date' => '* Format tanggal akhir tidak sah.',
            ]
        );

        if ($request->hasFile('document')) {
            /* VARIABLE FOR CHANGE PATH, NAME, AND EXTENSION */
            $document_path = 'public/file/laporans';
            $document_name = $validated['type'] . '-' . $validated['start_date'] . '-' . $validated['end_date'] . '-' . uniqid();
            $document_extension = '.pdf';
            $document_name_with_extension = $document_name . $document_extension;

            /* SAVE FILE NAME TO DATABASE */
            $validated['document'] = $document_name_with_extension;

            /* STORE FILE TO STORAGE */
            $request->document->storeAs($document_path, $document_name_with_extension);

            /* DELETE OLD FILE */
            if ($request->document_old) {
                Storage::delete('public/file/laporans/' . $request->document_old);
            }
        }

        Laporan::where('id', $report->id)->update($validated);

        // return redirect(route('admin.laporans.index'))->with('notif', 'Data berhasil ditambahkan');
        return back()->with('notif', 'Data berhasil diubah');
    }

    public function destroy(Laporan $report)
    {
        /* DELETE FILE AT STORAGE */
        if ($report->document) {
            Storage::delete('public/file/laporans/' . $report->document);
        }

        /* DELETE DATA FORM DATABASE */
        Laporan::destroy($report->id);

        return redirect(route('admin.laporans.index'));
    }
}
