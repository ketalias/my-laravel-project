<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('subscribers', function (Blueprint $table) {
        $table->id(); // автоматичний інкрементний ідентифікатор
        $table->string('phone_number')->unique(); // номер телефону
        $table->string('home_address'); // домашня адреса
        $table->string('owner'); // власник
        $table->decimal('total_call_duration', 8, 2)->default(0); // сумарна тривалість розмов (в годинах або хвилинах)
        $table->decimal('balance', 10, 2)->default(0); // рахунок
        $table->timestamps(); // поля для зберігання часу створення і оновлення
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_name');
    }
};
