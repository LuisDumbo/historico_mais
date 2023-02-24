<?php

namespace  App\Controller;

use App\config\Start;
use App\Model\ConsultasModel;
use MinasRouter\Http\Response;
use MongoDB\Exception\Exception;
use App\Model\ExameModel;
use App\Model\PorcedimentoModel;


class ConsultaController
{

    public static function adicionar()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');


        $json = file_get_contents('php://input');
        $data = json_decode($json, true);



        if (empty($data)) {
            new Response('ok', '', [""]);
        } elseif (!isset($data["BI"]) || !isset($data["dados"]) || !isset($data["numero_ordem"])) {
            new Response('erro', '', [" BI, dados ou numero da ordem dos medicos se encontra vasio encontram-se vasios"]);
        } else {

            try {

                $headerBI = ["BI" => $data["BI"]];
                $header_numeor_rodem = ["numero_ordem" => $data["numero_ordem"]];
                $id_consulta = ["id_consulta" => uniqid($data["BI"])];
                $consulta = $headerBI + $id_consulta + $header_numeor_rodem + $data["dados"];

                /*
                $consulta = [
                    "header" => $body,
                    "dada" => $data["dados"]
                ]; */

                $adiconar = ConsultasModel::adicionar_consulta($consulta);
                $resultado = array();

                foreach ($adiconar as $row) {
                    array_push($resultado, $row);
                };


                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('erro', '', [""]);
            }

            /*

            try {
                $adiconar = "";
                $headerBI = ["BI" => $data["BI"]];
                $id_consulta = ["id_consulta" => uniqid($data["BI"])];
                $body = $headerBI + $id_consulta;
                if (array_key_exists("exame", $data["dados"])) {
                    $id_exame = ["id_exame" => uniqid(rand(10, 100))];
                    $body += ConsultaController::adicionar_em_consulta($data["dados"], $id_exame["id_exame"], $data["BI"]);
                    $adiconar = ConsultasModel::adicionar_consulta($body);
                } else {
                    $id_consulta = ["id_consulta" => uniqid($data["BI"])];
                    $body +=  $data["dados"];
                    $adiconar = ConsultasModel::adicionar_consulta($body);
                }
                $resultado = array();
                foreach ($adiconar as $row) {
                    array_push($resultado, $row);
                };

                new Response('ok', '', $resultado);
            } catch (\Throwable $th) {
                new Response('erro', '', [""]);
            }
            */
        }
    }
    public static function  adicionar_em_consulta($dados, $id_exame, $bi_paciente, $id_consulta, $numero_ordem)
    {

        $body = ['exame' => $dados['exame'], "id_exame" => $id_exame, 'BI Paciente' => $bi_paciente];
        try {
            ExameModel::adiconar_exame($body);
            unset($dados['exame']);
            $retorna = ["id_exame" => $id_exame] + $dados;
            return $retorna;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public static function listar_consulta_medico()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');

        if (!isset($_GET["numero_ordem"])) {
            new Response('erro', '', [" numero_ordem e dados encontram-se vasios"]);
        } else {
            try {
                $adiconar = ConsultasModel::listar([
                    'numero_ordem' => $_GET['numero_ordem']
                ]);
                $data = array();
                foreach ($adiconar as $restaurant => $valores) {
                    array_push($data, $valores);
                };
                new Response('ok', '', $data);
            } catch (Exception $th) {
                new Response('erro', '', [$th]);
            }
        }
    }

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
                $adiconar = ConsultasModel::listar([
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
        /*

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["BI"])) {
                new Response('erro', '', [" BI e dados encontram-se vasios"]);
            } else {
                try {
                    $adiconar = ConsultasModel::listar($data["BI"]);
                    $data = array();
                    foreach ($adiconar as $restaurant => $valores) {
                        array_push($data, $valores);
                        
                        $exame = ExameModel::find(['id_exame' => $valores['id_exame']]);
                        foreach ($exame as $key) {
                            $data[$restaurant]['exame'] = $key;
                        } 
                    };
                    new Response('ok', '', $data);
                } catch (Exception $th) {
                    new Response('erro', '', [$th]);
                }
            }
        }
        */
    }

    public static function uma_consulta()
    {


        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');


        if (!isset($_GET["id_consulta"])) {
            new Response('erro', '', [" id consulta BI e dados encontram-se vasios"]);
        } else {
            try {
                $adiconar = ConsultasModel::find([
                    'id_consulta' => $_GET["id_consulta"]
                ]);
                $data = array();

                foreach ($adiconar as $restaurant => $valores) {
                    array_push($data, $valores);


                    $exame = ExameModel::find(['consulta_id' => $valores['id_consulta']]);
                    foreach ($exame as $key) {
                        //array_push($data, $key);
                        $data[$restaurant]['exame'] = $key;
                    }

                    $procedimento = PorcedimentoModel::find(['consulta_id' => $valores['id_consulta']]);
                    foreach ($procedimento as $key) {
                        //array_push($data, $key);
                        $data[$restaurant]['procedimento'] = $key;
                    }
                };

                new Response('ok', '', $data);
            } catch (Exception $th) {
                new Response('erro', '', [$th]);
            }
        }



        /*

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["id_consulta"])) {
                new Response('erro', '', [" id consulta BI e dados encontram-se vasios"]);
            } else {
                try {
                    $adiconar = ConsultasModel::find($data);
                    $data = array();
                    foreach ($adiconar as $restaurant => $valores) {
                        array_push($data, $valores);

                        $exame = ExameModel::find(['id_exame' => $valores['id_exame']]);
                        foreach ($exame as $key) {
                            $data[$restaurant]['exame'] = $key;
                        }
                    };

                    new Response('ok', '', $data);
                } catch (Exception $th) {
                    new Response('erro', '', [$th]);
                }
            }
        }
        */
    }

    public static function find_editada_com_exame($id_consulta)
    {

        $adiconar = ConsultasModel::find(['id_consulta' => $id_consulta]);
        $data = array();
        foreach ($adiconar as $restaurant => $valores) {
            array_push($data, $valores);

            $exame = ExameModel::find(['id_exame' => $valores['id_exame']]);
            foreach ($exame as $key) {
                $data[$restaurant]['exame'] = $key;
            }
        };

        return $data;
    }

    public static function editar()
    {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["id_consulta"]) || !isset($data["dados"])) {
                new Response('erro', '', [" BI e dados encontram-se vasios"]);
            } else {

                try {

                    if (array_key_exists("exame", $data)) {



                        if (!isset($data["exame"]["id_exame"]) || !isset($data["exame"]["dados"])) {
                            new Response('erro', '', [" O exame deve ter um id, e dados "]);
                        } else {



                            ExameModel::editar_exame($data["exame"]["id_exame"], $data["exame"]["dados"]);

                            ConsultasModel::editar($data["id_consulta"], $data["dados"]);
                        }
                    } else {


                        ConsultasModel::editar($data["id_consulta"], $data["dados"]);
                        /*
                        $retorna = array();
                        foreach ($adiconar as $restaurant) {
                            array_push($retorna, $restaurant);
                        }; */
                    }
                    $retorna =  ConsultaController::find_editada_com_exame($data["id_consulta"]);

                    new Response('ok', '', $retorna);
                } catch (\Throwable $th) {
                    new Response('erro', '', [""]);
                }
            }
        }
    }
}
