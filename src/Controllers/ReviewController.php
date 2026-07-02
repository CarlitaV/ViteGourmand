<?php
namespace App\Controllers;
use App\Services\ReviewService;

class ReviewController{
    private ReviewService $reviewService;

    public function __construct()
    {
        $this->reviewService = new ReviewService();
    }
        
    public function index(){
        require __DIR__. '/../Views/Avis.php';
    }

    public function store(){
        //Recupere les données du formulaire
        $idUser = $_SESSION['idUser'] ?? null; //l'utilisateur est deja co donc recuperation via session 
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