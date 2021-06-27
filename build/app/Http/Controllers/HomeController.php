<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanBaku;
use App\Models\Produk;
use App\Models\Kendaraan;
use App\Models\Produksi;
use Carbon\Carbon;
use App\Models\Pemesanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = [
          '1' => 'StandBy',
          '2' => 'Rusak',
          '3' => 'Rental'
        ];

        $kemarin = Produksi::where('waktu_produksi', '>=', Carbon::yesterday()->startOfDay())
                           ->where('waktu_produksi', '<', Carbon::today()->startOfDay())
                           ->sum('volume');

        $bulanini = Produksi::where('waktu_produksi', '>=', Carbon::now()->startOfMonth()->startOfDay())
                            ->where('waktu_produksi', '<', Carbon::now())
                            ->sum('volume');

        $bulanlalu = Produksi::where('waktu_produksi', '>=', Carbon::now()->subMonth()->startOfMonth()->startOfDay())
                            ->where('waktu_produksi', '<', Carbon::now()->startOfMonth()->startOfDay())
                            ->sum('volume');

        $pemesanans = Pemesanan::all();
        $sisa = 0;

        foreach ($pemesanans as $key => $value) {
            $prods = $value->produksis()->sum('volume');
            $pems = $value->volume_pesanan;
            $sisa += $pems-$prods;
        }

        $day = array(
            'Sunday'=>'Minggu', 'Monday'=>'Senin', 'Tuesday'=>'Selasa', 'Wednesday'=>'Rabu', 'Thursday'=>'Kamis', 'Friday'=>'Jumat', 'Saturday'=>'Sabtu',
            'January'=>'Januari', 'February'=>'Februari', 'March'=>'Maret', 'June'=>'Juni', 'July'=>'Juli', 'August'=>'Agustus', 'October'=>'Oktober', 'December'=>'Desember',);
        $today = Carbon::now()->format('l, d F Y');

        $tgl = str_replace(array_keys($day), $day, $today);




        $bahanBaku = BahanBaku::all();
        $produks = Produk::all();
        $kendaraans = Kendaraan::all();
        $title = "Beranda";
        return view('home')
              ->with('bahanBakus', $bahanBaku)
              ->with('produks', $produks)
              ->with('title', $title)
              ->with('kendaraans', $kendaraans)
              ->with('status', $status)
              ->with('kemarin', $kemarin)
              ->with('bulanini', $bulanini)
              ->with('bulanlalu', $bulanlalu)
              ->with('tgl', $tgl)
              ->with('volume_permintaan', $sisa);
    }
}
