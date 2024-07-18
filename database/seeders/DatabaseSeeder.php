<?php

namespace Database\Seeders;

use App\Models\GrupoInvestigacion;
use App\Models\Institucion;
use App\Models\MetodoPago;
use App\Models\TipoDocumento;
use App\Models\TipoParticipante;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        MetodoPago::create([
            'metodo' => 'Transferencia'
        ]);
        MetodoPago::create([
            'metodo' => 'Yape'
        ]);
        MetodoPago::create([
            'metodo' => 'Pin'
        ]);

        TipoDocumento::create([
            'nombre' => 'DNI'
        ]);
        TipoDocumento::create([
            'nombre' => 'Pasaporte'
        ]);
        TipoDocumento::create([
            'nombre' => 'Carnet de extranjería'
        ]);
        TipoParticipante::create([
            'tipo' => 'Estudiante'
        ]);
        TipoParticipante::create([
            'tipo' => 'Público en general'
        ]);
        GrupoInvestigacion::create([
            'nombre' => 'Ninguno'
        ]);
        Institucion::create([
            'nombre' => 'Ninguno'
        ]);

        User::factory()->create([
            'name' => 'Deyber Manrique',
            'email' => 'dmanriquea@unasam.edu.pe',
        ]);
    }
}
