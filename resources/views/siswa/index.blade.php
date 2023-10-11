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
                        <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary"><i
                                class="bi bi-person-plus"></i> Tambah Data Siswa</a>
                        <a href="{{ route('siswa.trash') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-trash-restore"></i> Recovery</a>
                    </div>
                </div>
            </div>
            @foreach ($siswa as $key => $item)
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
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" style="width: 75px">No</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Profile</th>
                                <th class="text-center" scope="col" style="width: 125px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            @foreach ($siswa as $key => $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $siswa->firstItem() + $key }}</th>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <img src="{{ asset('storage/assets/car/' . $item->gambar) }}" width="100">
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{ route('siswa.update', $item->id) }}"
                                                class="btn btn-sm btn-outline-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm shadow-sm mr-1 delete-data"
                                                data-toggle="modal" data-target="#hapus_siswa{{ $item->id }}"
                                                title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $siswa->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
