<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    // ----- -----------------------INSCRIPTION------------------------------

    public function register(
        string $email,
        string $nom, 
        string $prenom,
        string $motDePasse, 
        string $telephone, 
        string $adresse, 
        string $ville){
        // On verifie des champs ne doit pas etre vide
        if(empty($email) || empty($nom) || empty($prenom) || empty($motDePasse)){
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
        if ($this->userRepository->userExists($email, $nom)){
            return[
                'success' => false,
                'message' => "Email ou nom d/'utilisateur deja utilsé"
            ];
        }

        //Hashage du mot de passe
        $hashedPassword= password_hash($motDePasse, PASSWORD_BCRYPT);

        //On creer l'utilisateur avec le mot de pass hasher
        $this->userRepository->createUser($email, $nom, $prenom, $hashedPassword, $telephone, $adresse, $ville);

        // Envoyer un email de bienvenu


        return [
            'success' => true
        ];
    }

        // ----- -----------------------CONNEXION------------------------------

    public function login(
        string $email, 
        string $motDePasse){
        if( empty($email) || empty($motDePasse)){
            return [
                'success' => false,
                'message' => 'Champs manquants'
            ];
        }

        //recuperation de l'utilisateur depuis la BDD
        $utilisateur = $this->userRepository->getUserByEmail($email);

        if (!$utilisateur){
            return[
                'success' => false,
                'message' => 'Email incorrect'
            ];
        }

        //Verification mot de passe
        if (!password_verify($motDePasse, $utilisateur['motDePasse'])){
            return[
                'success' => false,
                'message' => 'Mot de passe incorrect'
            ];
        }

        //On retourne l'utilisateur au controlleur
        return[
            'success'=>true,
            'user'=>$utilisateur
        ];

        
    }



    // ----- -----------------------DECONNEXION------------------------------


    public function logout(){
        //session_start();
        session_unset();
        session_destroy();

        return['success' => true];
    }

}