<?php

namespace App\Exports;

use App\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemesanan::all();
    }
}
