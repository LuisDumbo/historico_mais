<?php

namespace App\Controller;

use App\Model\UserModel;

class UserController
{

    public function index()
    {
        $result = UserModel::find(['nome' => $_SESSION['nome'], 'nif' => $_SESSION['nif']]);
        $converter = array();
        foreach ($result as $restaurant) {
            array_push($converter, $restaurant);
        };


        return views('user', ["token" => $converter[0]['token']]);
    }

    public function home()
    {
        return views('home');
    }

    public function documentacao()
    {
        return views('documentacao1');
    }
}
