<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
  

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(
        //     [   
        //         'client.sub.calender_open_server',
        //         'client.sub.footer',
        //         'client.sub.header',
        //         'client.sub.nav_bottom',
        //         'client.sub.nav_list_games',
        //         'client.sub.nav_top',
        //         'client.sub.slider',
        //         'client.sub.left_menu',
        //         'client.sub.layout',
        //         'client.sub.vong_quay'
        //     ], 'App\Http\ViewComposers\MenuComposer'
        // );
    }
    public function register()
    {
        //
    }
}
