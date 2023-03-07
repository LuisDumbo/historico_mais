<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/viewsConfig.php';

use MinasRouter\Router\Route;
use App\Controller\PacienteController;
use App\Middleware\AdminMiddleware;
use App\Controller\MedicoController;
use MinasRouter\Http\Response;
use App\Controller\LoginController;
use App\Controller\ConsultaController;
use App\Controller\RegistarUserController;
use App\Middleware\UserMiddleware;
use App\Controller\UserController;
use App\Controller\ExameController;
use App\Controller\ProcedimentoController;
use App\config\Start;
use MinasRouter\Http\Request;

Start::start();
Route::start(Start::app_url(), "@");


Route::middleware(AdminMiddleware::class)->prefix("api/")->group(function () {

    Route::get("/listar_paciente", [PacienteController::class, 'index']);
    Route::post("/registar_paciente", [PacienteController::class, 'cadastrar']);
    Route::post("/editar_paciente", [PacienteController::class, 'editar']);
    Route::get("/paciente?{bi}", [PacienteController::class, 'um_paciente']);

    Route::get("/listar_medico", [MedicoController::class, 'listar_medico']);
    Route::post("/registar_medico", [MedicoController::class, 'cadastrar_medico']);
    Route::post("/editar_medico", [MedicoController::class, 'editar_medico']);
    Route::get("/medico?{numero_ordem}", [MedicoController::class, 'um_medico']);

    Route::post("/registar_consulta", [ConsultaController::class, 'adicionar']);
    Route::get("/listar_consulta?{bi}", [ConsultaController::class, 'listar']);
    Route::get("/listar_consulta_medico?{numero_ordem}", [ConsultaController::class, 'listar_consulta_medico']);
    Route::post("/editar_consulta", [ConsultaController::class, 'editar']);
    Route::get("/consulta?{id_consulta}", [ConsultaController::class, 'uma_consulta']);


    Route::post("/registar_procedimento", [ProcedimentoController::class, 'procedimento']);
    Route::get("/listar_procedimento?{bi}", [ProcedimentoController::class, 'listar']);


    Route::post("/registar_exame", [ExameController::class, 'adicionar_exame']);
    Route::get("/listar_exame?{bi}", [ExameController::class, 'listar_exame']);
    Route::get("/exame", [ExameController::class, 'um_exame']);
    Route::post("/editar_exame", [ExameController::class, 'editar_exame']);

    Route::post("/arquivo", [ExameController::class, 'ficheiro']);
});


Route::get("/logout", [LoginController::class, 'sair'])->name("logout");

Route::get("/login/{erro?}", [LoginController::class, 'login']);
Route::post("/login", [LoginController::class, 'autenticar'])->name("login");


Route::middleware(UserMiddleware::class)->group(function () {

    Route::get("/user", [UserController::class, 'index'])->name('user');
    //  Route::get("/doc", [UserController::class, 'index'])->name('doc');
    Route::get("/documentacao", [UserController::class, 'documentacao'])->name('documentacao');
});


Route::get("/Registar", [RegistarUserController::class, 'regitar'])->name("Registar");
Route::post("/Registar", [RegistarUserController::class, 'cadastrar'])->name("registar");
Route::get("/", [UserController::class, 'home'])->name('home');




Route::get("/not", function () {
    /*
    $student = array(
        'Erro' => 'Tokem Invalido'
    );

   // header('HTTP/1.0 400 Bad Request');
    new Response('unauthorized ', '', $student);
    */

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    header('Content-type: application/json');
    $student = array(
        'Erro' => 'Tokem Invalido'
    );

    // header('HTTP/1.0 400 Bad Request');
    new Response('unauthorized ', '', $student);
})->name('not');


Route::get("/not_authorized", function () {

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    header('Content-type: application/json');
    $student = array(
        'Erro' => 'Sem Headers de Aurotização'
    );
    new Response('unauthorized ', '', $student);
})->name('not_auth');

Route::fallback(function () {
    /*
    $student = array(
        'Erro' => 'Rota Inexistente!'
    );

    //  header('HTTP/1.0 400 Bad Request');
    new Response('unauthorized ', '', $student);
    */

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header('Content-type: application/json');
    $student = array(
        'Erro' => 'Rota Inexistente!'
    );

    // header('HTTP/1.0 400 Bad Request');
    new Response('unauthorized ', '', $student);
});

Route::execute();
