<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath('/sistemaescolar/api/index.php');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('HOLAAAA!');
    return $response;
});

$app->post('/login/{usuario}', function (request $request, Response $response, array $args){

    $data = json_decode($request->getBody()->getContents(), false);    

    $user = DB::table('usuarios')
    ->leftJoin('perfiles', 'usuarios.idperfil', '=', 'perfiles.idperfil')
    ->where('usuarios.nombreusuario', $data->usuario)
    ->first();

    $msg = new stdClass();

    if ($user->password = $data->password){

    }

    $response->getBody()->write(json_encode($user));
    return $response;
});


// Run application
$app->run();