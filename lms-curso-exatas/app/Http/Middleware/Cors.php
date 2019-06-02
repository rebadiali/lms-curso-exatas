<?php


namespace App\Http\Middleware;

use Closure;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Acess-Control-Allow-Origin: *')
            ->header('Acess-Control-Allow-Headers: Content-Type, X-Auth-Token, Authorization,Origin');
    }
}