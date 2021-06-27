<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class OpnameExport implements FromView,WithEvents
{
    use Exportable, RegistersEventListeners;

    protected $opnames, $user;

    function __construct($opnames, $user) {
        $this->user = $user;
        $this->opnames = $opnames;
    }


    public function view(): View
    {

        return view('opnames.xls', [
            'user' =>  $this->user,
            'opnames' => $this->opnames,
        ]);
    }



    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()->mergeCells('A1:E1');

    }
}
