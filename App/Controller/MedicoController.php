<?php

namespace App\Controller;

use MinasRouter\Http\Response;
use App\Model\MedicoModel;

class MedicoController
{

    public static function listar_medico()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

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

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!isset($data["numero_rodem"]) || !isset($data["dados"])) {
            new Response('exception', '', ["Dados incorretos"]);
        } else {

            try {
                $editar =  MedicoModel::editar($data["numero_rodem"], $data["dados"]);
                $resultado = array();
                foreach ($editar as $row) {
                    array_push($resultado, $row);
                };
             //   array_push($resultado, $data["numero_rodem"]);
                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('ok', '', ["erro"]);
            }
        }
    }

    public static function um_medico()
    {


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        if (!isset($_GET['numero_ordem'])) {

            new Response('ok', '', ["Deve Indicar o numero_ordem "]);
        } else {

            try {
                $editar =  MedicoModel::find(['numero_rodem' => $_GET['numero_ordem']]);
                $resultado = array();
                foreach ($editar as $row) {
                    array_push($resultado, $row);
                };

                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('ok', '', [""]);
            }
        }

        /*
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!isset($data["numero_rodem"])) {
            new Response('exception', '', ["Dados incorretos"]);
        } else {

            try {
                $editar =  MedicoModel::find(['numero_rodem' => $data["numero_rodem"]]);
                $resultado = array();
                foreach ($editar as $row) {
                    array_push($resultado, $row);
                };

                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('ok', '', [""]);
            }
        }
        ?*/
    }
}
