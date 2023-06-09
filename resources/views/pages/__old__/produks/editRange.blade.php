@extends('layouts.app',['tittle'=>'Edit Range'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Edit Range Produk</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Range</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Edit Range Range</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('produk.detail',$produk->id_produk)}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span>{{session()->get('notif')}}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form class="row g-3 needs-validation" action="{{route('range.update',$produk->id_produk)}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <h6>Range {{$produk->nama_produk}}</h6>
                                    <span>Nominal minimum&nbsp;&nbsp;&nbsp;&nbsp;: <strong>Rp.{{number_format($produk->nominal_min)}}</strong></span>
                                    <br>
                                    <span>Nominal maksimum : <strong>Rp.{{number_format($produk->nominal_max)}}</strong></span>
                                </div>
                                <div class="tag" style="margin-top: 3%">
                                    @for($i= 0; $i<count($rangemin);$i++)
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="input-group mb-3"> <span class="input-group-text">Rp.</span>
                                                    <input type="number" class="form-control" name="nominal_min[]"  value="{{$rangemin[$i]}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="input-group mb-3"> <span class="input-group-text">Rp.</span>
                                                    <input type="number" class="form-control" name="nominal_max[]"  value="{{$rangemax[$i]}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    @endfor
                                </div>

                                <div class="col-md-12">
                                    <a href="#" class="addTag btn-primary float-right rounded" style="padding: 5px"><ion-icon name="add-sharp"></ion-icon>Tambah Range</a>
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
            '<div class="col-md-12 tagInput"><div class="row"><div class="col-md-5"><div class="input-group mb-3"> <span class="input-group-text">Rp.</span><input type="number" class="form-control" name="nominal_min[]"  required></div></div><div class="col-md-5"><div class="input-group mb-3"> <span class="input-group-text">Rp.</span><input type="number" class="form-control" name="nominal_max[]"  value="{{old('nominal_max')}}" required></div></div><div class="col-md-1"><a href="#" class="remove btn btn-danger" ><ion-icon name="trash-sharp"></ion-icon></a></div></div></div>';
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