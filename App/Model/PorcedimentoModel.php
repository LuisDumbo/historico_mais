<?php

namespace App\Model;

use App\BD\BDconnection;

class PorcedimentoModel
{
    public static function conectar_procedimento()
    {
        $consulta  = BDconnection::connect();
        $colecao = $consulta->historicomais->procedimento;
        return $colecao;
    }

    public static function adicionar_procediment($dados)
    {

        $colecao = PorcedimentoModel::conectar_procedimento();
        $colecao->insertOne($dados);
        return PorcedimentoModel::find($dados);
    }

    public static function listar($dados)
    {
        $colecao = PorcedimentoModel::conectar_procedimento();
        $resultado = $colecao->find($dados);

        return $resultado;
    }

    public static function find($dados)
    {
        $colecao = PorcedimentoModel::conectar_procedimento();
        $resultado = $colecao->find($dados);
        return $resultado;
    }
}
