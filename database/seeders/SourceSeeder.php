<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $this->faker = $faker;

        for ($i = 1; $i <= 10; $i++) {
            \DB::table('sources')
                ->insert(['url' => $this->faker->url]);
        }
    }
}
