@extends('layouts.app',['tittle'=>'Tabel Faq'])
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
                    <li class="breadcrumb-item active" aria-current="page">Tabel Faq</li>
                </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                <a class="btn btn-outline-primary" href="{{route('faq.create')}}">Tambah Faq</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">FAQ</h5>
                    <form class="ms-auto position-relative" action="" method="GET">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                        <input class="form-control ps-5" type="text" name="q" value="{{$request->q}}" placeholder="search">
                    </form>
                </div>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive mt-3">
                            <table class="table align-middle">
                                <thead class="table-secondary">
                                    <tr>
                                    <th>#</th>
                                    <th>Pertanyaan</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $key => $item)
                                    <tr>
                                        <td>{{$faqs->firstItem()+$key}}</td>
                                        <td>{{$item->pertanyaan}}</td>
                                        <td>
                                            <div class="table-actions d-flex align-items-center gap-2 fs-6 text-white">
                                                <a class="btn btn-warning text-light" href="{{route('faq.detail',$item->id_faq)}}"><ion-icon name="eye-sharp"></ion-icon></a>
                                                        <form action="#" enctype="multipart/form-data" method="POST">
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
                            {!! $faqs->links() !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>
@endsection