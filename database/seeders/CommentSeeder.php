<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'comentario' => 'Verdadero peak del gaming, Kratos god',
            'valoracion' => 10,
            'user_id' => 1,
            'videogame_id' => 1
        ]);
        DB::table('comments')->insert([
            'comentario' => 'God 10/10 Actual cinema',
            'valoracion' => 9,
            'user_id' => 2,
            'videogame_id' => 2
        ]);
    }
}
