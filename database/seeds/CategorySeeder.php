<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class)->create(['name' => 'Paisajes']);
        factory(Category::class)->create(['name' => 'Ensayos']);
    }
}
