<?php
namespace App\Controllers;
use App\Services\ReviewService;

class ReviewController{
    private $reviewService;

    public function __construct()
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
            require __DIR__ . '/../Views/202Review.php';  
        } else{
            $error = $result['message'];
            require __DIR__ . '/../Views/404Review.php';
        }
    }
}