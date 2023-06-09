@extends('layouts.app', ['tittle' => 'Detail Pesan'])
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Pesan</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="javascript:;">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page">Detail Pesan</li>
                        </ol>
                    </nav>
                </div>
                <br>
                <div class="ms-auto">
                    <div class="btn-group">
                        @if ($pesan->jawaban == '')
                            <a class="btn btn-outline-primary"
                                href="{{ route('pesan.edit', $pesan->id_pesan) }}">Kirim Jawaban</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nama : </label>
                        <p>{{ $pesan->username }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Email : </label>
                        <p>{{ $pesan->email }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nomor telepon : </label>
                        <p>{{ $pesan->phone_number }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Pertanyaan : </label>
                        <p>{{ $pesan->pertanyaan }}</p>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Jawaban </label>
                        <div class="d-flex">
                            @if ($pesan->jawaban == '')
                                <p> </p>
                            @else
                                <p>{!! $pesan->jawaban !!}&nbsp;<a href="{{ route('pesan.edit', $pesan->id_pesan) }}"
                                        style="size: 3px;">
                                        <ion-icon name="pencil-sharp"></ion-icon>
                                    </a></p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Status : </label>
                        <div>
                            @if ($pesan->status == \App\Enums\MessageStatus::Sudah->value)
                                <span class="text-success">{{ $pesan->status }}</span>
                            @elseif($pesan->status == \App\Enums\MessageStatus::Belum->value)
                                <span class="text-warning">{{ $pesan->status }}</span>
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
