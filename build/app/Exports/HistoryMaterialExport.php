<?php

namespace App\Exports;

use App\BahanBakuHistory;
use App\Models\Produksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class HistoryMaterialExport implements FromView,WithEvents
{
    use Exportable, RegistersEventListeners;

    protected $user, $stock, $dari, $sampai;

    function __construct($user, $stock, $dari, $sampai) {
        $this->user = $user;
        $this->stock = $stock;
        $this->dari = $dari;
        $this->sampai = $sampai;
    }


    public function view(): View
    {

        return view('bahan_baku_histories.xls', [
            'user' =>  $this->user,
            'stock' => $this->stock,
            'dari' =>$this->dari,
            'sampai' => $this->sampai

        ]);
    }



    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()->mergeCells('A1:F1');
    }
}
