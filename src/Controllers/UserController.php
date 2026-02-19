<?php

namespace App\Controllers;

use App\Services\UserService;

class UserController{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService(); 
    }

    // ------------------INSCRIPTION-------------------------

    public function register(){
        //On recupere les données envoyyées par le formulaire
        $email = $_POST['email'] ?? null;
        $utilisateur = $_POST['utilisateur'] ?? null;
        $motDePasse = $_POST['motDePasse'] ?? null; 

        // on fait apel au service (logique metier)
        $result = $this->userService->register($email,$utilisateur, $motDePasse);

        //Gere les vue sucess et error
        if($result['success']){
            //on affiche la vue success
            require __DIR__ . '/../Views/202Register.php';
            
        }else{
            //Affiche la vue message erreur
            $error = $result['message'];
            require __DIR__ . '/../Views/404Register.php';  
        }
    }

    //------------------CONNEXION
    public function login(){
        $utilisateur = $_POST['utilisateur'] ?? null;
        $email = $_POST['email'] ?? null;
        $motDePasse = $_POST['motDePasse'] ?? null;

        $result = $this->userService->login($email,$motDePasse, $utilisateur);

        if ($result['success']){
            header('Location: /accueil');
            exit();
        }else{
            $error = $result['message'];
            require __DIR__ . '/../Views/404Register.php';  
        }
    }

    //-------------------DECONNEXION
    public function logout(){
        $this->userService->logout();

        header('Location: /connexion');

    }

}