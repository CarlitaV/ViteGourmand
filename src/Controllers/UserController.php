<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService(); 
    }

    // ------------------INSCRIPTION-------------------------

    public function register(){

        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            require __DIR__ . '/../Views/Register.php';
            return;
        }

        //On recupere les données envoyyées par le formulaire
        $email = $_POST['email'] ?? null;
        $nom = $_POST['nom'] ?? null;
        $motDePasse = $_POST['motDePasse'] ?? null; 
        $telephone = $_POST['telephone'] ?? null;
        $adresse = $_POST['adresse'] ?? null;
        $ville = $_POST['ville'] ?? null;

        // on fait apel au service (logique metier)
        $result = $this->userService->register(
            $email,
            $nom, 
            $motDePasse,
            $telephone,
            $adresse,
            $ville
            );

        //Gere les vue sucess et error
        if($result['success']){
            //on affiche la vue success
            header('Location: /connexion');
            
        }else{
            //Affiche la vue message erreur
            $error = $result['message'];
            require __DIR__ . '/../Views/Register.php';  
        }
    }

    //------------------CONNEXION
    public function login(){

    // Si ce n'est pas un POST, on affiche le formulaire
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        require __DIR__ . '/../Views/Login.php';
        return;
    }

    // On récupère les données du formulaire
    $email = $_POST['email'] ?? null;
    $motDePasse = $_POST['motDePasse'] ?? null;

    // On appelle le service
    $result = $this->userService->login($email, $motDePasse);

    // Si authentification réussie
    if ($result['success']) {

        // On récupère l'utilisateur venant de la BDD
        $user = $result['user'];

        // On crée la session
        $_SESSION['idUser'] = $user['idUser'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];

        // Redirection selon le rôle
        if ($user['role'] === 'admin') {
            header('Location: /admin/commandes');
        } elseif ($user['role'] === 'employe') {
            header('Location: /employe/commandes');
        } else {
            header('Location: /');
        }

        exit(); // On quitte après la redirection
    } 
    else {
        // Si erreur, on affiche le formulaire avec message
        $error = $result['message'];
        require __DIR__ . '/../Views/Login.php';
    }
    
}

    //-------------------DECONNEXION
    public function logout(){
        session_unset();
        session_destroy();
        header('Location: /connexion');
        exit();

    }

}