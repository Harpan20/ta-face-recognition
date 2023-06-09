@extends('layouts.app',['tittle'=>'Edit Laporan Tata Kelola'])
@section('content')
    <div class="page-content-wrapper">
    <!-- start page content-->
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Laporan Tata Kelola</div>
                <div class="ps-3">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                      <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Edit Laporan Tata Kelola</li>
                    </ol>
                  </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase">Edit Laporan Tata Kelola</h6>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <div class="flex-start d-flex" >
                                <a class="btn btn-primary" href="{{route('kelola.detail',$laporan->id_kelola)}}"><ion-icon name="chevron-back-sharp"></ion-icon>Kembali</a>
                            </div>
                            <br>
                          <div class="p-4 border rounded">
                            @if(session()->has('notif'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span>{{session()->get('notif')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <form class="row g-3 needs-validation" enctype="multipart/form-data" action="{{route('kelola.update',$laporan->id_kelola)}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Nama Laporan</label>
                                    <input type="text" class="form-control" value="{{$laporan->nama_kelola}}" name="nama_kelola"   required>
                                    @error('nama_kelola')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 3"}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Bulan</label>
                                    <select class="form-control" name="bulan">
                                        <option selected>Pilih Bulan</option>
                                        @php
                                            for($i = 1; $i <= 12; $i++){
                                                if ($i==1) {
                                                    echo "<option>Januari</option>";
                                                }elseif ($i==2) {
                                                    echo "<option>Februari</option>";
                                                }elseif($i==3){
                                                    echo "<option>Maret</option>"; 
                                                }elseif($i==4){
                                                    echo "<option>April</option>"; 
                                                }elseif($i==5){
                                                    echo "<option>Mei</option>"; 
                                                }elseif($i==6){
                                                    echo "<option>Juni</option>"; 
                                                }elseif($i==7){
                                                    echo "<option>Juli</option>"; 
                                                }elseif($i==8){
                                                    echo "<option>Agustus</option>"; 
                                                }elseif($i==9){
                                                    echo "<option>September</option>"; 
                                                }elseif($i==10){
                                                    echo "<option>Oktober</option>"; 
                                                }elseif($i==11){
                                                    echo "<option>November</option>"; 
                                                }elseif($i==12){
                                                    echo "<option>Desember</option>"; 
                                                }
                                            }
                                        @endphp
                                        
                                    </select>
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

                                <div class="col-md-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi_kelola" id="editor" class="form-control">{!! $laporan->deskripsi_kelola !!}</textarea>
                                    @error('deskripsi_kelola')
                                        <span class="text-danger" style="font-size: 10px;">{{"Karakter harus lebih dari 5"}}</span>
                                    @enderror
                                </div>
                                <br>
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