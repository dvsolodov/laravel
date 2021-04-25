<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
        $newsCategories = [
            [
                'name' => 'в мире',
                'slug' => 'world',
            ],
            [
                'name' => 'экономика',
                'slug' => 'business',
            ],
            [
                'name' => 'общество',
                'slug' => 'society',
            ],
            [
                'name' => 'коронавирус',
                'slug' => 'koronavirus',
            ],
            [
                'name' => 'культура',
                'slug' => 'culture',
            ],
            [
                'name' => 'технологии',
                'slug' => 'computers',
            ],
            [
                'name' => 'наука',
                'slug' => 'science',
            ],
        ];

        foreach ($newsCategories as $category) {
            \DB::table('categories')->insert($category);
        }
    }
}
