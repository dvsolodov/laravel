<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
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
            \DB::table('news')
                ->insert($this->generateData());
        }
    }

    protected function generateData(): array
    {
        $data = [];
        $data[] = [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text(100),
            'text' => $this->faker->text(),
            'slug' => str_replace(' ', '_', $this->faker->text()),
            'source_id' => rand(1, 10),
            'category_id' => rand(1, 7),
            'publish_date' => $this->faker->date(),
        ];

        return $data;
    }
}
