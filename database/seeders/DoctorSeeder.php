<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Especialidad;
use Faker\Provider\es_PE\Person;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id_doctor' => 1,
                'id_especialidad' => Especialidad::ENDOCRINOLOGIA,
                'nombre_doc' => Person::firstNameMale(),
                'apellido_doc' => Person::firstNameMale(),
            ],
            [
                'id_doctor' => 2,
                'id_especialidad' => Especialidad::MEDICINA_GENERAL,
                'nombre_doc' => Person::firstNameMale(),
                'apellido_doc' => Person::firstNameMale(),
            ],
            [
                'id_doctor' => 3,
                'id_especialidad' => Especialidad::GINECOLOGIA,
                'nombre_doc' => Person::firstNameFemale(),
                'apellido_doc' => Person::firstNameFemale(),
            ],
            [
                'id_doctor' => 4,
                'id_especialidad' => Especialidad::GASTROENTEROLOGIA,
                'nombre_doc' => Person::firstNameMale(),
                'apellido_doc' => Person::firstNameMale(),
            ],
        ];

        foreach ($data as $value) {
            $find = Doctor::find($value['id_doctor']);

            if(is_null($find)) {
                Doctor::create($value);
            }
        }
    }
}
