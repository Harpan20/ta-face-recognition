@extends('layouts.app', ['tittle' => 'Tabel Visi'])

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tabel</div>
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
                                Tabel Visi
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a class="btn btn-outline-primary"
                            href="{{ route('admin.visi.create') }}">
                            Tambah Visi
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row gap-2">
                        <div class="col d-flex align-items-center">
                            <h5 class="mb-0">
                                Visi
                            </h5>
                        </div>
                        <div class="col-md-4">
                            <form class="d-flex justify-content-md-end gap-2"
                                action="{{ route('admin.visi.search') }}"
                                method="get">
                                <div class="position-relative">
                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                        <ion-icon name="search-sharp"></ion-icon>
                                    </div>
                                    <input class="form-control ps-5"
                                        type="search"
                                        name="query"
                                        value="{{ request('query') }}"
                                        placeholder="Cari">
                                </div>
                                <button class="btn btn-primary"
                                    type="submit">
                                    Cari
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visis as $visi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $visi->title }}</td>
                                        <td>{!! $visi->body !!}</td>
                                        <td>
                                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                <a class="btn btn-primary text-light"
                                                    href="{{ route('admin.visi.edit', $visi->id) }}">
                                                    <ion-icon name="pencil-sharp"></ion-icon>
                                                </a>
                                                <form action="{{ route('admin.visi.destroy', $visi->id) }}"
                                                    enctype="multipart/form-data"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')">
                                                        <ion-icon name="trash-sharp"></ion-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div>
                    {!! $tentangs->links() !!}
                </div> --}}
                </div>
            </div>

        </div>
    </div>
@endsection
