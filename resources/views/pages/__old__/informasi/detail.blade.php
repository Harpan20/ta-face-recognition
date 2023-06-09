@extends('layouts.app',['tittle'=>'Detail Informasi'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail Informasi</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">{{$informasi->nama_kantor}}</h5>
                    &nbsp;
                    <a href="{{route('informasi.edit',$informasi->id_informasi)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Alamat</h6>
                    </div>
                    <p class="text-justify">{!! $informasi->alamat_kantor !!}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="text-justify">{!! $informasi->deskripsi_informasi !!}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Nomor Telepon</h6>
                    </div>
                    <p class="text-justify">{{$informasi->no_telpon}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Media Sosial</h6>
                    </div>
                    <ul>
                        <li><strong>Nomor Whatsapp</strong></li>
                        <p>{{$informasi->nomor_wa}}</p>
                        <li><strong>Facebook</strong></li>
                        <p>{{$informasi->facebook}}</p>
                        <li><strong>Youtube</strong></li>
                        <p>{{$informasi->youtube}}</p>
                    </ul>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection