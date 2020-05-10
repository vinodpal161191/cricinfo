<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class NavigationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('clientMenu', function ($menu) {
            $menu->add('Points Table', route('points.index'))->active('points/*');
            $menu->add('Matches', route('matches.index'))->active('matches/*');
            $menu->add('Players', route('players.index'))->active('players/*');
            $menu->add('Teams', route('teams.index'))->active('teams/*');
            
        });
        Menu::make('breadcrumbs', function($menu){

        });
        return $next($request);
    }
}
