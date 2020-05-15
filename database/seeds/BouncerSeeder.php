<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->createAbilities();
    }

    protected function createRoles()
    {
        Bouncer::role()->create([
            'name' => 'admin',
            'title' => 'Administrador'
        ]);

        Bouncer::role()->create([
            'name' => 'writer',
            'title' => 'Escritor'
        ]);
    }

    protected function createAbilities()
    {
        Bouncer::ability()->create([
            'name' => '*',
            'title' => 'Todas las habilidades',
            'entity_type' => '*'
        ]);

        // Post abilities
        Bouncer::ability()->create([
            'name' => 'view-posts',
            'title' => 'Ver publicaciones',
        ]);

        Bouncer::ability()->create([
            'name' => 'create-posts',
            'title' => 'Crear publicaciones',
        ]);

        Bouncer::ability()->create([
            'name' => 'update-posts',
            'title' => 'Actualizar publicaciones',
        ]);

        Bouncer::ability()->create([
            'name' => 'delete-posts',
            'title' => 'Eliminar publicaciones',
        ]);

        // User abilities
        Bouncer::ability()->create([
            'name' => 'view-users',
            'title' => 'Ver usuarios',
        ]);

        Bouncer::ability()->create([
            'name' => 'create-users',
            'title' => 'Crear usuarios',
        ]);

        Bouncer::ability()->create([
            'name' => 'update-users',
            'title' => 'Actualizar usuarios',
        ]);

        Bouncer::ability()->create([
            'name' => 'delete-users',
            'title' => 'Eliminar usuarios',
        ]);

        // Role abilities
        Bouncer::ability()->create([
            'name' => 'view-roles',
            'title' => 'Ver roles',
        ]);

        Bouncer::ability()->create([
            'name' => 'create-roles',
            'title' => 'Crear roles',
        ]);

        Bouncer::ability()->create([
            'name' => 'update-roles',
            'title' => 'Actualizar roles',
        ]);

        Bouncer::ability()->create([
            'name' => 'delete-roles',
            'title' => 'Eliminar roles',
        ]);

        // Ability abilities
        Bouncer::ability()->create([
            'name' => 'view-abilities',
            'title' => 'Ver permisos',
        ]);

        Bouncer::ability()->create([
            'name' => 'update-abilities',
            'title' => 'Actualizar permisos',
        ]);
     }
}
