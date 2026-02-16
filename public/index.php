<?php
//Affiche les erreurs directement dans la page
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Inclure l'autoloader (fichier generer pas composer)
require_once __DIR__ . '/../vendor/autoload.php';

//Import des classe
use App\Config\Config;
use App\Routes\Router;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use App\Controllers\PlatController;
use App\Controllers\ReviewController;

//Demarrer une session ou reprend la sesssion existante
session_start();

//Charger nos variables d'environnemnt
Config::load();


$router = new Router();

//Definir des routes (Voici les regles)
    //données sensibles envoyées en methode POST

    // AUTHENFICATION
$router->post('/insription', [UserController::class, 'create']);
$router->post('/connexion',[UserController::class, 'login']);
$router->post('/deconnexion',[UserController::class, 'logout']);

    //USER
$router->post('/review', [ReviewController::class, 'store']);
$router->post('/order', [OrderController::class, 'store']);

    //Recuperation des données methode GET
$router->get('/search', [PlatController::class, 'search']);



//Dispatch (Mainenan applique les)
$router->dispatch();