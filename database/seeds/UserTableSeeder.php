<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $faker = Factory::create();

        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'slug' => 'john-doe',
                'email' => 'johndoe@test.com',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => 'Jahn Doe',
                'slug' => 'jahn-doe',
                'email' => 'jahndoe@test.com',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ],
            [
                'name' => 'Edo Masaru',
                'slug' => 'edo-masaru',
                'email' => 'edo@test.com',
                'password' => bcrypt('secret'),
                'bio' => $faker->text(rand(250, 300))
            ]
        ]);
    }
}
