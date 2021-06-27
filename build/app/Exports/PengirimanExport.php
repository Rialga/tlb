<?php

namespace App\Exports;

use App\Models\Pemesanan;
use App\Models\Produksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class PengirimanExport implements FromView,WithEvents
{
    use Exportable, RegistersEventListeners;

    protected $user , $id_pemesan;

    function __construct($user,$id_pemesan) {
        $this->user = $user;
        $this->id_pemesan = $id_pemesan;
    }


    public function view(): View
    {
       $tes =  Pemesanan::where('id',$this->id_pemesan)->first();


        return view('pemesanans.produksis.xls', [
            'pemesanans' => Pemesanan::where('id',$this->id_pemesan)->first(),
            'produksi'=> Produksi::where('pemesanan_id',$this->id_pemesan)->get(),
            'volume'=> Produksi::where('pemesanan_id',$this->id_pemesan)->sum('volume'),
            'key'=> 1,
            'user' =>  $this->user,
        ]);
    }



    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()->mergeCells('A1:F1');
    }
}
