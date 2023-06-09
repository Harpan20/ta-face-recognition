@extends('layouts.app',['tittle'=>'Detail E-form Deposito'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail E-form Deposito</li>
                  </ol>
                </nav>
            </div>
            <br>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('deposito.editStatus',$deposito->id_eform_deposito)}}">Update Status</a>
                </div>
            </div>
        </div>

        <div class="card">
            
            <div class="card-body">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jenis Identitas : </label>
                    <p>{{$deposito->jenis_identitas}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Lengkap : </label>
                    <p>{{$deposito->nama_lengkap}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Email : </label>
                    <p>{{$deposito->email}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jenis Kelamin : </label>
                    <p>{{$deposito->jenis_kelamin}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pekerjaan : </label>
                    <p>{{$deposito->pekerjaan}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Rencana Nominal : </label>
                    <p>{{$deposito->rencana_nominal}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pendidikan Terakhir : </label>
                    <p>{{$deposito->pendidikan_terakhir}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nomor Identitas : </label>
                    <p>{{$deposito->nomor_identitas}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Ibu : </label>
                    <p>{{$deposito->nama_ibu}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nomor Telepon : </label>
                    <p>{{$deposito->nomor_telpon}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jenis Deposito : </label>
                    <p>{{$deposito->jenis_deposito}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jangka Waktu : </label>
                    <p>{{$deposito->jangka_waktu}} Tahun</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Status : </label>
                    <div>
                        @if ($deposito->status == 'Disetujui')
                          <span class="text-success">{{$deposito->status}}</span>
                        @elseif($deposito->status == 'Ditolak')
                          <span class="text-danger">{{$deposito->status}}</span>
                        @elseif($deposito->status == 'Menunggu')
                          <span class="text-warning">{{$deposito->status}}</span>
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection