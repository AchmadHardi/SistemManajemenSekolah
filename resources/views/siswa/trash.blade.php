@extends('layouts.app_new')
@section('title', 'Restore Siswa')
@section('contents')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>Restore Siswa</h3>
            </div>
            <div class="card-body">
                @if ($trashedSiswa->count() > 0)
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trashedSiswa as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>
                                        <img src="{{ asset('storage/assets/car/' . $item->gambar) }}" width="100">
                                    </td>
                                    <td>
                                        <form action="{{ route('siswa.restore', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Tidak ada data siswa yang dapat dipulihkan.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
