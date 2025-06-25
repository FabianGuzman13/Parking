<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sede;

class SedeSeeder extends Seeder
{
    public function run()
    {
        Sede::create(['nombre' => 'Miraflores']);
        Sede::create(['nombre' => 'San Isidro']);
        Sede::create(['nombre' => 'La Molina']);
    }
}