@extends('layouts.app', ['tittle' => 'Dashboard'])

@section('content')
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <h3>Dashboard</h3>
            </div>
            <!--end breadcrumb-->


            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="widget-icon-2 bg-gradient-info text-white">
                                    <ion-icon name="bag-handle-sharp"></ion-icon>
                                </div>
                                <div class="fs-5 ms-auto">
                                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                </div>
                            </div>
                            <h5 class="my-3">Tabungan</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $tabunganWait }}
                                    </span>
                                    <p>Menunggu</p>
                                </div>
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $tabunganSetuju }}
                                    </span>
                                    <p>Disetujui</p>
                                </div>
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $tabunganTolak }}
                                    </span>
                                    <p>Ditolak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="widget-icon-2 bg-gradient-danger text-white">
                                    <ion-icon name="card-sharp"></ion-icon>
                                </div>
                                <div class="fs-5 ms-auto">
                                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                </div>
                            </div>
                            <h5 class="my-3">Kredit</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $kreditWait }}
                                    </span>
                                    <p>Menunggu</p>
                                </div>
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $kreditSetuju }}
                                    </span>
                                    <p>Disetujui</p>
                                </div>
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $kreditTolak }}
                                    </span>
                                    <p>Ditolak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="widget-icon-2 bg-gradient-success text-white">
                                    <ion-icon name="wallet-sharp"></ion-icon>
                                </div>
                                <div class="fs-5 ms-auto">
                                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                </div>
                            </div>
                            <h5 class="my-3">Deposito</h5>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $depositoWait }}
                                    </span>
                                    <p>Menunggu</p>
                                </div>
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $depositoSetuju }}
                                    </span>
                                    <p>Disetujui</p>
                                </div>
                                <div class="col-md-4">
                                    <span class="fw-bold">
                                        {{ $depositoTolak }}
                                    </span>
                                    <p>Ditolak</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-0">Pesan</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                data-bs-toggle="dropdown">
                                <div class="fs-5 ms-auto">
                                    <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                        href="#">Action</a></li>
                                <li><a class="dropdown-item"
                                        href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                        href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesan as $key => $item)
                                    <tr>
                                        <td>{{ $pesan->firstItem() + $key }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>
                                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                <a href="#"
                                                    class="btn btn-warning text-light">
                                                    <ion-icon name="eye-sharp"></ion-icon>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $pesan->links() }}
                    </div>
                </div>
            </div>

        </div>
        <!-- end page content-->
    </div>
    <!--end page content wrapper-->
@endsection
