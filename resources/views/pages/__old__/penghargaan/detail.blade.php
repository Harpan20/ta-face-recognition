@extends('layouts.app',['tittle'=>'Detail Penghargaan'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail Penghargaan</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">{{$penghargaan->penghargaan}}</h5>
                    &nbsp;
                    <a href="{{route('penghargaan.edit',$penghargaan->id_penghargaan)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br><br>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Penyelenggara</h6>
                    </div>
                    <p class="align-items-justify">{{$penghargaan->penyelenggara}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="align-items-justify">{!!$penghargaan->deskripsi_penghargaan!!}</p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection