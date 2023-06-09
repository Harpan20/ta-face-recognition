@extends('layouts.app',['tittle'=>'Suku Bunga'])
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
                    <li class="breadcrumb-item active" aria-current="page">Suku Bunga</li>
                </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('birates.create')}}">Tambah Suku Bunga</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Suku Bunga</h5>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Nama Suku Bunga</th>
                                <th>Nilai Besaran Simpanan</th>
                                <th>Suku Bunga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sukus as $item)
                            <tr>
                                <td>1</td>
                                <td>{{$item->nama_sukubunga}}</td>
                                <td>Rp {{ number_format($item->nilai_besaran, 2, ",", ".") }}</td>
                                <td>{{$item->suku_bunga}}%</td>
                                <td class="d-flex">
                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                        <a class="btn btn-primary" href="{{route('birates.edit',$item->id_sukubunga)}}"><ion-icon name="pencil-sharp"></ion-icon></a>
                                    </div>
                                    &nbsp;
                                    <form method="POST" action="{{route('birates.delete',$item->id_sukubunga)}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger " onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')"><ion-icon name="trash-sharp"></ion-icon></button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
