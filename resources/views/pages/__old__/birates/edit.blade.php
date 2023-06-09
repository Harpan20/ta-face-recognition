@extends('layouts.app',['tittle'=>'Update Suku Bunga'])
@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Suku Bunga</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Update Suku Bunga</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Update Suku Bunga</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('birates.index')}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{session()->get('notif')}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="row g-3 needs-validation" method="POST" action="{{route('birates.update',$suku->id_sukubunga)}}">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nama Suku Bunga</label>
                                    <input type="text" class="form-control" name="nama_sukubunga" value="{{$suku->nama_sukubunga}}"   required>
                                    @error('nama_sukubunga')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 4"}}</span>
                                    @enderror
                                </div>

                                <div class="vol-ms-12">
                                    <label for="validationCustom01" class="form-label">
                                        Nilai Besaran Simpanan
                                    </label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">
                                                Rp.
                                            </span>
                                            <input type="number" class="form-control" name="nilai_besaran"  value="{{ old('suku_bunga', $suku->nilai_besaran) }}" >
                                            @error('nilai_besaran')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus numeric"}}</span>
                                    @enderror
                                        </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Suku Bunga</label>
                                    <div class="input-group mb-3"> <span class="input-group-text">%</span>
                                        <input type="number" step=0.01 name="suku_bunga" value="{{$suku->suku_bunga}}" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    </div>
                                    @error('suku_bunga')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus numeric"}}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection@extends('layouts.app',['tittle'=>'Update Suku Bunga'])
@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Produk</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Tambahkan Produk</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                          <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Suku Bunga</label>
                                    <div class="input-group mb-3"> <span class="input-group-text">%</span>
                                        <input type="number" step=0.01 class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Kategori</label>
                                    <select class="form-control" required>
                                        <option>Tabungan</option>
                                        <option>Kredit</option>
                                        <option>Deposito</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
