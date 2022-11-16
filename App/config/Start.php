<?php

namespace App\config;

use App\config\DotEnv;

class Start
{

    public static function start()
    {
        $absolutePathToEnvFile = __DIR__ . '\..\..\.env';

        (new DotEnv($absolutePathToEnvFile))->load();
    }

    public static function app_url(){
        return  $APP_URL = $_ENV['APP_URL'];
    }
}
