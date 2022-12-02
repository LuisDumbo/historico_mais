<?php

namespace App\Controller;

use MinasRouter\Http\Response;
use App\Model\PacienteModel;
use MongoDB\Exception\Exception;


class PacienteController
{

    public function index()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        $cursor = PacienteModel::ler();

        $data = array();
        foreach ($cursor as $restaurant) {
            array_push($data, $restaurant);
        };

        new Response('ok', '', $data);
    }

    public function cadastrar()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');



        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $add = PacienteModel::add($data);


        $converter = array();
        foreach ($add as $restaurant) {
            array_push($converter, $restaurant);
        };

        new Response('ok', '', $converter);
    }

    public static function  editar()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);



        if (!isset($data["BI"]) || !isset($data["dados"])) {
            new Response('exception', '', ["Dados incorretos"]);
        } else {

            $editar =   PacienteModel::editar_dados_pessoas($data["BI"], $data["dados"]);
            $resultado = array();
            foreach ($editar as $row) {
                array_push($resultado, $row);
            };

            new Response('ok', '', $resultado);
        }
    }

    public static function um_paciente()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');

        if (!isset($_GET['bi'])) {

            new Response('ok', '', ["Deve Indicar o BI "]);
        } else {

            try {
                $listar = PacienteModel::find(["BI" => $_GET['bi']]);
                $data = array();
                foreach ($listar as $key) {
                    array_push($data, $key);
                }
                new Response('ok', '', $data);
            } catch (Exception $th) {
                new Response('erro', '', [$th]);
            }
        }

        /*

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', 'Sem dados', ["Sem dadso"]);
        } else {
            if (!isset($data["BI"])) {
                new Response('erro', '', [" BI encontram-se vasios"]);
            } else {
                try {
                    $listar = PacienteModel::find(["BI" => $data["BI"]]);
                    $data = array();
                    foreach ($listar as $key) {
                        array_push($data, $key);
                    }
                    new Response('ok', '', $data);
                } catch (Exception $th) {
                    new Response('erro', '', [$th]);
                }
            }
        }
        */
    }
}
