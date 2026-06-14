<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService{
    private ReviewRepository $reviewRepository;

    public function __construct()
    {
        $this->reviewRepository = new ReviewRepository();
    }

    public function addReview(int $idUser, int $idPlat, string $commentaire){
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

        // je peut enfin insere l'avis
        $this->reviewRepository->insertReview($idUser, $commentaire);
        return ['success' => true];
    }
}