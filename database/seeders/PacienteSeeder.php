<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Carbon\Carbon;
use Faker\Provider\es_PE\Address;
use Faker\Provider\es_PE\Person;
use Faker\Provider\PhoneNumber;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'dni' => Person::dni(),
                'nombre_pac' => Person::firstNameMale(),
                'apellido_pac' => Person::firstNameMale(),
                'fecha_nac' => Carbon::today()->subYears(rand(18, 70))->subDays(520),
                'sexo' => 'M',
                'direccion' => Address::secondaryAddress(),
                'telefono' => PhoneNumber::numberBetween(900000000, 999999999),
            ],
            [
                'dni' => Person::dni(),
                'nombre_pac' => Person::firstNameMale(),
                'apellido_pac' => Person::firstNameMale(),
                'fecha_nac' => Carbon::today()->subYears(rand(18, 70))->subDays(520),
                'sexo' => 'M',
                'direccion' => Address::secondaryAddress(),
                'telefono' => PhoneNumber::numberBetween(900000000, 999999999),
            ],
            [
                'dni' => Person::dni(),
                'nombre_pac' => Person::firstNameMale(),
                'apellido_pac' => Person::firstNameMale(),
                'fecha_nac' => Carbon::today()->subYears(rand(18, 70))->subDays(520),
                'sexo' => 'M',
                'direccion' => Address::secondaryAddress(),
                'telefono' => PhoneNumber::numberBetween(900000000, 999999999),
            ],
            [
                'dni' => Person::dni(),
                'nombre_pac' => Person::firstNameMale(),
                'apellido_pac' => Person::firstNameMale(),
                'fecha_nac' => Carbon::today()->subYears(rand(18, 70))->subDays(520),
                'sexo' => 'M',
                'direccion' => Address::secondaryAddress(),
                'telefono' => PhoneNumber::numberBetween(900000000, 999999999),
            ],
        ];

        foreach ($data as $value) {
            $find = Paciente::find($value['dni']);

            if(is_null($find)) {
                Paciente::create($value);
            }
        }
    }
}
