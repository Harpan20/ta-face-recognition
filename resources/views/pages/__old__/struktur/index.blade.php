@extends('layouts.app',['tittle'=>'Tabel Struktur Organisasi'])

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tabel</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Tabel Struktur Organisasi</li>
                </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('struktur.create')}}">Tambah Struktur</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Struktur Organisasi</h5>
                </div>
                <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Semua</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Publish</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tidak Publish</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="row">
                            @foreach ($struktur as $item)
                                <div class="col-md-3">
                                    <div class="card" style="width: 15rem;">
                                        <img src="/storage/images/struktur/{{$item->gambar}}" height="280" class="card-img-top">
                                        <div class="card-body">
                                        <a href="{{route('struktur.editGambar',$item->id_struktur)}}"><p class="text-center text-primary">Ganti Gambar</p></a>
                                        <div class="d-flex">
                                            <span class="card-tittle"><strong>{{$item->nama}}</strong></span>
                                            &nbsp;
                                            <a href="{{route('struktur.edit',$item->id_struktur)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                                        </div>
                                        <p class="card-text">{{$item->jabatan}}</p>
                                        <p class="card-text fw-bold">{{$item->kategori_struktur}}</p>
                                        @if ($item->status == "Publish")
                                            <a href="{{route('struktur.editStatus',$item->id_struktur)}}" class="bg-success rounded text-white p-2"><span style="padding: 2%">Publish</span><ion-icon name="pencil-sharp"></ion-icon></a>
                                        @elseif($item->status == "Tidak Publish")
                                            <a href="{{route('struktur.editStatus',$item->id_struktur)}}"><span class="bg-danger rounded text-white" style="padding: 2%">Tidak Publish</span></a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {!! $struktur->links() !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>
                        <div class="row">
                            @foreach ($publish as $item)
                                <div class="col-md-3">
                                    <div class="card" style="width: 15rem;">
                                        <img src="/storage/images/struktur/{{$item->gambar}}" height="280" class="card-img-top">
                                        <div class="card-body">
                                        <a href="{{route('struktur.editGambar',$item->id_struktur)}}"><p class="text-center text-primary">Ganti Gambar</p></a>
                                        <div class="d-flex">
                                            <span class="card-tittle"><strong>{{$item->nama}}</strong></span>
                                            &nbsp;
                                            <a href="{{route('struktur.edit',$item->id_struktur)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                                        </div>
                                        <p class="card-text">{{$item->jabatan}}</p>
                                        <p class="card-text">{{$item->kategori_struktur}}</p>
                                        @if ($item->status == "Publish")
                                            <a href="{{route('struktur.editStatus',$item->id_struktur)}}" class="bg-success rounded text-white p-2"><span style="padding: 2%">Publish</span><ion-icon name="pencil-sharp"></ion-icon></a>
                                        @elseif($item->status == "Tidak Publish")
                                            <a href="{{route('struktur.editStatus',$item->id_struktur)}}" class="bg-danger rounded text-white"><span  style="padding: 2%">Tidak Publish</span></a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {!! $publish->links() !!}
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <br>
                        <div class="row">
                            @foreach ($nopublish as $item)
                                <div class="col-md-3">
                                    <div class="card" style="width: 15rem;">
                                        <img src="/storage/images/struktur/{{$item->gambar}}" height="280" class="card-img-top">
                                        <div class="card-body">
                                        <a href="{{route('struktur.editGambar',$item->id_struktur)}}"><p class="text-center text-primary">Ganti Gambar</p></a>
                                        <div class="d-flex">
                                            <span class="card-tittle"><strong>{{$item->nama}}</strong></span>
                                            &nbsp;
                                            <a href="{{route('struktur.edit',$item->id_struktur)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                                        </div>
                                        <p class="card-text">{{$item->jabatan}}</p>
                                        @if ($item->status == "Publish")
                                            <a href="{{route('struktur.editStatus',$item->id_struktur)}}" class="bg-success rounded text-white p-2"><span style="padding: 2%">Publish</span><ion-icon name="pencil-sharp"></ion-icon></a>
                                        @elseif($item->status == "Tidak Publish")
                                            <a href="{{route('struktur.editStatus',$item->id_struktur)}}"><span class="bg-danger rounded text-white" style="padding: 2%">Tidak Publish</span></a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            {!! $nopublish->links() !!}
                        </div>
                    </div>
                </div>
                <br>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection