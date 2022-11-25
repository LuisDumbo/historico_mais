<?php

namespace App\Middleware;

use MinasRouter\Http\Response;
use Closure;
use MinasRouter\Router\Route;
use MinasRouter\Http\Redirect;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Model\UserModel;

class AdminMiddleware
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

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        if (!preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {

            return Redirect::redirect("not");
        }

        $jwt = $matches[1];
        if (!$jwt) {
            return Redirect::redirect("not");
        }

        $key = 'example_key';
        try {
            $token = JWT::decode($jwt, new Key($key, 'HS256'));

            $result = UserModel::find(['nome' => $token->iss, 'password' => $token->aud]);

            $converter = array();
            foreach ($result as $restaurant) {
                array_push($converter, $restaurant);
            };
            if (count($converter) == 0) {
                return Redirect::redirect("not");
            }
        } catch (\Throwable $th) {
            return Redirect::redirect("not");
        }

        return $next($request);
    }
}
