@extends('layouts.app_new')
@section('title', 'Data Siswa')
@section('contents')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">

                        <form action="" method="get">
                            <div class="input-group mt-3">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary ml-1" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                @if (session()->has('message'))
                                    <div class="alert alert-{{ session('alert-info') }} mt-3">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('pdf', ['param' => 'siswa', 'download' => 1]) }}" target="_blank"
                            class="btn btn-sm btn-warning"><i class="bi bi-download"></i> Download PDF</a>
                        <a href="{{ route('pdf', ['param' => 'siswa']) }}" target="_blank" class="btn btn-sm btn-success"><i
                                class="bi bi-printer"></i> Cetak PDF</a>
                        <a href="{{ route('siswa.export_excel') }}" class="btn btn-sm btn-success my-3" target="_blank">
                            <i class="fas fa-file-excel"></i> Export Excel
                        </a>

                        <a href="{{ route('siswa.importExcel') }}" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#importModal">
                            <i class="bi bi-file-excel"></i> Import To Excel
                        </a>


                        <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary"><i
                                class="bi bi-person-plus"></i> Tambah Data Siswa</a>
                        <a href="{{ route('siswa.trash') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-trash-restore"></i> Recovery</a>
                    </div>
                </div>
            </div>
            @foreach ($siswa as $key => $item)
                <!-- Modal -->

                {{-- MODAL HAPUS --}}
                <div class="modal fade" id="hapus_siswa{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><span
                                        class="text-danger"><b>PERINGATAN!</b></span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('siswa.destroy', $item->id) }}" method="delete">
                                    @csrf
                                    {{-- @method('delete') --}}
                                    <p>Yakin ingin menghapus data <b style="color: red">{{ $item->nama }}</b> ?</p>
                                    <hr>
                                    <button class="btn btn-danger float-right">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="card-body">
                <div class="table-responsive">
                    @include('siswa.table', $siswa)
                </div>
                {{ $siswa->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.importExcel') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import_file" accept=".xlsx">
                        <button type="submit">Import</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
