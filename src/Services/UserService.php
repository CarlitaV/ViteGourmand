<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    // ----- -----------------------INSCRIPTION------------------------------

    public function register($email,$utilisateur, $motDePasse){
        // On verifie des champs ne doit pas etre vide
        if(empty($email) || empty($utilisateur) || empty($motDePasse)){
            return[
                'success'=>false,
                'message'=>'Tous les champs sont obligatoires'
            ];
        }

        //Valider l'email
        // filter_var vérifie la présence de chaînes de caractères telles que des adresses e-mail, des URL, des adresses IP, etc.
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return [
                'success' => false,
                'message' => 'Email invalide'
            ];
        }

        //VERIFIER L4UTILISATEUR
        if ($this->userRepository->userExists($email, $utilisateur)){
            return[
                'success' => false,
                'message' => "Email ou nom d/'utilisateur deja utilsé"
            ];
        }

        //Hashage du mot de passe
        $hashedPassword= password_hash($motDePasse, PASSWORD_BCRYPT);

        //On creer l'utilisateur avec le mot de pass hasher
        $this->userRepository->createUser($email, $utilisateur, $hashedPassword);

        // Envoyer un email de bienvenu


        return [
            'success' => true
        ];
    }

        // ----- -----------------------CONNEXION------------------------------

    public function login($email, $motDePasse, $utilisateur){
        if( empty($email) || empty($motDePasse)){
            return [
                'success' => false,
                'message' => 'Champs manquants'
            ];
        }

        $user = $this->userRepository->getUserByEmail($email);

        if (!$utilisateur){
            return[
                'success' => false,
                'message' => 'Email incorrect'
            ];
        }
        if (!password_verify($motDePasse, $utilisateur['motDePasse'])){
            return[
                'success' => false,
                'message' => 'Mo de passe incorrect'
            ];
        }

        // On cree un session 
        $_SESSION['idUser'] = $utilisateur['id'];
        $_SESSION['role'] = $user ['role'] ?? 'utilisateur';

        return [
            'success' => true
        ];
    }

}

    // ----- -----------------------DECONNEXION------------------------------


    //A FAIRE