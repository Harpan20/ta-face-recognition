@extends('layouts.app',['tittle'=>'Tambah Laporan Tahunan'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Laporan Tahunan</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Tambah Laporan Tahunan</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Tambahkan Laporan Tahunan</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('tahunan.index')}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{session()->get('notif')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form class="row g-3 needs-validation" action="{{route('tahunan.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nama Laporan</label>
                                    <input type="text" class="form-control" name="nama_tahunan" value="{{old('nama_tahunan')}}"  required>
                                    @error('nama_tahunan')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Tahun</label>
                                    <select class="form-control" name="tahun">
                                        <option selected>Pilih Tahun</option>
                                        @php
                                            $tahun = date('Y');
                                            $tahun_skrg = (int)$tahun - 10;
                                            for($i = $tahun; $i >= $tahun_skrg; $i--){
                                                echo "<option>$i</option>";
                                            }
                                        @endphp
                                        
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Dokumen</label>
                                    <input type="file" class="form-control" name="dokumen_tahunan"  required>
                                    @error('dokumen_tahunan')
                                        <span class="text-danger" style="font-size: 10px;">{{"Format dokumen harus pdf"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="editor" name="deskripsi" class="form-control">{{old('deskripsi')}}</textarea>
                                    @error('deskripsi')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 5"}}</span>
                                    @enderror
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