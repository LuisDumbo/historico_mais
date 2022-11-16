<?php

namespace App\Model;

use App\BD\BDconnection;

class ConsultasModel
{
    public static function conectar_consulta()
    {
        $consulta  = BDconnection::connect();
        $colecao = $consulta->historicomais->Consulta;
        return $colecao;
    }

    public static function adicionar_consulta($dados)
    {

        $colecao = ConsultasModel::conectar_consulta();
        $colecao->insertOne($dados);
        return ConsultasModel::find($dados);
    }
    public static function listar($dados)
    {
        $colecao = ConsultasModel::conectar_consulta();
        $resultado = $colecao->find($dados);

        return $resultado;
    }

    public static function editar($bi_paciente, $dados)
    {
        $colecao = ConsultasModel::conectar_consulta();
        
        $colecao->updateOne(
           
            ['id_consulta' =>  $bi_paciente],
            ['$set' => $dados]
        );

        return ConsultasModel::find(['id_consulta'=> $bi_paciente]);
    }

    public static function find($dados)
    {
        $colecao = ConsultasModel::conectar_consulta();
        $resultado = $colecao->find($dados);
        return $resultado;
    }
}
