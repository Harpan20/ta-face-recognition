@extends('layouts.app',['tittle'=>'Tabel Laporan Tata Kelola'])

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
                    <li class="breadcrumb-item active" aria-current="page">Tabel Laporan Tata Kelola</li>
                </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('kelola.create')}}">Tambah Laporan</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Laporan Tata Kelola</h5>
                    <form class="ms-auto position-relative d-flex" action="" method="GET">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="chevron-down-circle-sharp"></ion-icon></div>
                        <select name="q" class="form-control ps-5">
                            @php
                                            $tahun = date('Y');
                                            $tahun_skrg = (int)$tahun - 5;
                                            for($i = $tahun; $i >= $tahun_skrg; $i--){
                                                echo "<option>$i</option>";
                                            }
                            @endphp
                        </select>
                        &nbsp;
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle">
                        <thead class="table-secondary">
                            <tr>
                            <th>#</th>
                            <th>Nama Laporan</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($laporan as $key => $item)
                            <tr>
                                <td>{{$laporan->firstItem()+$key}}</td>
                                <td>{{$item->nama_kelola}}</td>
                                <td>{{$item->bulan}}</td>
                                <td>{{$item->tahun}}</td>
                                <td>
                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                        <a class="btn btn-warning text-light" href="{{route('kelola.detail',$item->id_kelola)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                                        <form action="{{route('kelola.delete',$item->id_kelola)}}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger "  onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')"><ion-icon name="trash-sharp"></ion-icon></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {!! $laporan->links() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection