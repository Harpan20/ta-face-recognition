@extends('layouts.app',['tittle'=>'Tabel Promo'])

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
                    <li class="breadcrumb-item active" aria-current="page">Tabel Promo</li>
                </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('promo.create')}}">Tambah Promo</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Promo</h5>
                    <form class="ms-auto position-relative" action="" method="GET">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                        <input class="form-control ps-5" type="text" name="q" value="{{$request->q}}" placeholder="search">
                    </form>
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
                        <div class="table-responsive mt-3">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>#</th>
                                    <th>Nama Promo</th>
                                    <th colspan="2">Periode Promo</th>
                                    <th>Dibuat</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promos as $key => $promo )
                                        <tr>
                                            <td>{{$promos -> firstItem()+$key}}</td>
                                            <td>{{$promo->nama_promo}}</td>
                                            <td colspan="2">
                                                {{ date('h:i:s - d M Y', strtotime($promo->mulai_promo)) }}
                                                <br>
                                                <strong class="text-center">s/d</strong>
                                                <br>
                                                {{ date('h:i:s - d M Y', strtotime($promo->akhir_promo)) }}
                                            </td>
                                            <td>{{ date('h:i:s - d M Y', strtotime($promo->created_at)) }}</td>
                                            <td>{{ date('h:i:s - d M Y', strtotime($promo->updated_at)) }}</td>
                                            <td>{{$promo->status_promo}}</td>
                                            <td>
                                                <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                    <a href="{{route('promo.detail',$promo->id_promo)}}" class="btn btn-warning text-light"><ion-icon name="eye-sharp"></ion-icon></a>
                                                    <form action="{{route('promo.delete',$promo->id_promo)}}"  method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger " onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')"><ion-icon name="trash-sharp"></ion-icon></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {!! $promos->links() !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="table-responsive mt-3">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>#</th>
                                    <th>Nama Promo</th>
                                    <th colspan="2">Periode Promo</th>
                                    <th>Dibuat</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publish as $promo)
                                        <tr>
                                            <td>1</td>
                                            <td>{{$promo->nama_promo}}</td>
                                            <td colspan="2">{{$promo->mulai_promo}} s/d {{$promo->akhir_promo}}</td>
                                            <td>{{$promo->created_at}}</td>
                                            <td>{{$promo->updated_at}}</td>
                                            <td>{{$promo->status_promo}}</td>
                                            <td>
                                                <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                    <a href="{{route('promo.detail',$promo->id_promo)}}" class="btn btn-warning text-light"><ion-icon name="eye-sharp"></ion-icon></a>
                                                    <form action="{{route('promo.delete',$promo->id_promo)}}"  method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger " onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')"><ion-icon name="trash-sharp"></ion-icon></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {!! $publish->links() !!}
                        </div>
                    </div>

                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="table-responsive mt-3">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>#</th>
                                    <th>Nama Promo</th>
                                    <th colspan="2">Periode Promo</th>
                                    <th>Dibuat</th>
                                    <th>Terakhir diupdate</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($nopublish as $promo)
                                        <tr>
                                            <td>1</td>
                                            <td>{{$promo->nama_promo}}</td>
                                            <td colspan="2">{{$promo->mulai_promo}} s/d {{$promo->akhir_promo}}</td>
                                            <td>{{$promo->created_at}}</td>
                                            <td>{{$promo->updated_at}}</td>
                                            <td>{{$promo->status_promo}}</td>
                                            <td>
                                                <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                    <a href="{{route('promo.detail',$promo->id_promo)}}" class="btn btn-warning text-light"><ion-icon name="eye-sharp"></ion-icon></a>
                                                    <form action="{{route('promo.delete',$promo->id_promo)}}"  method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger " onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')"><ion-icon name="trash-sharp"></ion-icon></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {!! $publish->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
