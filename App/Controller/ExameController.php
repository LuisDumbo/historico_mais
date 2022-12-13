<?php

namespace App\Controller;

use App\Model\ExameModel;
use MinasRouter\Http\Response;
use MongoDB\Exception\Exception;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class ExameController
{

    public static function adicionar_exame()
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

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header('Content-type: application/json');

        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
        header('Access-Control-Allow-Methods: PUT, POST, PATCH, DELETE, GET');

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (empty($_GET["bi"])) {
            new Response('ok', '', [""]);
        } else {
            if (!isset($_GET["bi"])) {
                new Response('erro', '', [" BI e dados encontram-se vasios"]);
            } else {
                try {
                    $listar = ExameModel::find(["BI Paciente" => $_GET["bi"]]);
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

    public static function ficheiro()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        header('Content-type: application/json');
        header("Acess-Control-Allow-Methods: POST");
        header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");



        $data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format

        $fileName  =  $_FILES['sendimage']['name'];
        $tempPath  =  $_FILES['sendimage']['tmp_name'];
        $fileSize  =  $_FILES['sendimage']['size'];


        if (empty($fileName)) {
            $errorMSG = json_encode(array("message" => "Selecione Uma imagem", "status" => false));
            echo $errorMSG;
        } else {
            $file_name = 'images/' . $_FILES['sendimage']['name'];
            $temp_file_location = $_FILES['sendimage']['tmp_name'];


            $s3 = new S3Client([
                'region'  => 'sa-east-1',
                'version' => 'latest',
                'credentials' => [
                    'key'    => $_ENV['AWS_S3_KEY'],
                    'secret' => $_ENV['AWS_S3_SECRET'],
                ]
            ]);

            $result = $s3->putObject([
                'Bucket' => 'fililuisdumbo',

                'Key'    => $file_name,
                'SourceFile' => $temp_file_location,
                'ACL'        => 'public-read'
            ]);

            echo json_encode(array("message" => $result['ObjectURL'], "status" => true));
        }


        /*


        if (empty($fileName)) {
            $errorMSG = json_encode(array("message" => "please select image", "status" => false));
            echo $errorMSG;
        } else {
            $upload_path = 'upload/'; // set upload folder path 

            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // get image extension

            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

            // allow valid image file formats
            if (in_array($fileExt, $valid_extensions)) {
                //check file not exist our upload folder path
                if (!file_exists($upload_path . $fileName)) {
                    // check file size '5MB'
                    if ($fileSize < 5000000) {
                        move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
                        $errorMSG = json_encode(array("message" => $fileName, "status" => false));
                        echo $errorMSG;
                    } else {
                        $errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));
                        echo $errorMSG;
                    }
                } else {
                    $errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));
                    echo $errorMSG;
                }
            } else {
                $errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));
                echo $errorMSG;
            }
        }

        // if no error caused, continue ....
        if (!isset($errorMSG)) {

            echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));
        }
        */
    }
}
