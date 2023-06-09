@extends('layouts.app',['tittle'=>'Detail Laporan Tahunan'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail Laporan Tahunan</li>
                  </ol>
                </nav>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">{{$laporan->nama_tahunan}}</h5>
                    &nbsp;
                    <a href="{{route('tahunan.edit',$laporan->id_tahunan)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <hr />
                <br>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Tahun</h6>
                    </div>
                    <p class="align-items-justify">{{$laporan->tahun}}</p>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="d-flex"> 
                        <h6>Dokumen</h6>
                        &nbsp;
                        <a href="{{route('tahunan.editDokumen',$laporan->id_tahunan)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                    </div>
                    <div class="d-flex">
                        <a href="{{route('tahunan.download',$laporan->id_tahunan)}}"><span>Lihat disini</span></a>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="d-flex">
                        <h6>Deskripsi</h6>
                    </div>
                    <p class="align-items-justify">{!!$laporan->deskripsi!!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection