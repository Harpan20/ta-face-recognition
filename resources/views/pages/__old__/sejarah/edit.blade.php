@extends('layouts.app',['tittle'=>'Update Sejarah'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Sejarah</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Update Sejarah</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Update Sejarah</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('sejarah.detail',$sejarah->id_sejarah)}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{session()->get('notif')}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="row g-3 needs-validation" enctype="multipart/form-data" method="POST" action="{{route('sejarah.update',$sejarah->id_sejarah)}}" novalidate>
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul_sejarah" value="{{$sejarah->judul_sejarah}}" required>
                                    @error('judul_sejarah')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Sub Judul</label>
                                    <input type="text" class="form-control" name="subjudul_sejarah" value="{{$sejarah->subjudul_sejarah}}" required>
                                    @error('subjudul_sejarah')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                        <textarea id="editor" name="deskripsi" class="form-control">{{$sejarah->deskripsi_sejarah}}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <a href="#" class="addTag btn-primary float-right rounded" style="padding: 5px"><ion-icon name="add-sharp"></ion-icon>Tambah Tag</a>
                                </div>
                                <div class="tag">
                                    @foreach($tags as $tag)
                                        <div style="margin-bottom:2%" class="tagInput row"><div class="col-md-11"> <input type="text" class="form-control" value="{{$tag}}" name="tag[]"  required></div><br><div class="col-md-1"><a href="#" class="remove btn btn-danger" ><ion-icon name="trash-sharp"></ion-icon></a></div></div>
                                    @endforeach
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection