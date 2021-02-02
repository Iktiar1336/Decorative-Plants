<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Web',
            'no_telp' => '081319304342',
            'alamat' => 'Jatinegara',
            'email' => 'admin@shop.id',
            'level' => 'admin',
            'password' => Hash::make('adminshop') 

        ]);
    }
}
