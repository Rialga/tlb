<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use App\Models\Pemesanan;
use App\Models\PemesananBahanBaku;

class ApiController extends Controller
{
    public function getMaterial(BahanBaku $bahan_baku)
    {
        return $bahan_baku;
    }

    public function getPemesanan(Pemesanan $pemesanan)
    {
        return $pemesanan;
    }

    public function getMaterialViaSupplier(PemesananBahanBaku $supplier)
    {
        return $supplier->bahan_baku;
    }
}
