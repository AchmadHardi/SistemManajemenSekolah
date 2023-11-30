<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row['nis'],
            'nama' => $row['nama'],
            'jk' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'gambar' => $row['gambar'] ?? null, // Handle 'gambar' or set it to null
            
        ]);
    }   
}