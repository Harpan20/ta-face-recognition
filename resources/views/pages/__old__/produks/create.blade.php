@extends('layouts.app',['tittle'=>'Tambah Produk'])
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
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('produk.index')}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{session()->get('notif')}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form class="row g-3 needs-validation" action="{{route('produk.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail_produk"  required>
                                    @error('thumbnail_produk')
                                        <span class="text-danger" style="font-size: 10px;">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Banner</label>
                                    <input type="file" class="form-control" name="banner_produk"  required>
                                    @error('banner_produk')
                                        <span class="text-danger" style="font-size: 10px;">{{"Format gambar harus png, jpg, atau jpeg"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" value="{{old('nama_produk')}} " required>
                                    @error('nama_produk')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="editor" name="deskripsi_produk" class="form-control">{{old('nama_produk')}} </textarea>
                                    @error('deskripsi_produk')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 5"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Bunga Produk</label>
                                    <div class="input-group mb-3"> <span class="input-group-text">%</span>
                                        <input type="number" step=0.01 name="bunga_produk" value="0" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Nominal Minimum</label>
                                            <div class="input-group mb-3"> <span class="input-group-text">Rp.</span>
                                                <input type="number" class="form-control" name="nominal_min"  value="0" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Nominal Maximum</label>
                                            <div class="input-group mb-3"> <span class="input-group-text">Rp.</span>
                                                <input type="number" class="form-control" name="nominal_max"  value="0" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Jangka Waktu Minimal</label>
                                            <div class="input-group mb-3">
                                                <input type="number"  name="jangka_min" value="0" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                <span class="input-group-text">Bulan</span>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Jangka Waktu Maksimal</label>
                                            <div class="input-group mb-3">
                                                <input type="number"  name="jangka_max" value="0" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                <span class="input-group-text">Bulan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Kelipatan</label>
                                    <input type="number" class="form-control" name="kelipatan" value=0>
                                    <span style="font-size: 10px">*Jika tidak ada, bisa dilewat</span>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nominal Kelipatan</label>
                                    <input type="number" class="form-control" name="nominal_kelipatan" value=0>
                                    <span style="font-size: 10px">*Jika tidak ada, bisa dilewat</span>
                                </div>

                                
                                <div class="col-md-12" style="margin-bottom: 2%">
                                    <label for="validationCustom01" class="form-label">Kategori</label>
                                    <select class="form-control" name="kategori_produk" required>
                                        <option>Tabungan</option>
                                        <option>Kredit</option>
                                        <option>Deposito</option>
                                    </select>
                                </div>
                                <br><br>
                                <div class="col-md-12">
                                    <a href="#" class="addTag btn-primary float-right rounded" style="padding: 5px"><ion-icon name="add-sharp"></ion-icon>Tambah Tag</a>
                                </div>
                                <div class="tag">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $('.addTag').on('click',function(){
            addTag();
        });
        function addTag(){
            var tag = 
            '<div style="margin-bottom:2%" class="tagInput row"><div class="col-md-11"> <input type="text" class="form-control" name="tag[]"  required></div><br><div class="col-md-1"><a href="#" class="remove btn btn-danger" ><ion-icon name="trash-sharp"></ion-icon></a></div></div>';
            $('.tag').append(tag);
        }
        $(document).on('click', '.remove', function () {
            $(this).closest('.tagInput').remove();
        });
    </script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
        } );
    </script>
@endsection