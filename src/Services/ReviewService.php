<?php

namespace App\Services;

use App\Repositories\ReviewRepository;

class ReviewService{
    private ReviewRepository $reviewRepository;

    public function __construct()
    {
        $this->reviewRepository = new ReviewRepository();
    }

    public function addReview(int $idUser, int $idPlat, string $commentaire, int $note):array{
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

        //verification que la note est comprise entre 1 et 5
        if ($note <1 || $note > 5){
            return [
                'success' => false,
                'message' => 'La note doit étre comprise entre 1 et 5'
            ];
        }

        // je peut enfin insere l'avis
        $this->reviewRepository->insertReview($idUser,$idPlat, $commentaire,$note);
        return ['success' => true];
    }
}