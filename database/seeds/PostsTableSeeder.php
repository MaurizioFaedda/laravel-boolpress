<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         // $this->call(UsersTableSeeder::class);
         for ($i=0; $i < 10; $i++) {
             $new_post = new Post();
             $new_post->title = $faker->sentence();
             $new_post->content = $faker->text(500);
             $slug = Str::slug($new_post->title);
             $slug_basic = $slug;
             $new_slug = Post::where('slug', $slug)->first();
             $counter = 1;
             while($new_slug){
                $slug = $slug_basic . '-' . $counter;
                $counter++;
                $new_slug = Post::where('slug', $slug)->first();
             }
             $new_post->slug = $slug;
             $new_post->save();

         }
     }
}
