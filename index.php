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
use App\config\Start;
use MinasRouter\Http\Request;

Start::start();
Route::start(Start::app_url(), "@");


Route::middleware(AdminMiddleware::class)->prefix("api/")->group(function () {

    Route::get("/listar_paciente", [PacienteController::class, 'index']);
    Route::post("/registar_paciente", [PacienteController::class, 'cadastrar']);
    Route::post("/editar_paciente", [PacienteController::class, 'editar']);
    Route::get("/paciente", [PacienteController::class, 'um_paciente']);

    Route::get("/listar_medico", [MedicoController::class, 'listar_medico']);
    Route::post("/registar_medico", [MedicoController::class, 'cadastrar_medico']);
    Route::post("/editar_mdico", [MedicoController::class, 'editar_medico']);
    Route::get("/medico", [MedicoController::class, 'um_medico']);

    Route::post("/registar_consulta", [ConsultaController::class, 'adicionar']);
    Route::post("/listar_consulta", [ConsultaController::class, 'listar']);
    Route::post("/editar_consulta", [ConsultaController::class, 'editar']);
    Route::get("/consulta", [ConsultaController::class, 'uma_consulta']);

    Route::post("/registar_exame", [ExameController::class, 'adicionar_exame']);
    Route::get("/listar_exame", [ExameController::class, 'listar_exame']);
    Route::get("/exame", [ExameController::class, 'um_exame']);
    Route::post("/editar_exame", [ExameController::class, 'editar_exame']);
});


Route::get("/logout",[LoginController::class,'sair'])->name("logout");

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
    $student = array(
        'Erro' => 'Tokem Invalido'
    );

    header('HTTP/1.0 400 Bad Request');
    new Response('unauthorized ', '', $student);
})->name('not');

Route::fallback(function () {
    echo 'Rota Inexistente!';

});

Route::execute();