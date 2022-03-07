<?php

namespace Database\Seeders;

use App\Models\vehicle\Brand;
use App\Models\vehicle\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arquivos = [
            [
                'type' => 'Caminhão',
                'csv' => 'marcas-caminhao.csv'
            ],
            [
                'type' => 'Carro',
                'csv' => 'marcas-carros.csv'
            ],
            [
                'type' => 'Moto',
                'csv' => 'marcas-motos.csv'
            ]
        ];
        Brand::truncate();

        foreach ($arquivos as $arquivo) {
            $csvFile = fopen(public_path("csv/" . $arquivo['csv']), "r");

            $type = Type::where('name', $arquivo['type'])->first();

            $firstLine = true;

            while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {

                if (!$firstLine) {
                    $type->brands()->create([
                        'name' => $data['1']
                    ]);
                }

                $firstLine = false;
            }

            fclose($csvFile);
        }
    }
}
