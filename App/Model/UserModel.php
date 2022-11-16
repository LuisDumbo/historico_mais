<?php

namespace App\Model;

use App\BD\BDconnection;

class UserModel
{

    public static function conectar_user()
    {
        $user = BDconnection::connect();
        $colecao = $user->historicomais->user;

        return $colecao;
    }

    public static function verificar($dados)
    {

        $result =  UserModel::find($dados);
        $converter = array();
        foreach ($result as $restaurant) {
            array_push($converter, $restaurant);
        };

        if (isset($converter[0]['nome'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function add($dados)
    {

        $colecao = UserModel::conectar_user();
        $colecao->insertOne($dados);
        return UserModel::find($dados);
    }

    public static function find($data)
    {
        $colecao = UserModel::conectar_user();
        $resultado =  $colecao->find($data);

        return $resultado;
    }
}
