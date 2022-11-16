<?php

namespace MinasRouter\Http;

use App\config\Start;

class Redirect
{

    /**
     * redirect to given url:
     */
    public static function redirect($url, $permanent = false, $nameParameter = false)
    {

        if ($permanent = !false && $nameParameter != false) {
            header('Location: ' . Start::app_url() . '' . $url . '?' . $nameParameter . '=' . $permanent);
            exit();
        }
        header('Location: ' . Start::app_url() . '' . $url);
        exit();
    }
}
