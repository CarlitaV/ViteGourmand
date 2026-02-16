<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService{
    private $reviewRepository;

    private function __construct()
    {
        $this->reviewRepository = new ReviewRepository();
    }

    public function addReview($idUser, $idPlat, $commentaire){
        //Dabord je verifie l'authentification
        if (empty($idUser)){
            return[
                'success' => false,
                'message' => 'Veuillez vous connecter'
            ];
        }

        // Verifier si le le commantaire est vide
        if (empty($commentaire)){
            return[
                'success' => false,
                'message' => 'Commentaire vite'
            ];
        }

        //Verifier q'un plat est bien selection
        if(empty($idPlat)){
            return[
                'success' => false,
                'message' => 'Plat non séléctionné'
            ];
        }

        // je peut enfin insere l'avis
        $this->reviewRepository->insertReview($idUser, $idPlat, $commentaire);
        return ['success' => true];
    }
}