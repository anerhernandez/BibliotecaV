<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videogames')->insert([
            'titulo' => 'God of War (2018)',
            'descripcion' => 'Kratos se vuelve menos sanguinario y tiene un chiquillo y la mujer se le muere',
            'caratula' => '',
            'user_id' => 1
        ]);
        DB::table('videogames')->insert([
            'titulo' => 'Silet Hill 2',
            'descripcion' => 'A James se le muere la mujer, recibe una carta de la mujer que dice: "toy en Silent Hill, ven a buscarme"',
            'caratula' => '',
            'user_id' => 2
        ]);
    }
}
