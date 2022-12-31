<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class LettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $newLetter = new Letter();
            $newLetter->name = $faker->name();
            $newLetter->lastname = $faker->lastname();
            $newLetter->address = $faker->streetAddress();
            $newLetter->city = $faker->city();
            $newLetter->arrival_letter = $faker->date('2022_m_d');
            $newLetter->present = $faker->word(1);
            $newLetter->content_letter = $faker->paragraph(2);
            $newLetter->rating = $faker->numberBetween(1, 5);
            $newLetter->delivered = $faker->numberBetween(0, 1);
            $newLetter->save();
        }
    }
}
