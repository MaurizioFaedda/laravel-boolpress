<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

use Faker\Generator as Faker;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5 ; $i++) {
            $new_category = new Category();
            $new_category -> name = $faker->words(3, true);
            $slug = Str::slug($new_category->name);
            $slug_basic = $slug;
            $new_slug = Category::where('slug', $slug)->first();
            $counter = 1;
            while($new_slug){
               $slug = $slug_basic . '-' . $counter;
               $counter++;
               $new_slug = Category::where('slug', $slug)->first();
            }
            $new_category->slug = $slug;
            $new_category->save();

        }
    }
}
