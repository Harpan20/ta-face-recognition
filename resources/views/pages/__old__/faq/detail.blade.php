@extends('layouts.app',['tittle'=>'Detail Faq'])
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Detail</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Detail FAQ</li>
                  </ol>
                </nav>
            </div>
            <br>
        </div>

        <div class="card">
            
            <div class="card-body">
                <div>
                    <a href="{{route('faq.edit',$faq->id_faq)}}" class="mb-0 btn btn-white shadow-sm " style="size: 3px;"><ion-icon name="pencil-sharp"></ion-icon></a>
                </div>
                <br>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Pertanyaan :</label>
                    <p>{{$faq->pertanyaan}}</p>
                </div>
                <hr>
                <div class="col-md-12">
                    <label class="form-label fw-bold">Jawaban  </label> 
                    <div class="d-flex">
                        <p>{!! $faq->jawaban !!}</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection