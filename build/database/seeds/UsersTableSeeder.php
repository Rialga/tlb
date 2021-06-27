<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Admin";
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
        $admin = Jabatan::getJabatan('admin');
        $user->jabatan()->associate($admin)->save();

        $user = new User();
        $user->name = "Logistik";
        $user->email = 'logistik@admin.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
        $admin = Jabatan::getJabatan('logistik');
        $user->jabatan()->associate($admin)->save();

        $user = new User();
        $user->name = "Marketing";
        $user->email = 'marketing@admin.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
        $admin = Jabatan::getJabatan('marketing');
        $user->jabatan()->associate($admin)->save();

        $user = new User();
        $user->name = "Produksi";
        $user->email = 'produksi@admin.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
        $admin = Jabatan::getJabatan('produksi');
        $user->jabatan()->associate($admin)->save();

        $user = new User();
        $user->name = "Manager Produksi";
        $user->email = 'mapro@admin.com';
        $user->password = bcrypt('secret');
        $user->remember_token = str_random(10);
        $user->save();
        $admin = Jabatan::getJabatan('manager_produksi');
        $user->jabatan()->associate($admin)->save();
    }
}
