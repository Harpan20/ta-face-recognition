@extends('layouts.app',['tittle'=>'Edit Informasi'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">informasi</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Infromasi</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Edit Informasi</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('informasi.detail',$informasi->id_informasi)}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{session()->get('notif')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form class="row g-3 needs-validation" action="{{route('informasi.update',$informasi->id_informasi)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nama Kantor</label>
                                    <input type="text" class="form-control" name="nama_kantor" value="{{$informasi->nama_kantor}}" required>
                                    @error('nama_kantor')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="editor" name="deskripsi_informasi" class="form-control">{!! $informasi->deskripsi_informasi !!}</textarea>
                                    @error('deskripsi_informasi')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 5"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Alamat</label>
                                    <textarea  name="alamat_kantor" class="form-control">{{$informasi->alamat_kantor}}</textarea>
                                    @error('alamat_kantor')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 5"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nomor Telepon</label>
                                    <input type="number" name="no_telpon" class="form-control" value="{{$informasi->no_telpon}}"  required>
                                    @error('no_telpon')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus numeric"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nomor Whatsapp</label>
                                    <input type="number" name="nomor_wa" class="form-control" value="{{$informasi->nomor_wa}}"  required>
                                    @error('nomor_wa')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus numeric"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Instagram</label>
                                    <input type="text" name="instagram" class="form-control"  value="{{$informasi->instagram}}" required>
                                    @error('instagram')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Facebook</label>
                                    <input type="text" name="facebook" class="form-control"  value="{{$informasi->facebook}}" required>
                                    @error('facebook')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Youtube</label>
                                    <input type="text" name="youtube" class="form-control" value="{{$informasi->youtube}}"  required>
                                    @error('youtube')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
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