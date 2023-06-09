@extends('layouts.app',['tittle'=>'Detail Berita'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h5 class="mb-0">{{$berita->judul_berita}}</h5>
                    &nbsp;
                    <a href="{{route('berita.edit',$berita->id_berita)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    <img src="/storage/images/bannerBerita/{{$berita->banner_berita}}" class="img-thumbnail rounded mx-auto d-block" width="500">
                    <br>
                    <a href="{{route('berita.editGambar',$berita->id_berita)}}"><p class="text-center text-primary">Ganti Banner</p></a>
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
                                href="{{route('berita.editThumbnail',$berita->id_berita)}}">
                                <ion-icon name="pencil-sharp" size="10"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <br>
                    <img src="/storage/images/thumbnailBerita/{{$berita->thumbnail_berita}}" class="img-thumbnail rounded" width="100">
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="text-justify">{!! $berita->deskripsi_berita !!}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Status</h6>
                        <a href="{{route('berita.editStatus',$berita->id_berita)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                    </div>
                    <p>{{$berita->status_berita}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Tags</h6>
                    </div>
                    <div class="d-flex">
                        @foreach ($tag as $item)
                            <p class="bg-primary text-light rounded" style="padding: 10px">{{$item}}</p>&nbsp;
                        @endforeach
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection