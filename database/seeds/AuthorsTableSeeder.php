<?php

use Illuminate\Database\Seeder;
use App\Author;
use Faker\Generator as Faker;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 10 ; $i++) {
            $new_author = new Author();
            $new_author->name = $faker->firstName();
            $new_author->lastname = $faker->lastName();
            $new_author->Date_of_birth = $faker->date('Y_m_d');
            $new_author->save();

        }
    }
}
