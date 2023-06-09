@extends('layouts.app',['tittle'=>'Detail Produk'])
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
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">{{$produk->nama_produk}}</h5>
                    &nbsp;
                    <a href="{{route('produk.edit',$produk->id_produk)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    <img src="/storage/images/bannerProduk/{{$produk->banner_produk}}" class="img-thumbnail rounded mx-auto d-block" width="500">
                    <br>
                    <a href="{{route('produk.editGambar',$produk->id_produk)}}"><p class="text-center text-primary">Ganti Banner</p></a>
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
                                href="{{route('produk.editThumbnail',$produk->id_produk)}}">
                                <ion-icon name="pencil-sharp" size="10"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <br>
                    <img src="/storage/images/thumbnailProduk/{{$produk->thumbnail_produk}}" class="img-thumbnail rounded" width="100">
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="text-justify">{!! $produk->deskripsi_produk !!}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Bunga Produk</h6>
                    </div>
                    <p class="text-justify">{{ $produk->bunga_produk }}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Nominal Minimum</h6>
                    </div>
                    <p class="text-justify">{{ $produk->nominal_min }}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Nominal Maksimum</h6>
                    </div>
                    <p class="text-justify">{{ $produk->nominal_max }}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Jangka Waktu</h6>
                    </div>
                    <p class="text-justify">{{ $produk->jangka_min }} <strong>s/d</strong> {{$produk->jangka_max}} Bulan</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Kelipatan</h6>
                    </div>
                    <p class="text-justify">{{$produk->kelipatan}} </p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Nominal Kelipatan</h6>
                    </div>
                    <p class="text-justify">{{$produk->nominal_kelipatan}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex flex-row align-items-center gap-1">
                        <h6 class="mb-0">Range</h6>
                        <div class="btn-group">
                            {{-- <a class="btn btn-outline-primary"
                                href="{{ route('infoTambahan.create', $karir->id_karir) }}">
                                <ion-icon name="add-circle-outline" size="large"></ion-icon>
                            </a> --}}
                            <a class="card-body__add"
                                href="{{route('range.produk',$produk->id_produk)}}">
                                <ion-icon name="add-circle-outline" size="large"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <br>
                    @foreach ($range as $item)
                            <ul>
                                <li>{{$item}}</li>
                            </ul>
                    @endforeach
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Kategori</h6>
                    </div>
                    <p class="align-items-justify">{{$produk->kategori_produk}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Tags</h6>
                    </div>
                    <div class="d-flex">
                        @foreach ($tag as $item)
                            <p class="bg-primary text-light rounded" style="padding: 10px">#{{$item}}</p>&nbsp;
                        @endforeach
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection