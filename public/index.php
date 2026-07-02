<?php

//Inclure l'autoloader (fichier generer pas composer)
require_once __DIR__ . '/../vendor/autoload.php';

//Import des classe
use App\Config\Config;
use App\Routes\Router;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use App\Controllers\PlatController;
use App\Controllers\ReviewController;
use App\Controllers\Admin\AdminCommandeController;
use App\Controllers\Employe\EmployeCommandeController;
use App\Controllers\HomeController;

//Charger nos variables d'environnemnt
Config::load();
//Affiche les erreurs directement dans la page
//Si APP_ENV n'existe pas on considère que c'est prod
if(($_ENV['APP_ENV'] ?? 'prod') === 'dev'){
    ini_set('display_errors',1);
    error_reporting(E_ALL);
}else{
    ini_set('display_errors',0);
}
//Demarrer une session ou reprend la sesssion existante
session_start();

$router = new Router();

//Definir des routes (Voici les regles)
    //données sensibles envoyées en methode POST

    // AUTHENFICATION
$router->get('/',[HomeController::class, 'index']);
$router->get('/accueil',[HomeController::class, 'index']);
$router->get('/mention-legales', [HomeController::class, 'mentionLegales']);
$router->get('/cgv', [HomeController::class, 'cgv']);
$router->post('/inscription', [UserController::class, 'register']);
$router->get('/inscription', [UserController::class, 'register']);
$router->post('/connexion',[UserController::class, 'login']);
$router->get('/connexion',[UserController::class, 'login']);
$router->get('/deconnexion',[UserController::class, 'logout']);

    //---------------------USER
$router->post('/review', [ReviewController::class, 'store']);
$router->post('/order', [OrderController::class, 'store']);

$router->get('/search', [PlatController::class, 'search']);
$router->get('/menu',[PlatController::class, 'menu']);
$router->post('/panier/add', [PlatController::class, 'addToCart']);
$router->post('/panier/delete',[PlatController::class, 'deleteFromCart']);
$router->get('/panier', [PlatController::class, 'panier']);
$router->get('/avis',[ReviewController::class, 'index']);
$router->get('/apropos',[HomeController::class,'apropos']);

    //--------------------ADMIN
$router->get('/admin/commandes',[AdminCommandeController::class, 'index']);
$router->post('/admin/commandes/valider', [AdminCommandeController::class,'valider']); //post modifie le statut de la commande
$router->get('/admin/stats', [AdminCommandeController::class, 'stats']);


//--------------------EMPLOYE
$router->get('/employe/commandes',[EmployeCommandeController::class, 'index']);
$router->post('/employe/commandes/prepare', [EmployeCommandeController::class,'prepare']);


//Dispatch (Mainenan applique les)
$router->dispatch();