<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BahanBaku;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bahan = [
          'semen' => ['Semen', 'Kg'],
          'air' => ['Air', 'Liter'],
          'pasir' => ['Pasir', 'Kg'],
          'split' => ['Split', 'Kg'],
          'addictive1' => ['Addictive1', 'Liter'],
          'addictive2' => ['Addictive2', 'Liter'],
          'addictive3' => ['Addictive3', 'Liter'],
        ];

        foreach ($bahan as $key => $value) {
            $bahanBaku = new BahanBaku();
            $bahanBaku->kode = $key;
            $bahanBaku->nama_bahan_baku = $value[0];
            $bahanBaku->satuan = $value[1];
            $bahanBaku->sisa = rand(100, 1000);
            $bahanBaku->save();
        }
    }
}
