@extends('layouts.app_new' )

@section('contents')
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
          <div class="col-auto">
            <h5 class="mb-0">Dashboard</h5>
          </div>
        </div>
    </div>
  </div>
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card" style="width: 300px;">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="float-right"><i class="fa-solid fa-chalkboard-user"></i></span>
                </h5>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <a href="{{ route('siswa') }}">Data Siswa</a>
                </div>
            </div>
        </div>
    </div>        
    <div class="col-md-3">
        <div class="card" style="width: 300px;">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="float-right"><i class="fa-solid fa-person-chalkboard"></i> 
                </h5>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <a href="{{ route('guru') }}">Data Guru</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 300px;">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="float-right"><i class="fa-sharp fa-solid fa-book"></i></span>
                </h5>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <a href="{{ route('pelajaran') }}">Data Pelajaran</a>
                </div>
            </div>
        </div>
    </div>      
    <div class="col-md-3">
        <div class="card" style="width: 300px;">
            <div class="card-body">
                <h5 class="card-title">
                    <span class="float-right"><i class="fa-sharp fa-solid fa-book"></i></span>
                </h5>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <a href="{{ route('kurikulum') }}">Data Kurikulum</a>
                </div>
            </div>
        </div>
    </div>      
</div>
@endsection