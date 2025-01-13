<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->tinyInteger('valoracion');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('videogame_id')->constrained();
            $table->timestamps();
        });
        Artisan::call('db:seed', [
            '--class' => 'CommentSeeder',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
