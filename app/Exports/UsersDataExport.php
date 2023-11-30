<?php

namespace App\Exports;

ause tuth matwebsire;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UsersDataExport implements FromView, Shoul
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    public function view() : View
    { 
        return view('baca excel.user.users');

    }
}