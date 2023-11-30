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
                <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jk }}</td>
                <td>{{ $item->alamat }}</td>
                <td>
                    <img src="{{ asset('storage/assets/car/' . $item->gambar) }}" width="100">
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{ route('siswa.update', $item->id) }}" class="btn btn-sm btn-outline-warning"><i
                                class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-danger btn-sm shadow-sm mr-1 delete-data"
                            data-toggle="modal" data-target="#hapus_siswa{{ $item->id }}" title="Hapus"><i
                                class="fas fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
