<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Alimentación',
            'Transporte',
            'Entretenimiento',
            'Vivienda',
            'Servicios',
            'Salud',
            'Educación',
            'Otros',
        ];
        foreach ($categorias as $nombre) {
            Categoria::FirstOrCreate(['nombre' => $nombre]);
        }
    }
}
