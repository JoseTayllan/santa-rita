<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../app/config/db.php';

$routes = require __DIR__ . '/../routes/web.php';

// pega rota pelo parâmetro "r"
$uri = $_GET['r'] ?? '/';

// garante que sempre começa com "/"
if ($uri[0] !== '/') {
    $uri = '/' . $uri;
}



if (isset($routes[$uri])) {
    list($controller, $method) = explode('@', $routes[$uri]);
    require_once __DIR__ . "/../app/controllers/$controller.php";
    $c = new $controller($conn ?? null);
    $c->$method();
} else {
    http_response_code(404);
    echo "Página não encontrada (rota: $uri)";
}
