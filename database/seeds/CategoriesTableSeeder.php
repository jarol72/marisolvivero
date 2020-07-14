<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory(App\Category::class, 5)->create()->each(function ($category) {
            $category->products()->save(factory(App\Product::class, 10)->make());
        }); */

        Category::create([
            'category' => 'Aromáticas',
            'image' => 'aromaticas.jpg'
        ]);

        Category::create([
            'category' => 'Frutales',
            'image' => 'frutales.jpg'
        ]);

        Category::create([
            'category' => 'Hortalizas',
            'image' => 'hortalizas.jpg'
        ]);

        Category::create([
            'category' => 'Ornamentales',
            'image' => 'ornamentales.jpg'
        ]);

        Category::create([
            'category' => 'Reforestación',
            'image' => 'reforestacion.jpg'
        ]);

    }
}
