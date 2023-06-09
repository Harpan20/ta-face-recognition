@extends('layouts.app',['tittle'=>'Detail E-form Kredit'])
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
                <a class="btn btn-outline-primary" href="{{route('kredit.editStatus',$kredit->id_eform_kredit)}}">Update Status</a>
                </div>
            </div>
        </div>

        <div class="card">
            
            <div class="card-body">
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jenis Identitas : </label>
                    <p>{{$kredit->jenis_identitas}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Lengkap : </label>
                    <p>{{$kredit->nama_lengkap}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Email : </label>
                    <p>{{$kredit->email}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jenis Kelamin : </label>
                    <p>{{$kredit->jenis_kelamin}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pekerjaan : </label>
                    <p>{{$kredit->pekerjaan}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Rencana Nominal : </label>
                    <p>{{$kredit->rencana_nominal}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pendidikan Terakhir : </label>
                    <p>{{$kredit->pendidikan_terakhir}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nomor Identitas : </label>
                    <p>{{$kredit->nomor_identitas}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nama Ibu : </label>
                    <p>{{$kredit->nama_ibu}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Nomor Telepon : </label>
                    <p>{{$kredit->nomor_telpon}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jenis Kredit : </label>
                    <p>{{$kredit->jenis_kredit}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jangka Waktu : </label>
                    <p>{{$kredit->jangka_waktu}} Tahun</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Status : </label>
                    <div>
                        @if ($kredit->status == 'Disetujui')
                          <span class="text-success">{{$kredit->status}}</span>
                        @elseif($kredit->status == 'Ditolak')
                          <span class="text-danger">{{$kredit->status}}</span>
                        @elseif($kredit->status == 'Menunggu')
                          <span class="text-warning">{{$kredit->status}}</span>
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection