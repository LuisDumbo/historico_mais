<?php

namespace App\Middleware;

use MinasRouter\Http\Response;
use Closure;
use MinasRouter\Router\Route;
use MinasRouter\Http\Redirect;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \MinasRouter\Http\Request  $request
     * @param  \Closure  $next
     * @param 
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        session_start();
        if (isset($_SESSION['nome']) ) {
            return $next($request);
        } else {
            return Redirect::redirect("login");
        }
    }
}
