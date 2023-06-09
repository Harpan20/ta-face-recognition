@extends('layouts.app', ['tittle' => 'Edit Tata Kelola Perusahaan'])
@section('content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tata Kelola Perusahaan</div>
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
                                Edit Tata Kelola Perusahaan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Edit Tata Kelola Perusahaan</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex">
                                <a class="btn btn-primary"
                                    href="{{ route('admin.tata-kelola-perusahaan.index') }}">
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
                                <form class="row g-3 needs-validation"
                                    action="{{ route('admin.tata-kelola-perusahaan.update', $tata_kelola_perusahaan->id) }}"
                                    method="POST"
                                    novalidate>
                                    @csrf
                                    @method('PUT')

                                    <div class="col-md-12">
                                        <label class="form-label"
                                            for="body">
                                            Konten
                                        </label>
                                        <textarea id="body"
                                            name="body"
                                            class="form-control @error('body') is-invalid @enderror"
                                            data-editor>{{ old('body', $tata_kelola_perusahaan->body) }}</textarea>
                                        @error('body')
                                            <div class="invalid-feedback @error('body') d-block @enderror">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('[data-editor]'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
