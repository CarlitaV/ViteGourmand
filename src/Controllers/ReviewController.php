<?php
namespace App\Controllers;
use App\services\ReviewService;

class ReviewController{
    private $reviewService;

    private function __construct()
    {
        $this->reviewService = new ReviewService();
    }

    public function store(){
        //Recupere les données du formulaire
        $idUser = $_POST['idUser'];
        $idplat = $_POST['idPlat'];
        $commentaire = $_POST['commentaire'];

        //
        $result = $this->reviewService->addReview($idUser, $idplat, $commentaire); 

        //Affichage de la vue
        if($result['success']){
            require './src/views/'; //-----------------------------------------------------creer fichier 
        } else{
            $error = $result['message'];
            require './src/views'; //-----------------------------------------------------A CREER 
        }
    }
}