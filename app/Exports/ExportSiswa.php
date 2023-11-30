<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportSiswa implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        return Siswa::orderBy('nama', 'asc')->get(['nis', 'nama', 'jk', 'alamat']);
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama',
            'Jenis Kelamin',
            'Alamat',
        ];
    }
}