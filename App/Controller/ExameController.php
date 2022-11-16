<?php

namespace App\Controller;

use App\Model\ExameModel;
use MinasRouter\Http\Response;
use MongoDB\Exception\Exception;

class ExameController
{

    public static function adicionar_exame()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } elseif (!isset($data["BI"]) || !isset($data["dados"])) {
            new Response('erro', '', [" BI  dados  encontram-se vasios"]);
        } else {
            try {
                $headerBI = ["BI Paciente" => $data["BI"]];
                $id_exame = ["id_exame" => uniqid(rand(10, 100))];
                $body = $headerBI + $data["dados"] + $id_exame;
                $adiconar =  ExameModel::adiconar_exame($body);

                $resultado = array();
                foreach ($adiconar as $row) {
                    array_push($resultado, $row);
                };

                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    public static function listar_exame()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["BI Paciente"])) {
                new Response('erro', '', [" BI e dados encontram-se vasios"]);
            } else {
                try {
                    $listar = ExameModel::find(["BI Paciente" => $data["BI Paciente"]]);
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
    }


    public static function um_exame()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["id_exame"])) {
                new Response('erro', '', [" id_exame encontram-se vasios"]);
            } else {
                try {
                    $listar = ExameModel::find(["id_exame" => $data["id_exame"]]);
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
    }

    public static function editar_exame()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["id_exame"]) || !isset($data["dados"])) {
                new Response('erro', '', [" id_exame e dados encontram-se vasios"]);
            } else {
                try {
                    $listar = ExameModel::editar_exame($data["id_exame"], $data["dados"]);
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
    }
}
