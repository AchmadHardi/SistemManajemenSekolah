<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cetak PDF</title>

    <style>
        table.tb {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        table.tb thead,
        table.tb tbody,
        table.tb th,
        table.tb td {
            padding: 5px;
            border: solid 1px #777;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    @foreach ($data as $item)
        <h2 style="text-align: center">Laporan Data Jadwal</h2>

        <table>
            <tr>
                <td>Kode Jadwal</td>
                <td>= {{ $item->kd_jadwal }}</td>
            </tr>
            <tr>
                <td>Kode Kurikulum</td>
                <td>= {{ $item->kurikulum->kd_kurikulum }}</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>= {{ $item->kurikulum->semester }}</td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>= {{ $item->kurikulum->tahun }}</td>
            </tr>
        </table>

        <table class="tb">
            <tr>
                <th>Jam Awal</th>
                <th>Jam Akhir</th>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jumat</th>
                <th>Sabtu</th>
            </tr>
            @if ($item->jadwal)
                @foreach (json_decode($item->jadwal, true) as $k => $v)
                    <tr>
                        <td>{{ $v['jam_awal'] }}</td>
                        <td>{{ $v['jam_akhir'] }}</td>
                        <td>{{ isset($v['senin']) ? $v['senin'] : '' }}</td>
                        <td>{{ isset($v['selasa']) ? $v['selasa'] : '' }}</td>
                        <td>{{ isset($v['rabu']) ? $v['rabu'] : '' }}</td>
                        <td>{{ isset($v['kamis']) ? $v['kamis'] : '' }}</td>
                        <td>{{ isset($v['jumat']) ? $v['jumat'] : '' }}</td>
                        <td>{{ isset($v['sabtu']) ? $v['sabtu'] : '' }}</td>
                    </tr>
                @endforeach
            @endif
        </table>

        <div class="page-break"></div>
    @endforeach

</body>

</html>
