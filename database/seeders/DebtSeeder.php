<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Debt;

class DebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Debt::create([
            'name' => "Kredit Motor",
            'price' => 25000000
        ]);
        Debt::create([
            'name' => "Kredit Rumah",
            'price' => 100000000
        ]);
        Debt::create([
            'name' => "Kredit Iphone",
            'price' => 23000000
        ]);
    }
}
