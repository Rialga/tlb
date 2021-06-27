<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BahanBakuSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SupirSeeder::class);
    }
}
