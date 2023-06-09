@extends('layouts.app',['tittle'=>'Detail Artikel'])
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Detail</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Promo</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">{{$artikel->judul_artikel}}</h5>
                    &nbsp;
                    <a href="{{route('artikel.edit',$artikel->id_artikel)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    <img src="/storage/images/bannerArtikel/{{$artikel->banner_artikel}}" class="img-thumbnail rounded mx-auto d-block" width="500">
                    <br>
                    <a href="{{route('artikel.editGambar',$artikel->id_artikel)}}"><p class="text-center text-primary">Ganti Gambar</p></a>
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
                                href="{{route('artikel.editThumbnail',$artikel->id_artikel)}}">
                                <ion-icon name="pencil-sharp" size="10"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <br>
                    <img src="/storage/images/thumbnailArtikel/{{$artikel->thumbnail_artikel}}" class="img-thumbnail rounded" width="100">
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="text-justify">{!! $artikel->deskripsi_artikel !!}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Status</h6>
                        <a href="{{route('artikel.editStatus',$artikel->id_artikel)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                    </div>
                    <p>{{$artikel->status_artikel}}</p>
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