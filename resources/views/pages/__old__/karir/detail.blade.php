@extends('layouts.app', ['tittle' => 'Detail Karir'])
@section('content')
    <style>
        ion-icon {
            color: hsl(193, 61%, 43%);
            transition: color 300ms;
        }

        .card-body__add:hover ion-icon {
            /* color: hsl(193, 61%, 43%); */
            color: hsl(193, 59%, 21%);
        }

        .card-body__delete {
            background-color: transparent;
            outline: none;
            border: none
        }

        .card-body__delete:hover ion-icon,
            {
            color: hsl(193, 59%, 21%);
        }

        .card-body__delete:focus ion-icon {
            outline: -webkit-focus-ring-color auto 5px;
        }
    </style>

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
                            <li class="breadcrumb-item active" aria-current="page">Detail Karir</li>
                        </ol>
                    </nav>
                </div>
                {{-- <div class="ms-auto">
                    <div class="btn-group">
                        <a class="btn btn-outline-primary"
                            href="{{ route('infoTambahan.create', $karir->id_karir) }}">Tambah
                            Info </a>
                    </div>
                </div> --}}
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="mb-0">{{ $karir->judul_karir }}</h5>
                        &nbsp;
                        <a href="{{ route('karir.edit', $karir->id_karir) }}">
                            <ion-icon name="pencil-sharp"></ion-icon>
                        </a>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <img src="/storage/images/karir/{{ $karir->gambar }}" class="img-thumbnail rounded mx-auto d-block"
                            width="500">
                        <br>
                        <a href="{{ route('karir.editGambar', $karir->id_karir) }}">
                            <p class="text-center text-primary">Ganti Gambar</p>
                        </a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Deskripsi</h6>
                        </div>
                        <p class="text-justify">{!! $karir->deskripsi_karir !!}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Posisi Karir</h6>
                        </div>
                        <p>{{ $karir->posisi_karir }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Tingkat Pengalaman</h6>
                        </div>
                        <p>{{ $karir->tingkat_pengalaman }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Status</h6>
                            <a href="{{ route('karir.editStatus', $karir->id_karir) }}">
                                <ion-icon name="pencil-sharp"></ion-icon>
                            </a>
                        </div>
                        <p>{{ $karir->status_karir }}</p>
                    </div>
                    <hr>
                    <div>
                        <div class="d-flex flex-row align-items-center gap-1">
                            <h6 class="mb-0">Informasi Tambahan</h6>
                            <div class="btn-group">
                                {{-- <a class="btn btn-outline-primary"
                                    href="{{ route('infoTambahan.create', $karir->id_karir) }}">
                                    <ion-icon name="add-circle-outline" size="large"></ion-icon>
                                </a> --}}
                                <a class="card-body__add"
                                    href="{{ route('infoTambahan.create', $karir->id_karir) }}">
                                    <ion-icon name="add-circle-outline" size="large"></ion-icon>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($informasi as $item)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <h6 class="mb-0">{{ $item->judul_info }}</h6>
                                                &nbsp;
                                                <a href="{{ route('infoTambahan.edit', $item->id_info) }}">
                                                    <ion-icon name="pencil-sharp"></ion-icon>
                                                </a>
                                                <form class="ms-auto" action="{{route('infoTambahan.delete',$item->id_info)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="card-body__delete" onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')">
                                                        <ion-icon name="close-circle-outline" size="large"></ion-icon>
                                                    </button>
                                                </form>
                                            </div>
                                            <p>{!! $item->deskripsi_info !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Tags</h6>
                        </div>
                        <div class="d-flex">
                            @foreach ($tag as $item)
                                <p class="bg-primary text-light rounded" style="padding: 10px">#{{ $item }}</p>
                                &nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
