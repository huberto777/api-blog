<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'admin@op.pl',
            'password' => bcrypt('qwerty'),
            // 'path' => $faker->imageUrl(250,175),
            'remember_token' => str_random(32)
        ]);
    }
}
