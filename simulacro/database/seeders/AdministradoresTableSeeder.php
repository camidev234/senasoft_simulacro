<?php

namespace Database\Seeders;

use App\Models\Administradores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $nuevoAdmin = new Administradores();

        $nuevoAdmin->name = 'camilo';
        $nuevoAdmin->email = 'camilo222andresace@gmail.com';
        $nuevoAdmin->password = '0000';

        $nuevoAdmin->save();
    }
}
