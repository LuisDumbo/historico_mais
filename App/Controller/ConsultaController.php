<?php

namespace  App\Controller;

use App\config\Start;
use App\Model\ConsultasModel;
use MinasRouter\Http\Response;
use MongoDB\Exception\Exception;
use App\Model\ExameModel;

class ConsultaController
{

    public static function adicionar()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);



        if (empty($data)) {
            new Response('ok', '', [""]);
        } elseif (!isset($data["BI"]) || !isset($data["dados"])) {
            new Response('erro', '', [" BI  dados  encontram-se vasios"]);
        } else {

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
        }
    }
    public static function  adicionar_em_consulta($dados, $id_exame, $bi_paciente)
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

    public static function listar()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($data)) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($data["BI"])) {
                new Response('erro', '', [" BI e dados encontram-se vasios"]);
            } else {
                try {
                    $adiconar = ConsultasModel::listar($data);
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
    }

    public static function uma_consulta()
    {

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
