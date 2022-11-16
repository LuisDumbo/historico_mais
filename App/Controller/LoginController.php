<?php

namespace App\Controller;

use Firebase\JWT\JWT;
use App\Model\UserModel;
use MinasRouter\Http\Redirect;

class LoginController
{
    public function login()
    {
        $erro = null;

        if (isset($_GET['erro']) &&  $_GET['erro'] == 2) {
            $erro = "Faça o login";
        }

        if (isset($_GET['erro']) &&  $_GET['erro'] == 1) {
            $erro = "Email e (ou) Password errados.";
        }
        return views('login', ['erro' => $erro]);
    }


    public function autenticar()
    {
        $nome = $_POST['nome'];
        $password = $_POST['Password'];

        $result = UserModel::find(['nome' => $nome, 'password' => $password]);

        $converter = array();
        foreach ($result as $restaurant) {
            array_push($converter, $restaurant);
        };

        if (isset($converter[0]['nome'])) {
            session_start();
            $_SESSION['nome'] = $converter[0]['nome'];
            $_SESSION['nif'] = $converter[0]['nif'];
            return Redirect::redirect("user");
        } else {

            return Redirect::redirect("login", 2, "erro");
        }
    }

    public function sair()
    {
        session_start();

        session_destroy();
        return  Redirect::redirect("login");
    }
}
