@extends('layouts.app', ['tittle' => 'Tambah Misi'])
@section('content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Misi</div>
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
                                Tambah Misi
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Tambahkan Misi</h6>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex">
                                <a class="btn btn-primary"
                                    href="{{ route('admin.misi.index') }}">
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
                                    action="{{ route('admin.misi.store') }}"
                                    method="POST"
                                    novalidate>
                                    @csrf

                                    <div class="col-md-12">
                                        <label for="body"
                                            class="form-label">
                                            Konten
                                        </label>
                                        <input class="form-control @error('body') is-invalid @enderror"
                                            id="body"
                                            type="text"
                                            value="{{ old('body') }}"
                                            name="body"
                                            required>
                                        @error('body')
                                            <div class="invalid-feedback">
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
@endsection