<?php

namespace App\Controller;

use Firebase\JWT\JWT;
use App\Model\UserModel;
use MinasRouter\Http\Redirect;

class RegistarUserController
{
    public function regitar()
    {
        return views('regitar');
    }

    public function cadastrar()
    {
        $nome = $_POST['name'];
        $emial = $_POST['email'];
        $password = $_POST['pass'];
        $nif = $_POST['nif'];

        if (empty($_POST['name']) | empty($_POST['email'])  | empty($_POST['pass'])) {
            $erro = "Preeenchar todo os campos ";
            return views('regitar', ['erro' => $erro]);
        } else {

            if (UserModel::verificar(['nome' => $nome, 'password' => $password, 'nif' => $nif])) {
                $erro = "Usuario já existente Faça simplesmente o Login";
                return views('regitar', ['erro' => $erro]);
            } else {

                $key = 'example_key';
                $payload = [
                    'iss' => $nome,
                    'aud' => $password,
                ];
                $jwt = JWT::encode($payload, $key, 'HS256');

                $add = UserModel::add(['nome' => $nome, 'password' => $password, 'nif' => $nif, 'token' => $jwt]);

                $converter = array();
                foreach ($add as $userresolt) {
                    array_push($converter, $userresolt);
                };
                session_start();
                $_SESSION['nome'] = $converter[0]['nome'];
                $_SESSION['nif'] = $converter[0]['nif'];
                return Redirect::redirect("user");
            }
        }
    }
}
