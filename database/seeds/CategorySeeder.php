<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category' => 'Breakfast'
        ]);

        Category::create([
            'category' => 'Lunch'
        ]);

        Category::create([
            'category' => 'Beverage'
        ]);
    }
}
