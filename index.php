<?php

require_once 'vendor/autoload.php';
//Instantiation d'un nouveau routeur
$router = new AltoRouter();

//Définition de la base de l'URL
$router->setBasePath('/carte_voeux');

//Création d'un paramètre custom pour les noms
$router->addMatchTypes(array('name' => '[a-zA-Z_-]++'));

/**Création des routes */
$router->map('GET', '/', ['c'=>'HomeController', 'a'=>'index']);
$router->map('POST', '/mail', ['c'=>'HomeController', 'a'=>'mail']);
$router->map('GET', '/carte/[name:name]', ['c'=>'CardController', 'a'=>'carte']);

$match = $router->match();

$controller = 'App\\Controller\\'.$match['target']['c'];
$action = $match['target']['a'];
$params = $match['params'];

$object = new $controller();
$print = $object->{$action}($params);

echo $print;