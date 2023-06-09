@extends('layouts.app',['tittle'=>'Tambah Karir'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Mitra Asuransi</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Tambah Mitra Asuransi</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Tambahkan Mitra Asuransi</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                          <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nama Mitra</label>
                                    <input type="text" class="form-control"   required>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Gambar</label>
                                    <input type="file" class="form-control"   required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="editor" name="deskripsi" class="form-control"></textarea>
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