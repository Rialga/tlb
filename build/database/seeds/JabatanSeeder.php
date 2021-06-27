<?php

use Illuminate\Database\Seeder;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = [
          'admin' => 'Admin',
          'marketing' => 'Marketing',
          'produksi' =>'Produksi',
          'logistik' => 'Logistik',
          'manager_produksi' => 'Manager Produksi'
        ];

        foreach ($jabatans as $key => $value) {
            $jabatan = new Jabatan();
            $jabatan->kode_jabatan = $key;
            $jabatan->nama_jabatan = $value;
            $jabatan->save();
        }
    }
}
