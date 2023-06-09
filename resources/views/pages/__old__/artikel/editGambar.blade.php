@extends('layouts.app',['tittle'=>'Edit Gambar Artikel'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Artikel</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Update Gambar</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Update Gambar {{$artikel->judul_artikel}}</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('artikel.detail',$artikel->id_artikel)}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{session()->get('notif')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                             @endif
                            <form class="row g-3 needs-validation" action="{{route('artikel.updateGambar',$artikel->id_artikel)}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" name="gambar"  required>
                                    @error('gambar')
                                        <span class="text-danger" style="font-size: 10px;">{{"Format gambar harus png, jpg, atau jpeg"}}</span>
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