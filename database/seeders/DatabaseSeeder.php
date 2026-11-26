<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Gasto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategoriaSeeder::class);
        $categorias = Categoria::all();

        $usuario = User::factory()->create([
            'name' => 'admin',
            'email' => 'prueba@admin.com',
            'password' => bcrypt('1234'),
        ]);

        Gasto::factory(15)
            ->for($usuario)
            ->create()
            ->each(function (Gasto $gasto) use ($categorias) {
                $idsAleatorios = $categorias->random(rand(1, 3))->pluck('id');
                $gasto->categorias()->attach($idsAleatorios);
            });
    }
}
