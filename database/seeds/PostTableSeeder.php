<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2018, 7, 1, 9);

        for($i=1; $i<=100; $i++){

            $image = "Post_Image_".rand(1, 5).".jpg";
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);

            $title = $faker->sentence(rand(8, 12));
            $posts[] = [
                'author_id' => rand(1, 3),
                'title' => $title,
                'excerpt' => $faker->text(rand(250, 300)),
                'body' => $faker->paragraphs(rand(10, 15), true),
                'slug' => str_slug($title),
                'image' => rand(0,1) == 1 ? $image : NULL,
                'view_count' => rand(0, 10) * 10,
                'category_id' => rand(1, 5),
                'created_at' => $createdDate,
                'updated_at' => $createdDate,
                'published_at' => $i > 5 ? $publishedDate :(rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4))
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
