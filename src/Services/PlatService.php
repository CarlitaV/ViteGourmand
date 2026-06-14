<?php

namespace App\Services;

use App\Repositories\PlatRepository;

class PlatService{
    private PlatRepository $platRepository;

    public function __construct()
    {
        $this->platRepository = new PlatRepository();
    }

    public function searchPlat(string $keyword){
        //Function trim qui supprime les espaces et 
        //certains caractères prédéfinis en début et en fin de chaîne de caractères 
        $keyword = trim((string)$keyword);

        return $this->platRepository->findByName($keyword);

    }
}