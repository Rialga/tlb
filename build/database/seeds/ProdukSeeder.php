<?php

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produks = [
        'K250' => 'kg/m3',
        'K350' => 'kg/m3',
      ];

        foreach ($produks as $key => $value) {
            $produk = new Produk();
            $produk->mutu_produk = $key;
            $produk->satuan = $value;
            $produk->save();
        }
    }
}
