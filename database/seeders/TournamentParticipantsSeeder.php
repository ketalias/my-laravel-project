<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TournamentParticipantsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tournament_participants')->insert([
            ['name' => 'Іван Іванов', 'gender' => 'M', 'age' => 25, 'country' => 'Ukraine', 'scores' => json_encode([8, 9, 7])],
            ['name' => 'Марія Петренко', 'gender' => 'F', 'age' => 20, 'country' => 'Ukraine', 'scores' => json_encode([9, 8, 9])],
            ['name' => 'Сергій Коваль', 'gender' => 'M', 'age' => 30, 'country' => 'USA', 'scores' => json_encode([7, 8, 6])],
            ['name' => 'Олена Дорошенко', 'gender' => 'F', 'age' => 22, 'country' => 'Ukraine', 'scores' => json_encode([10, 9, 9])],
            ['name' => 'Олександр Рябов', 'gender' => 'M', 'age' => 28, 'country' => 'USA', 'scores' => json_encode([6, 7, 8])]
        ]);

    }
}


