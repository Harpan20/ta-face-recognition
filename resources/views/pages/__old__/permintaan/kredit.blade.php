@extends('layouts.app',['tittle'=>'Tabel Pemintaan'])
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
                    <li class="breadcrumb-item active" aria-current="page">Tabel Permintaan</li>
                </ol>
                </nav>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                 <h5 class="mb-0">Permintaan</h5>
                 <form class="ms-auto position-relative" action="" method="GET">
                  <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                  <input class="form-control ps-5" type="text" name="q" value="{{$request->q}}" placeholder="search">
                </form>
              </div>
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Semua</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="menunggu-tab" data-bs-toggle="tab" data-bs-target="#menunggu" type="button" role="tab" aria-controls="menunggu" aria-selected="false">Menunggu</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Disetujui</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Ditolak</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                      <thead class="table-light">
                       <tr>
                         <th>#</th>
                         <th>Email Pengirim</th>
                         <th>Nama</th>
                         <th>Nomor Telepon</th>
                         <th>Status</th>
                         <th>Aksi</th>
                       </tr>
                       </thead>
                       <tbody>
                        @foreach($kredit as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->nama_lengkap}}</td>
                          <td>{{$item->nomor_telpon}}</td>
                          <td>
                            @if ($item->status == 'Disetujui')
                              <span class="badge bg-light-success text-success w-100">{{$item->status}}</span>
                            @elseif($item->status == 'Ditolak')
                              <span class="badge bg-light-danger text-danger w-100">{{$item->status}}</span>
                            @elseif($item->status == 'Menunggu')
                              <span class="badge bg-light-warning text-warning w-100">{{$item->status}}</span>
                            @endif
                          </td>
                          <td>
                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                              <a class="btn btn-warning text-light" href="{{route('kredit.detail',$item->id_eform_kredit)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div>
                    {!! $kredit->links() !!}
                  </div>
                </div>
                <div class="tab-pane fade" id="menunggu" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                      <thead class="table-light">
                       <tr>
                         <th>#</th>
                         <th>Email Pengirim</th>
                         <th>Nama</th>
                         <th>Nomor Telepon</th>
                         <th>Status</th>
                         <th>Aksi</th>
                       </tr>
                       </thead>
                       <tbody>
                        @foreach($menunggu as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->nama_lengkap}}</td>
                          <td>{{$item->nomor_telpon}}</td>
                          <td>
                            @if($item->status == 'Menunggu')
                              <span class="badge bg-light-warning text-warning w-100">{{$item->status}}</span>
                            @endif
                          </td>
                          <td>
                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                              <a class="btn btn-warning text-light" href="{{route('kredit.detail',$item->id_eform_kredit)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div>
                    {!! $menunggu->links() !!}
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                      <thead class="table-light">
                       <tr>
                         <th>#</th>
                         <th>Email Pengirim</th>
                         <th>Nama</th>
                         <th>Nomor Telepon</th>
                         <th>Status</th>
                         <th>Aksi</th>
                       </tr>
                       </thead>
                       <tbody>
                        @foreach($disetujui as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->nama_lengkap}}</td>
                          <td>{{$item->nomor_telpon}}</td>
                          <td>
                            @if ($item->status == 'Disetujui')
                              <span class="badge bg-light-success text-success w-100">{{$item->status}}</span>
                            @endif
                          </td>
                          <td>
                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                              <a class="btn btn-warning text-light" href="{{route('kredit.detail',$item->id_eform_kredit)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div>
                    {!! $disetujui->links() !!}
                  </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="table-responsive mt-3">
                    <table class="table align-middle mb-0">
                      <thead class="table-light">
                       <tr>
                         <th>#</th>
                         <th>Email Pengirim</th>
                         <th>Nama</th>
                         <th>Nomor Telepon</th>
                         <th>Status</th>
                         <th>Aksi</th>
                       </tr>
                       </thead>
                       <tbody>
                        @foreach($ditolak as $item)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->nama_lengkap}}</td>
                          <td>{{$item->nomor_telpon}}</td>
                          <td>
                            @if($item->status == 'Ditolak')
                              <span class="badge bg-light-danger text-danger w-100">{{$item->status}}</span>
                            @endif
                          </td>
                          <td>
                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                              <a class="btn btn-warning text-light" href="{{route('kredit.detail',$item->id_eform_kredit)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div>
                    {!! $ditolak->links() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
</div>
@endsection
