<?php

namespace App\Model;

use App\BD\BDconnection;

class MedicoModel
{
    public static function conectar_medico()
    {
        $medico =  BDconnection::connect();
        $colecao = $medico->historicomais->Medico;

        return $colecao;
    }



    public static function lista_medico()
    {
        $colecao = MedicoModel::conectar_medico();

        $resultado = $colecao->find();

        return $resultado;
    }

    public static function adicionar_medico($data)
    {
        $medico =  MedicoModel::conectar_medico();
        $medico->insertOne($data);

        return MedicoModel::find($data);
    }

    public static function editar($numero_ordem, $dados)
    {

        $colecao = MedicoModel::conectar_medico();

        $colecao->updateOne(
            ['numero_rodem' => $numero_ordem],
            ['$set' => $dados]
        );

        return MedicoModel::find(['numero_rodem' => $numero_ordem]);
    }

    public static function find($dados)
    {
        $colecao = MedicoModel::conectar_medico();
        $resultado = $colecao->find($dados);

        return $resultado;
    }
}
