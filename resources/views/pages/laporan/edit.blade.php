@extends('layouts.app', ['tittle' => 'Ubah Laporan'])
@section('content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">
                    Laporan
                </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page">
                                Ubah Laporan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">
                        Ubah Laporan
                    </h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex">
                                <a class="btn btn-primary"
                                    href="{{ route('admin.laporans.index') }}">
                                    <ion-icon name="chevron-back-sharp"></ion-icon>Kembali
                                </a>
                            </div>
                            <br>
                            <div class="p-4 border rounded">
                                @if (session()->has('notif'))
                                    <div class="alert alert-success alert-dismissible fade show"
                                        role="alert">
                                        <span>{{ session()->get('notif') }}</span>
                                        <button type="button"
                                            class="btn-close"
                                            data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <form class="row g-3"
                                    action="{{ route('admin.laporans.update', $report->id) }}"
                                    enctype="multipart/form-data"
                                    method="POST"
                                    novalidate>
                                    @csrf
                                    @method('put')
                                    <div class="col-md-12">
                                        <label for="name"
                                            class="form-label">
                                            Nama Laporan
                                        </label>
                                        <x-backend.input id="name"
                                            type="text"
                                            name="name"
                                            value="{{ old('name', $report->name) ?? '' }}" />
                                        <x-backend.invalid-feedback error="name" />
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label"
                                            for="type">
                                            Tipe
                                        </label>
                                        <x-backend.select id="type"
                                            name="type">
                                            <option selected
                                                disabled>
                                                Pilih Tipe
                                            </option>
                                            @foreach ($report_types as $type)
                                                <option value="{{ $type->value }}"
                                                    {{ old('type', $report->type) === $type->value ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </x-backend.select>
                                        <x-backend.invalid-feedback error="type" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="start-date">
                                            Tanggal Awal
                                        </label>
                                        <x-backend.input id="start-date"
                                            name="start_date"
                                            type="date"
                                            value="{{ old('start_date', $report->start_date->format('Y-m-d')) ?? '' }}" />
                                        <x-backend.invalid-feedback error="start_date" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="end-date">
                                            Tanggal akhir
                                        </label>
                                        <x-backend.input id="end-date"
                                            name="end_date"
                                            type="date"
                                            value="{{ old('end_date', $report->end_date->format('Y-m-d')) ?? '' }}" />
                                        <x-backend.invalid-feedback error="end_date" />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="document"
                                            class="form-label">
                                            Dokumen
                                        </label>
                                        <x-backend.input id="document"
                                            name="document"
                                            type="file"
                                            value="{{ old('document') ?? '' }}" />
                                        <x-backend.invalid-feedback error="document" />
                                        <x-backend.input name="document_old"
                                            type="hidden"
                                            value="{{ $report->document }}" />
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary"
                                            type="submit">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
