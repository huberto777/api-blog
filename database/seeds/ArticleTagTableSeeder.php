<?php

use Illuminate\Database\Seeder;

class ArticleTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for ($i = 1; $i <= 100; $i++) {
            DB::table('article_tag')->insert([
                'article_id' => $faker->numberBetween(1, 30),
                'tag_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
