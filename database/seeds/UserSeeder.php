<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 25; $i++) {
        $gender = $faker->randomElement(['male', 'female']);
        $image = 'image'. $i . '.jpeg';
            DB::table('users')->insert([
                'avatar' => $image,
                'name' => $faker->name,
                'surname' => $faker->firstName,
                'birthday' => $faker->date(),
                'email' => $faker->email,
                'gender' => 'male',
                'orientation' => json_encode([$gender]),
                'city' => $faker->address,
                'password' => bcrypt('secret'),
            ]);
        }
        for ($i = 1; $i <= 25; $i++) {
        $gender = $faker->randomElement(['male', 'female']);
        $image = 'image'. (25 + $i) . '.jpeg';
            DB::table('users')->insert([
                'avatar' => $image,
                'name' => $faker->name,
                'surname' => $faker->firstName,
                'birthday' => $faker->date(),
                'email' => $faker->email,
                'gender' => 'female',
                'orientation' => json_encode([$gender]),
                'city' => $faker->address,
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
