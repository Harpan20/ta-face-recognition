@extends('layouts.app', ['tittle' => 'Detail E-form Tabungan'])
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Detail</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Detail E-form Tabungan</li>
                        </ol>
                    </nav>
                </div>
                <br>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a class="btn btn-outline-primary"
                            href="{{ route('tabungan.editStatus', $tabungan->id_eform_tabungan) }}">Update Status</a>
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Jenis Identitas : </label>
                        <p>{{ $tabungan->jenis_identitas }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nama Lengkap : </label>
                        <p>{{ $tabungan->nama_lengkap }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Email : </label>
                        <p>{{ $tabungan->email }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Jenis Kelamin : </label>
                        <p>{{ $tabungan->jenis_kelamin }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Jenis Pekerjaan : </label>
                        <p>{{ $tabungan->pekerjaan }}</p>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Pendidikan Terakhir : </label>
                        <p>{{ $tabungan->pendidikan_terakhir }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nomor Identitas : </label>
                        <p>{{ $tabungan->nomor_identitas }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nama Ibu : </label>
                        <p>{{ $tabungan->nama_ibu }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nomor Telepon : </label>
                        <p>{{ $tabungan->nomor_telpon }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Jenis Tabungan : </label>
                        <p>{{ $tabungan->jenis_tabungan }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nominal Tabungan : </label>
                        <p>Rp {{ number_format(floatval($tabungan->nominal_tabungan), 0, ',', '.') }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Status : </label>
                        <div>
                            @if ($tabungan->status == 'Disetujui')
                                <span class="text-success">{{ $tabungan->status }}</span>
                            @elseif($tabungan->status == 'Ditolak')
                                <span class="text-danger">{{ $tabungan->status }}</span>
                            @elseif($tabungan->status == 'Menunggu')
                                <span class="text-warning">{{ $tabungan->status }}</span>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
