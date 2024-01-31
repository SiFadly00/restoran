<?php

namespace Database\Seeders;

use App\Models\kategori;
use App\Models\menu;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Admin 1',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin'),
            'role'=>'admin'
        ]);
        User::create([
            'name'=>'meja1',
            'email'=>'meja1@gmail.com',
            'password'=>bcrypt('2345'),
            'role'=>'user'
        ]);
        User::create([
            'name'=>'meja2',
            'email'=>'meja2@gmail.com',
            'password'=>bcrypt('345'),
            'role'=>'user'
        ]);
        User::create([
            'name'=>'kasir 1',
            'email'=>'kasir1@gmail.com',
            'password'=>bcrypt('kasir1'),
            'role'=>'kasir'
        ]);

        User::create([
            'name'=>'Owner',
            'email'=>'owner@gmail.com',
            'password'=>bcrypt('ownerresto'),
            'role'=>'owner'
        ]);

        kategori::create([
            'name'=>'Makanan'
        ]);
        kategori::create([
            'name'=>'Minuman'
        ]);
        menu::create([
            'user_id'=>1,
            'kategori_id'=>1,
            'name'=>'Steak',
            'foto'=>'img/steak.jpg',
            'harga'=>72000,
        ]);

    }
}
