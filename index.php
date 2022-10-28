<?php

use CoffeeCode\Router\Router;

require_once "./vendor/autoload.php";

$router = new Router(ROOT);
$router->namespace("Src\Controllers");

$router->group(null);

$router->get("/", "App:login", "app.login");
$router->get("/cadastro", "App:cadastro", "app.cadastro");
$router->get("/inicio", "App:inicio", "app.inicio");
$router->get("/calendario", "App:calendario", "app.calendario");
$router->get("/{id}/detalhe", "App:detalhe_grupo", "app.detalhe_grupo");
$router->get("/sair", "App:sair", "app.sair");

$router->post("/login-post", "App:login_post", "app.login_post");
$router->post("/cadastro-post", "App:cadastro_post", "app.cadastro_post");
$router->post("/criar-grupo", "App:criar_grupo", "app.criar_grupo");
$router->post("/criar-entregas", "App:criar_entregas", "app.criar_entregas");
$router->post("/entrega", "App:entrega", "app.entrega");
$router->post("/upload", "App:upload", "app.upload");
$router->post("/avaliar", "App:avaliar", "app.avaliar");
$router->post("/nova-senha", "App:nova_senha", "app.nova_senha");

$router->dispatch();

if ($router->error()) {
  $router->redirect("app.login");
}
