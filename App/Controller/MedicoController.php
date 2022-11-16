<?php

namespace App\Controller;

use MinasRouter\Http\Response;
use App\Model\MedicoModel;

class MedicoController
{

    public static function listar_medico()
    {
        try {
            $arrey = MedicoModel::lista_medico();

            $data = array();
            foreach ($arrey as $restaurant) {
                array_push($data, $restaurant);
            };

            new Response('ok', '', $data);
        } catch (\Throwable $th) {
            new Response('ok', '', [""]);
        }
    }

    public static function cadastrar_medico()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        try {
            $add = MedicoModel::adicionar_medico($data);

            $converter = array();
            foreach ($add as $restaurant) {
                array_push($converter, $restaurant);
            };

            new Response('ok', '', $converter);
        } catch (\Throwable $th) {
            new Response('ok', '', [""]);
        }
    }

    public static function editar_medico()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!isset($data["numero da ordem"]) || !isset($data["dados"])) {
            new Response('exception', '', ["Dados incorretos"]);
        } else {

            try {
                $editar =  MedicoModel::editar($data["numero da ordem"], $data["dados"]);
                $resultado = array();
                foreach ($editar as $row) {
                    array_push($resultado, $row);
                };

                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('ok', '', [""]);
            }
        }
    }

    public static function um_medico()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!isset($data["numero da ordem"])) {
            new Response('exception', '', ["Dados incorretos"]);
        } else {

            try {
                $editar =  MedicoModel::find(['numero da ordem' => $data["numero da ordem"]]);
                $resultado = array();
                foreach ($editar as $row) {
                    array_push($resultado, $row);
                };

                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('ok', '', [""]);
            }
        }
    }
}
