<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
                'name' => 'Rizky '. Str::random(3),
                'email' => 'Rizky '. Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
