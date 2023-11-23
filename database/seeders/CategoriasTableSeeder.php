<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Restaurantes',
            'Farmacias',
            'Tiendas de Ropa',
            'Salones de Belleza',
            'Gasolineras',
            'Supermercados',
            'Talleres Automotrices',
            'Centros de Salud',
            'Servicios Financieros',
            'Tiendas de Electrónicos',
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'name' => $categoria,
            ]);
        }
    }
}
