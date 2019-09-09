<?php

use Illuminate\Database\Seeder;
use App\{Article};

class LikesTableSeeder extends Seeder
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
            // foreach (Article::all() as $article) {
            DB::table('likes')->insert([
                'user_id' => App\User::pluck('id')->random(),
                // 'article_slug' => $article->slug
                'article_id' => $faker->numberBetween(1, 25),
            ]);
            // }
        }
    }
}
