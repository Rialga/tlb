<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use App\Models\Produksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ProduksiExport implements FromView,WithEvents
{
    use Exportable, RegistersEventListeners;

    protected $user,$supir;

    function __construct($user, $supir) {
        $this->user = $user;
        $this->supir = $supir;
    }


    public function view(): View
    {

        return view('produksis.xls', [
            'produksis' => Produksi::all(),
            'user' =>  $this->user,
            'supir' => $this->supir,
        ]);
    }



    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()->mergeCells('A1:N1');
        $event->sheet->getDelegate()->mergeCells('J2:N2');
    }
}
