<?php

namespace App\Model;

use App\BD\BDconnection;

class ExameModel
{

    public static function conectar_exame()
    {
        $exame  = BDconnection::connect();
        $colecao = $exame->historicomais->Exame;
        return $colecao;
    }

    public static function adiconar_exame($dados)
    {
        $colecao = ExameModel::conectar_exame();
        $colecao->insertOne($dados);
        return ExameModel::find($dados);
    }

    public static function editar_exame($id_exame, $dados)
    {
        $colecao = ExameModel::conectar_exame();

        $colecao->updateOne(

            ['id_exame' =>  $id_exame],
            ['$set' => $dados]
        );

        return ExameModel::find(['id_exame' =>  $id_exame]);
    }


    public static function find($dados)
    {
        $colecao = ExameModel::conectar_exame();
        $resultado = $colecao->find($dados);
        return $resultado;
    }
}
