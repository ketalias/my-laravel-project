<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tournament_participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('gender', 1);
            $table->integer('age');
            $table->string('country');
            $table->string('scores'); // Use TEXT for JSON data in SQLite
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tournament_participants');
    }
};
