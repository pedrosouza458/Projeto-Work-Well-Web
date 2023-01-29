<?php

session_start();
ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(CONF_URL_BASE, ":");
//$route = new Router('localhost/acme-tarde', ":"); // Route para localhost

/**
 * Web Routes
 */

$route->namespace("Source\App");
$route->get("/", "Web:home");
$route->get("/registro", "Web:register");
$route->post("/registro", "Web:register");
$route->get("/login", "Web:login");
$route->post("/login", "Web:login");
$route->get("/work", "Web:work");
$route->get("/perfil", "Web:profile");
$route->get("/sobre", "Web:about");

/**
 *  REGISTER LOGIN
 */
/**
 * App Routs
 */

$route->group("/app"); // agrupa em /app
$route->get("/", "App:homeapp");
$route->get("/perfil", "App:profileApp");
$route->post("/perfil", "App:profileUpdate");
$route->get("/sair", "App:Logout");

$route->get("/notifications/{idImportance}","App:notifications");
$route->get("/notifications","App:notificationsAll");

$route->get("/tasks/{idImportance}","App:tasks");
$route->get("/tasks","App:tasksAll");


$route->get("/profile", "App:app_profile");
$route->get("/about", "App:appabout");
$route->get("/work", "App:workapp");
$route->post("/work", "App:workapp");
// $route->get("/work","App:tasksAll");
$route->get("/listar", "App:list");
$route->get("/pdf", "App:createPDF");
$route->group(null); // desagrupo do /app

$route->group("/admin"); // agrupa em /admin
$route->get("/sair", "Adm:Logout");
$route->get("/", "Adm:admRegister");
$route->post("/", "Adm:admRegister");
$route->get("/home", "Adm:home");
$route->get("/userslist", "Adm:usersList");
$route->get("/login", "Adm:admLogin");
$route->post("/login", "Adm:admLogin");
$route->get("/userPDF", "Adm:createUserPDF");
$route->get("/adminPDF", "Adm:createAdminsPDF");
$route->get("/tasksPDF", "Adm:createTasksPDF");
$route->group(null); // desagrupo do /admin

/*
 * Erros Routes
 */

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();