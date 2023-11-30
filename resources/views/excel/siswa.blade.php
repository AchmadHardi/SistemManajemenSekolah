<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jk }}</td>
                <td>{{ $item->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
