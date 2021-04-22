<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $this->faker = $faker;

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('123'),
        ]);

        for($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => $this->faker->firstName(),
                'email' => $this->faker->safeEmail(),
                'password' => Hash::make('123'),
            ]);
        }
    }
}
