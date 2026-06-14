<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\PlatRepository;
use App\Repositories\StatRepository;

class OrderService{
    private OrderRepository $orderRepository;
    private PlatRepository $platRepository;
    private StatRepository $sta

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->platRepository = new PlatRepository();
    }

    public function createOrder(
        int $idUser, 
        int $idPlat, 
        int $nbPersonnes, 
        string $adresse, 
        string $modePaiement):array{

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

        //Calcul HT
        $totalHt = $prix * $nbPersonnes;

        //Reduction si > 5 personnes alors -10%
        if ($nbPersonnes > 5 ){
            $totalHt *=0.9; 
        }

        //Calcul des frais de livraison
        $frais = $this->calculateShipping($adresse);

        //TVA 20%
        $tva = $totalHt * .20;

        //TTC
        $totalTtc = $totalHt + $tva + $frais ;

        //Verification de paiement
        if (!$this->validatePayement($modePaiement, $totalTtc)){
            return [
                'success' => false,
                'message' => 'Paiement refusé ou solde insuffisant'
            ];
        }

        //Generer un numero de suivi unique
        $numeroSuivi = uniqid('CMD_');

        //Inserer commande
        $this->orderRepository->insertOrder(
            $adresse,
            $idUser,
            $nbPersonnes,
            'en_attente',
            $totalHt,
            $totalTtc,
            $numeroSuivi
        );

        //Statistiques
        $this->statRepository->incrementCommande();

        //MAJ des stock 
        $this->platRepository->decrementStock($idPlat);

        return[
            'success' => true,
            'message' => $numeroSuivi
        ];
    }

    private function isAuthenticated(int $idUser): bool{
        return !empty($idUser);
    }

    private function calculateShipping(string $adresse){
        if ($adresse === 'Bordeaux'){
            return 5;
        }
        return 10;
    }

    private function validatePayement(string $modePaiement, float $totalTtc):bool{
        return true;
    }

}