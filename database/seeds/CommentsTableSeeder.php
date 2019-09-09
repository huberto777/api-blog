<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        for ($i = 1; $i <= 50; $i++) {

            DB::table('comments')->insert([

                'article_id' => $faker->numberBetween(1, 30),
                'user_id' => App\User::pluck('id')->random(),
                'content' => $faker->text(500),
                'rating' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
