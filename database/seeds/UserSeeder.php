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
        $gender = $faker->randomElement(['male', 'female']);
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.fr',
            'birthday' => $faker->date(),
            'sexe' => $gender,
            'city' => $faker->address,
            'orientation' => $gender,
            'password' => bcrypt('secret'),
        ]);
        for ($i = 1; $i <= 30; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'surname' => $faker->firstName,
                'email' => $faker->email,
                'birthday' => $faker->date(),
                'sexe' => $gender,
                'city' => $faker->address,
                'orientation' => $gender,
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
