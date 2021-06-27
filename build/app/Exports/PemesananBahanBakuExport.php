<?php

namespace App\Exports;

use App\PemesananBahanBaku;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PemesananBahanBakuExport implements FromView,WithEvents
{
    use Exportable, RegistersEventListeners;

    function __construct($user, $pemesananBahanBakus, $filename ) {
        $this->user = $user;
        $this->pemesananBahanBakus = $pemesananBahanBakus;
        $this->filename = $filename;
    }


    public function view(): View
    {

        return view('pemesanan_bahan_bakus.xls', [
            'user' =>  $this->user,
            'pemesananBahanBakus' => $this->pemesananBahanBakus,
            'filename' =>$this->filename,
        ]);
    }

    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()->mergeCells('A1:I1');
    }
}
