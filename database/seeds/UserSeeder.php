<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Luis',
            'email' => 'luisprmat@gmail.com',
            'password' => '$2y$10$0Q3878LOAAwjjiabC6vQyOa9aubvjio.8pF5QgTc7URBk0AcrctP6' //lpklprplus
        ]);
    }
}