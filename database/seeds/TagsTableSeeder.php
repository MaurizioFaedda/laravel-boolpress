<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {

            $new_tag = new Tag();
            $new_tag->name = $faker->words(2, true);
            $slug = Str::slug($new_tag->name);
            $slug_basic = $slug;
            $new_slug = Tag::where('slug', $slug)->first();
            $counter = 1;
            while($new_slug){
               $slug = $slug_basic . '-' . $counter;
               $counter++;
               $new_slug = Tag::where('slug', $slug)->first();
            }
            $new_tag->slug = $slug;
            $new_tag->save();

        }
    }
}
