<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker;
        foreach (range(0, 100000) as $number) {
            Category::create([
                'name' => Str::random(5),
                'parent_id' => rand(1, count(Category::all())),
                'description' => Str::random(50)
            ]);
        }

    }
}
