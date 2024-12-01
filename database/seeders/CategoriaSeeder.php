<?php

namespace Database\Seeders;

use App\Models\categoria as MC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MC::create(['categoria' => 'Ropa']);
        MC::create(['categoria' => 'Tenis']);
    }
}
