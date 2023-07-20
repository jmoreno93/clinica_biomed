<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Seeder;

class MedicamentoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id_medicamento' => 1,
                'nombre_medicamento' => 'Paracetamol 10mg',
                'presentacion' => 'Genérico',
                'tipo' => 'pastilla',
            ],
            [
                'id_medicamento' => 2,
                'nombre_medicamento' => 'Diclofenaco 10mg',
                'presentacion' => 'Genérico',
                'tipo' => 'pastilla',
            ],
            [
                'id_medicamento' => 3,
                'nombre_medicamento' => 'Naproxeno 500mg',
                'presentacion' => 'Genérico',
                'tipo' => 'pastilla',
            ],
            [
                'id_medicamento' => 4,
                'nombre_medicamento' => 'Clorfenamina 10mg',
                'presentacion' => 'Genérico',
                'tipo' => 'pastilla',
            ],
            [
                'id_medicamento' => 5,
                'nombre_medicamento' => 'Paltomiel 200ml',
                'presentacion' => 'Paltomiel',
                'tipo' => 'jarabe',
            ],
            [
                'id_medicamento' => 6,
                'nombre_medicamento' => 'Clindamicina 5ml',
                'presentacion' => 'Genérico',
                'tipo' => 'inyectable',
            ],
            [
                'id_medicamento' => 7,
                'nombre_medicamento' => 'Clindamicina',
                'presentacion' => 'Genérico',
                'tipo' => 'capsula',
            ],
        ];

        foreach ($data as $value) {
            $find = Medicamento::find($value['id_medicamento']);

            if(is_null($find)) {
                Medicamento::create($value);
            }
        }
    }
}
