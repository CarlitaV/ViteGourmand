<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService{
    private ReviewRepository $reviewRepository;

    public function __construct()
    {
        $this->reviewRepository = new ReviewRepository();
    }

    public function addReview(int $idUser, int $idPlat, string $commentaire):array{
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
                'message' => 'Commentaire vide'
            ];
        }
        //Verfifier si plat existe
        if ($idPlat <= 0) {
            return [
                'success' => false,
                'message' => 'Plat invalide'
            ];
        }

        // je peut enfin insere l'avis
        $this->reviewRepository->insertReview($idUser,$idPlat, $commentaire);
        return ['success' => true];
    }
}