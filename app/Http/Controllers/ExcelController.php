<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kurikulum;
use App\Models\Pelajaran;
use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export(Request $request, $param)
    {
        $fileName = now() . "-$param.xlsx";
        $data = [];

        switch ($param) {
            case 'siswa':
                $data = Siswa::all();
                break;
            case 'guru':
                $data = Guru::all();
                break;
                // Add cases for other export types (e.g., pelajaran, kurikulum, jadwal, user)
                // ...
            default:
                // Handle invalid parameter
                return response()->json(['error' => 'Invalid parameter'], 400);
        }

        if ($request->get('download') && $request->get('download') == 1) {
            return Excel::download(view('export', compact('data')), $fileName);
        } else {
            return Excel::store(view('export', compact('data')), $fileName);
        }
    }
}