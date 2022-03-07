<?php

namespace Database\Seeders;

use App\Models\vehicle\Brand;
use App\Models\vehicle\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();
       $brands = ['Caminhão', 'Moto', 'Carro'];

       foreach ($brands as $brand) {
           # code...
           Type::create(['name' => $brand]);
       }
    }
}
