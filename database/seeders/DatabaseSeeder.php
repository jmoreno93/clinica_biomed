<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PacienteSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(MedicamentoSeeder::class);
    }
}
