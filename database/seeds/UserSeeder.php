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
            'password' => 'lpklprplus'
        ])->assign('admin');

        factory(User::class)->create([
            'name' => 'Nachita',
            'email' => 'natis_andru@hotmail.com',
            'password' => '11413115'
        ])->assign('writer');
    }
}
