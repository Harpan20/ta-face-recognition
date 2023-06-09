@extends('layouts.app',['tittle'=>'Detail Sejarah'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail Sejarah</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">{{$sejarah->judul_sejarah}}</h5>
                    &nbsp;
                    <a href="{{route('sejarah.edit',$sejarah->id_sejarah)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    <img src="/storage/images/sejarah/{{$sejarah->gambar}}" class="img-thumbnail rounded mx-auto d-block" width="500">
                    <br>
                    <a href="{{route('sejarah.editGambar',$sejarah->id_sejarah)}}"><p class="text-center text-primary">Ganti Gambar</p></a>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Sub Judul</h6>
                    </div>
                    <p class="text-justify">{{$sejarah->subjudul_sejarah}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="text-justify">{!! $sejarah->deskripsi_sejarah !!}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Tags</h6>
                    </div>
                    <div class="d-flex">
                        @foreach ($tags as $item)
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