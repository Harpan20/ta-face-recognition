@extends('layouts.app',['tittle' => 'Tabel Produk'])

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Advance Tables</li>
                      </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                      <a class="btn btn-outline-primary" href="{{route('produk.create')}}">Tambah Produk</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0">Produk</h5>
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
                          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Tabungan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Kredit</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="deposito-tab" data-bs-toggle="tab" data-bs-target="#deposito" type="button" role="tab" aria-controls="deposito" aria-selected="false">Deposito</button>
                        </li>
                      </ul>

                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table-responsive mt-3">
                                <table class="table align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                         <th>#</th>
                                         <th>Nama Produk</th>
                                         <th>Kategori</th>
                                         <th>Dibuat</th>
                                         <th>Terakhir diedit</th>
                                         <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produks as $key => $produk)
                                            <tr>
                                                <td>{{$produks -> firstItem()+$key}}</td>
                                                <td>{{$produk->nama_produk}}</td>
                                                {{-- <td>{!! $produk->deskripsi_produk !!}</td> --}}
                                                <td>{{$produk->kategori_produk}}</td>
                                                <td>{{$produk->created_at}}</td>
                                                <td>{{$produk->updated_at}}</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                        <a class="btn btn-warning text-light" href="{{route('produk.detail',$produk->id_produk)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                                                        <form method="POST" action="{{route('produk.destroy',$produk->id_produk)}}">
                                                            @csrf
                                                            @method('delete')
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
                                {!! $produks->links() !!}
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table-responsive mt-3">
                                <table class="table align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                         <th>#</th>
                                         <th>Nama Produk</th>
                                         <th>Kategori</th>
                                         <th>Dibuat</th>
                                         <th>Terakhir diedit</th>
                                         <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tabungan as $key => $produk)
                                            <tr>
                                                <td>{{$tabungan -> firstItem()+$key}}</td>
                                                <td>{{$produk->nama_produk}}</td>
                                                {{-- <td>{!! $produk->deskripsi_produk !!}</td> --}}
                                                <td>{{$produk->kategori_produk}}</td>
                                                <td>{{$produk->created_at}}</td>
                                                <td>{{$produk->updated_at}}</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                        <a class="btn btn-warning text-light" href="{{route('produk.detail',$produk->id_produk)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                                                        <form method="POST" action="{{route('produk.destroy',$produk->id_produk)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger " onclick="return confirm('Data akan terhapus secara permanen, apakah anda yakin?')"><ion-icon name="trash-sharp"></ion-icon></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>                                                                      
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    {!! $tabungan->links() !!}
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="table-responsive mt-3">
                                <table class="table align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                         <th>#</th>
                                         <th>Nama Produk</th>
                                         <th>Kategori</th>
                                         <th>Dibuat</th>
                                         <th>Terakhir diedit</th>
                                         <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kredit as $key => $produk)
                                            <tr>
                                                <td>{{$kredit -> firstItem()+$key}}</td>
                                                <td>{{$produk->nama_produk}}</td>
                                                {{-- <td>{!! $produk->deskripsi_produk !!}</td> --}}
                                                <td>{{$produk->kategori_produk}}</td>
                                                <td>{{$produk->created_at}}</td>
                                                <td>{{$produk->updated_at}}</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                        <a class="btn btn-warning text-light" href="{{route('produk.detail',$produk->id_produk)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                                                        <form method="POST" action="{{route('produk.destroy',$produk->id_produk)}}">
                                                            @csrf
                                                            @method('delete')
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
                                {!! $kredit->links() !!}
                            </div>
                        </div>

                        <div class="tab-pane fade" id="deposito" role="tabpanel" aria-labelledby="deposito-tab">
                            <div class="table-responsive mt-3">
                                <table class="table align-middle">
                                    <thead class="table-secondary">
                                        <tr>
                                         <th>#</th>
                                         <th>Nama Produk</th>
                                         <th>Kategori</th>
                                         <th>Dibuat</th>
                                         <th>Terakhir diedit</th>
                                         <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deposito as $key => $produk)
                                            <tr>
                                                <td>{{$deposito -> firstItem()+$key}}</td>
                                                <td>{{$produk->nama_produk}}</td>
                                                {{-- <td>{!! $produk->deskripsi_produk !!}</td> --}}
                                                <td>{{$produk->kategori_produk}}</td>
                                                <td>{{$produk->created_at}}</td>
                                                <td>{{$produk->updated_at}}</td>
                                                <td>
                                                    <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                        <a class="btn btn-warning text-light" href="{{route('produk.detail',$produk->id_produk)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                                                        <form method="POST" action="{{route('produk.destroy',$produk->id_produk)}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger "><ion-icon name="trash-sharp"></ion-icon></button>
                                                        </form>
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
                      </div>
                    
                </div>
            </div>

        </div>
    </div>
@endsection