<?php

namespace App\Model;

use App\BD\BDconnection;

class PacienteModel
{

    public static function conectar_paciente()
    {
        $cliente =  BDconnection::connect();
        $colecao = $cliente->historicomais->paciente;
        return $colecao;
    }

    public static function ler()
    {
        $colecao = PacienteModel::conectar_paciente();
        $resultado = $colecao->find();
        return $resultado;
    }

    public static function add($data)
    {

        $colecao = PacienteModel::conectar_paciente();
        $colecao->insertOne($data);
        return  PacienteModel::find($data);
    }

    public static function editar_dados_pessoas($id_paciente, $dados)
    {
        $colecao = PacienteModel::conectar_paciente();

        $colecao->updateOne(
            ['BI' => $id_paciente],
            ['$set' => $dados]
        );
        return  PacienteModel::find(['BI' => $id_paciente]); 

    }


    public static function find($dados)
    {
        $colecao = PacienteModel::conectar_paciente();
        $resultado = $colecao->find($dados);

        return $resultado;
    }
}
