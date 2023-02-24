<?php

namespace  App\Controller;

use App\Model\PorcedimentoModel;
use MinasRouter\Http\Response;
use MongoDB\Exception\Exception;

class ProcedimentoController
{

    public static function listar()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');




        if (!isset($_GET["bi"])) {
            new Response('erro', '', [" BI e dados encontram-se vasios"]);
        } else {
            try {
                $consulta = [
                    'header' => [
                        'BI' => $_GET['bi']
                    ]
                ];
                $adiconar = PorcedimentoModel::listar([
                    'BI' => $_GET['bi']
                ]);
                $data = array();
                foreach ($adiconar as $restaurant => $valores) {
                    array_push($data, $valores);
                    /*
                    $exame = ExameModel::find(['id_exame' => $valores['id_exame']]);
                    foreach ($exame as $key) {
                        $data[$restaurant]['exame'] = $key;
                    } */
                };
                new Response('ok', '', $data);
            } catch (Exception $th) {
                new Response('erro', '', [$th]);
            }
        }
    }
    public static function procedimento()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');


        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', ["erro"]);
        } elseif (!isset($data["BI"]) || !isset($data["dados"])) {
            new Response('erro', '', [" BI  dados  encontram-se vasios"]);
        } else {
            try {
                $headerBI = ["BI Paciente" => $data["BI"]];
                $id_exame = ["id_exame" => uniqid(rand(10, 100))];
                $body = $headerBI + $data["dados"] + $id_exame;
                $adiconar =  PorcedimentoModel::adicionar_procediment($body);

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
}
