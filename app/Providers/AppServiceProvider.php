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
        $isIndex = [
            'text' => 'Crear un post',
            'icon' => 'fas fa-fw fa-pencil-alt',
            'url'  => '#',
            'data' => [
                'toggle' => 'modal',
                'target' => '#exampleModal'
            ]
        ];

        $isNotIndex = [
            'text' => 'Crear un post',
            'icon' => 'fas fa-fw fa-pencil-alt',
            'route' => [
                'admin.posts.index',
                '#create'
            ]
        ];

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($isIndex, $isNotIndex) {
            if (request()->is('admin/posts/*')) {
                $event->menu->addIn('blog-menu', $isNotIndex);
            }
            else {
                $event->menu->addIn('blog-menu', $isIndex);
            }
        });

        Bouncer::tables([
            'abilities' => 'bouncer_abilities',
            'permissions' => 'bouncer_permissions',
            'roles' => 'bouncer_roles',
            'assigned_roles' => 'bouncer_assigned_roles'
        ]);
    }
}
