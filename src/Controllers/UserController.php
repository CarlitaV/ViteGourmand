<?php

namespace App\Controllers;

use App\services\UserService;

class userController{
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
            require './src/views/success.php';
            
        }else{
            //Affiche la vue message erreur
            $error = $result['message'];
            require './src/views/error.php';
        }
    }

}