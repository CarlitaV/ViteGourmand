<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\PlatRepository;

class OrderService{
    private $orderRepository;
    private $platRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->platRepository = new PlatRepository();
    }

    public function createOrder($idUser, $idPlat, $nbPersonnes, $adresse, $modePaiement){

        //Verification de l'authentification
        if (!$this->isAuthenticated($idUser)){
            return[
                'success' => false,
                'message' => 'Veuillez vous authentifier'
            ];
        }

        //Verification des stock
        $stockDisponible = $this->platRepository->getStock($idPlat);

        if ($stockDisponible <= 0){
            return[
                'success' => false,
                'message' =>'Plat indisponible'
            ];
        }

        //Recuperation du prix
        $prix = $this->platRepository->getPrice($idPlat);

        //Calcul des totaux
        $total = $prix * $nbPersonnes;

        //Reduction si > 5 personnes alors -10%
        if ($nbPersonnes > 5 ){
            $total *=0.9; 
        }

        //Calcul des frais de livraison
        $frais = $this->calculateShipping($adresse);
        $total += $frais;

        //Verification de paiement
        if (!$this->validatePayement($modePaiement, $total)){
            return [
                'success' => false,
                'message' => 'Paiement refusé ou solde insuffisant'
            ];
        }

        //Generer un numero de suivi unique
        $numeroSuivi = uniqid('CMD_');

        //Inserer commande
        $this->orderRepository->insertOrder(
            $idUser,
            $idPlat,
            $nbPersonnes,
            $total,
            $numeroSuivi
        );

        //MAJ des stock 
        $this->platRepository->decrementStock($idPlat);

        return[
            'success' => true,
            'message' => $numeroSuivi
        ];
    }

    private function isAuthenticated($idUser){
        return !empty($idUser);
    }

    private function calculateShipping($adresse){
        if ($adresse === 'Bordeaux'){
            return 5;
        }
        return 10;
    }

    private function validatePayement($modePaiement, $total){
        return true;
    }

}