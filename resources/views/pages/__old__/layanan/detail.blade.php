@extends('layouts.app', ['tittle' => 'Detail Layanan'])
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
                                aria-current="page">Detail Layanan</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">{{ $layanan->nama_layanan }}</h5>
                        &nbsp;
                        <a href="{{ route('layanan.edit', $layanan->id_layanan) }}">
                            <ion-icon name="pencil-sharp"></ion-icon>
                        </a>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        <img src="/storage/images/bannerLayanan/{{ $layanan->banner_layanan }}"
                            class="img-thumbnail rounded mx-auto d-block"
                            width="500">
                        <br>
                        <a href="{{ route('layanan.editGambar', $layanan->id_layanan) }}">
                            <p class="text-center text-primary">Ganti Gambar</p>
                        </a>
                    </div>
                    <br>
                    <div class="col-md-12">
                        <div class="d-flex flex-row align-items-center gap-1">
                            <h6 class="mb-0">Thumbnail</h6>
                            <div class="btn-group">
                                {{-- <a class="btn btn-outline-primary"
                                href="{{ route('infoTambahan.create', $karir->id_karir) }}">
                                <ion-icon name="add-circle-outline" size="large"></ion-icon>
                            </a> --}}
                                <a class="card-body__add"
                                    href="{{ route('layanan.editThumbnail', $layanan->id_layanan) }}">
                                    <ion-icon name="pencil-sharp"
                                        size="10"></ion-icon>
                                </a>
                            </div>
                        </div>
                        <br>
                        <img src="{{ asset('/storage/images/thumbnailLayanan/' . $layanan->thumbnail_layanan) }}"
                            class="img-thumbnail rounded"
                            width="100">
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Deskripsi</h6>
                        </div>
                        <p class="text-justify">{!! $layanan->deskripsi_layanan !!}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h6>Tags</h6>
                        </div>
                        <div class="d-flex">
                            @foreach ($tag as $item)
                                <p class="bg-primary text-light rounded"
                                    style="padding: 10px">{{ $item }}</p>&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
