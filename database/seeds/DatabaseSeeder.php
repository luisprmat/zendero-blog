<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'post_tag',
            'tags',
            'posts',
            'categories'
        ]);

        $this->call([
            TagSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            UserSeeder::class
        ]);
    }

    protected function truncateTables(array $tables)
    {
        // Desactiva revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        // Activa revisión de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
