@extends('layouts.app',['tittle'=>'Detail E-form Kredit'])
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
                    <li class="breadcrumb-item active" aria-current="page">Detail E-form Deposito</li>
                  </ol>
                </nav>
            </div>
            <br>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3 needs-validation" action="{{route('kredit.updateStatus',$kredit->id_eform_kredit)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                @foreach (\App\Enums\EformStatus::cases() as $eformStatus)
                                    <option value="{{ $eformStatus->value }}">{{ $eformStatus->value }}</option>
                                @endforeach
                            </select>
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
@endsection
