<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class PemesananExport implements FromView
{

    public function view(): View
    {
        return view('pemesanans.xls', [
            'pemesanans' => Pemesanan::all()

        ]);
    }


}
