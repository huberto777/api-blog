<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for ($i = 1; $i <= 30; $i++) {
            $title = $faker->text(20);
            DB::table('articles')->insert([
                'title' => $title,
                'slug' => str_slug($title),
                'content' => $faker->text(500),
                'user_id' => 1,
                // 'path' => null,//$faker->imageUrl(275,150),
                // 'category_id' => $faker->numberBetween(1,5),
                'created_at' => $faker->dateTime
            ]);
        }
    }
}
