<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'descripcion' => 'Endocrinología',
            ],
            [
                'id' => 2,
                'descripcion' => 'Gastroenterología',
            ],
            [
                'id' => 3,
                'descripcion' => 'Medicina General',
            ],
            [
                'id' => 4,
                'descripcion' => 'Ginecología',
            ],
        ];

        foreach ($data as $value) {
            $find = Especialidad::find($value['id']);

            if(is_null($find)) {
                Especialidad::create($value);
            }
        }
    }
}
