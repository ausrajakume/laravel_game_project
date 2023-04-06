<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameLanguages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert(
            [
                [
                    'name' => 'english',
                    'abbr' => 'en',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                [
                    'name' => 'german',
                    'abbr' => 'de',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                [
                    'name' => 'spanish',
                    'abbr' => 'es',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                [
                    'name' => 'lithuanian',
                    'abbr' => 'lt',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                [
                    'name' => 'french',
                    'abbr' => 'fr',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                [
                    'name' => 'japanese',
                    'abbr' => 'jp',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                [
                    'name' => 'russian',
                    'abbr' => 'ru',
                    'created_at' => Date::now(),
                    'updated_at' => Date::now()
                ],
                ]);
    }
}
