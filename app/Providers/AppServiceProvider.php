<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Bouncer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $menuButton = [
            'text'  => 'Crear un post',
            'icon'  => 'fas fa-fw fa-pencil-alt',
            'can'   => 'create',
            'model' => new \App\Models\Post
        ];

        if (request()->is('admin/posts/*')) {
            $menuButton['route'] = [
                'admin.posts.index',
                '#create'
            ];
        }
        else {
            $menuButton['url'] = '#';
            $menuButton['data'] = [
                'toggle' => 'modal',
                'target' => '#exampleModal'
            ];
        }

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($menuButton) {
            $event->menu->addIn('blog-menu', $menuButton);
        });

        Bouncer::tables([
            'abilities' => 'bouncer_abilities',
            'permissions' => 'bouncer_permissions',
            'roles' => 'bouncer_roles',
            'assigned_roles' => 'bouncer_assigned_roles'
        ]);
    }
}
