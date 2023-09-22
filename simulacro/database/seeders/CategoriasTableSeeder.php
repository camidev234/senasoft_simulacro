<?php

namespace Database\Seeders;

use App\Models\CategoriasSondeos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Politica';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Educacion';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Salud';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Medio ambiente';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Economia';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Seguridad';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Transporte y movilidad';
        $nueva_categoria->save();

        $nueva_categoria = new CategoriasSondeos();

        $nueva_categoria->categoria = 'Tecnologia e Innovación';
        $nueva_categoria->save();
    }

}
