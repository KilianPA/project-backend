
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
        $image = 'image'. 4 . '.jpeg';
        $city = $faker->randomElement(['Nice', 'Lille', 'Paris', 'Saint-Quentin', 'Rennes', 'Reims', 'Tours', 'Lyon', 'Marseille', 'Cannes']);
        DB::table('users')->insert([
            'avatar' => $image,
            'name' => $faker->name,
            'surname' => $faker->firstName,
            'birthday' => $faker->dateTime('2000-04-25'),
            'email' => 'admin@admin.fr',
            'gender' => 'Homme',
            'orientation' => json_encode(['Homme']),
            'city' => $city,
            'password' => bcrypt('secret'),
        ]);
        for ($i = 1; $i <= 25; $i++) {
        $gender = $faker->randomElement(['Homme', 'Femme']);
        $city = $faker->randomElement(['Nice', 'Lille', 'Paris', 'Saint-Quentin', 'Rennes', 'Reims', 'Tours', 'Lyon', 'Marseille', 'Cannes']);
        $image = 'image'. $i . '.jpeg';
            DB::table('users')->insert([
                'avatar' => $image,
                'name' => $faker->name,
                'surname' => $faker->firstName,
                'birthday' => $faker->dateTime('2000-04-25'),
                'email' => $faker->email,
                'gender' => 'Homme',
                'orientation' => json_encode([$gender]),
                'city' => $city,
                'password' => bcrypt('secret'),
            ]);
        }
        for ($i = 1; $i <= 25; $i++) {
            $city = $faker->randomElement(['Nice', 'Lille', 'Paris', 'Saint-Quentin', 'Rennes', 'Reims', 'Tours', 'Lyon', 'Marseille', 'Cannes']);
        $gender = $faker->randomElement(['Homme', 'Femme']);
        $image = 'image'. (25 + $i) . '.jpeg';
            DB::table('users')->insert([
                'avatar' => $image,
                'name' => $faker->name,
                'surname' => $faker->firstName,
                'birthday' => $faker->dateTime('2000-04-25'),
                'email' => $faker->email,
                'gender' => 'Femme',
                'orientation' => json_encode([$gender]),
                'city' => $city,
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
