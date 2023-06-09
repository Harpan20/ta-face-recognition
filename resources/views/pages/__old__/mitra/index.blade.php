@extends('layouts.app',['tittle'=>'Tabel Mitra'])

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
                    <li class="breadcrumb-item active" aria-current="page">Tabel Mitra Asuransi</li>
                </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('mitra.create')}}">Tambah Mitra Asuransi</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Mitra</h5>
                    <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead class="table-secondary">
                            <tr>
                            <th>#</th>
                            <th>Nama Mitra</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                        <a class="btn btn-warning text-light"><ion-icon name="eye-sharp"></ion-icon></a>
                                        <form>
                                            <button class="btn btn-danger "><ion-icon name="trash-sharp"></ion-icon></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection