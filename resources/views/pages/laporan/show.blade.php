@extends('layouts.app', ['tittle' => 'Detail ' . $report->name])
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Detail</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Detail {{ $report->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center">
                            <div>
                                {{ $report->name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ol class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Nama Laporan</div>
                                {{ $report->name }}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Tipe</div>
                                {{ Str::title($report->type) }}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Dokumen</div>
                                <a class="btn d-flex align-items-center px-0"
                                    href="{{ asset('storage/file/laporans/' . $report->document) }}"
                                    target="_blank"
                                    rel="noopener noreferrer">
                                    <div
                                        class="rounded bg-primary text-light d-flex justify-content-between align-items-center p-1 gap-1">
                                        <ion-icon name="document"></ion-icon>
                                        <div>
                                            Lihat file
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Tanggal Mulai</div>
                                {{ $report->start_date->format('d M Y') }}
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="fw-bold">Tanggal Akhir</div>
                                {{ $report->end_date->format('d M Y') }}
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 d-flex gap-2 justify-content-lg-end">
                            <a class="btn btn-primary  d-flex align-items-center gap-2"
                                href="{{ route('admin.laporans.index') }}">
                                <ion-icon name="chevron-back"></ion-icon>
                                <div class="d-none d-lg-block">
                                    Kembali
                                </div>
                            </a>
                            <a class="btn btn-warning d-flex align-items-center gap-2"
                                href="{{ route('admin.laporans.edit', $report->id) }}">
                                <ion-icon name="brush"></ion-icon>
                                <div class="d-none d-lg-block">
                                    Ubah
                                </div>
                            </a>
                            <form action="{{ route('admin.laporans.destroy', $report->id) }}"
                                enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger d-flex align-items-center gap-2"
                                    onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')">
                                    <ion-icon name="trash-sharp"></ion-icon>
                                    <div class="d-none d-lg-block">
                                        Hapus
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            {{-- <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ $laporan->nama_kelola }}</h5>
                        &nbsp;
                        <a href="{{ route('kelola.edit', $laporan->id_kelola) }}">
                            <ion-icon name="pencil-sharp"></ion-icon>
                        </a>
                    </div>
                    <hr />
                    <br>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Tahun</h6>
                        </div>
                        <p class="align-items-justify">{{ $laporan->bulan }}</p>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Tahun</h6>
                        </div>
                        <p class="align-items-justify">{{ $laporan->tahun }}</p>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="d-flex mb-0">
                            <h6>Dokumen</h6>
                            &nbsp;
                            <a class="mb-0"
                                href="{{ route('kelola.editDokumen', $laporan->id_kelola) }}">
                                <ion-icon name="pencil-sharp"></ion-icon>
                            </a>
                        </div>
                        <div class="d-flex">
                            <a href="{{ route('kelola.download', $laporan->id_kelola) }}"><span>Lihat disini</span></a>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Deskripsi</h6>
                        </div>
                        <p class="align-items-justify">{!! $laporan->deskripsi_kelola !!}</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
