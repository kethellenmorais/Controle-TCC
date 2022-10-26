<?php

use CoffeeCode\Router\Router;

require_once "./vendor/autoload.php";

$router = new Router(ROOT);
$router->namespace("Src\Controllers");

$router->group(null);

$router->get("/", "App:login", "app.login");
$router->post("/login_post", "App:login_post", "app.login_post");

$router->get("/cadastro", "App:cadastro", "app.cadastro");
$router->post("/cadastro_post", "App:cadastro_post", "app.cadastro_post");

$router->get("/inicio", "App:inicio", "app.inicio");
$router->get("/calendario", "App:calendario", "app.calendario");

$router->get("/{id}/detalhe", "App:detalhe_grupo", "app.detalhe_grupo");

// $router->get("/products", "App:read", "app.read");
// $router->get("/{id}/edit", "App:edit", "app.edit");
// $router->get("/erro", "App:erro", "app.erro");

// $router->post("/saveCreate", "App:saveCreate", "app.saveCreate");

$router->post("/nova-senha", "App:nova_senha", "app.nova_senha");
$router->get("/sair", "App:sair", "app.sair");

$router->dispatch();

if ($router->error()) {
  $router->redirect("app.login");
}
