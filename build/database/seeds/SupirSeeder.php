<?php

use Illuminate\Database\Seeder;
use App\Models\Supir;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supirs = [
          'Lenny Even',
          'Weston Ballard',
          'Wilburn Ohearn',
          'Booker Brochu',
          'Jeffery Fleenor',
          'Asa Velazco',
          'Wilfredo Hubler',
          'Lonnie Axtell',
          'Theodore Abdulla',
          'Brooks Oler'
        ];

        foreach ($supirs as $supir) {
            Supir::insert([
            'no_supir' => 'SPR'.(string)rand(1, 20),
            'nama_supir' => $supir,
         ]);
        }
    }
}
