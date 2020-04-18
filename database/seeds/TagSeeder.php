<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class)->create(['name' => 'Yosemite']);
        factory(Tag::class)->create(['name' => 'Peak']);
        factory(Tag::class)->create(['name' => 'Explorer']);
    }
}
